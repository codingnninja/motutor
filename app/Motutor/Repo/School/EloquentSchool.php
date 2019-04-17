<?php namespace Motutor\Repo\School;

use Motutor\Repo\School\SchoolInterface;
use Motutor\Repo\Tag\TagInterface;
use Motutor\Repo\Status\StatusInterface;
use Motutor\Repo\RepoAbstract;
use Illuminate\Support\Facades\Storage;
use App\Models\School;
use App\Models\Tag;

class EloquentSchool extends RepoAbstract implements SchoolInterface 
{

    protected $school;
    protected $tag;
    protected $tagModel;
    protected $internalModel = "school";
    protected $status;

    // Class expects Eloquent school and tag models
    public function __construct(School $school, TagInterface $tag, StatusInterface $status, Tag $tagModel)
    {
            $this->school = $school;
            $this->tag = $tag;
            $this->tagModel = $tagModel;
            $this->status = $status;
    }

    /**
     * Retrieve school by id
     * regardless of status
     *
     * @param  int $id school ID
     * @return stdObject object of school information
    */

    public function byId($id)
    {
        return $this->getById($id);
    }

    /**
     * Get paginated school
     *
     * @param int $page Number of school per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function byPage($page=1, $limit=10, $all=false)
    {
        return $this->getByPage($page, $limit, $all);
    }

    /**
     * Get single school by URL
     *
     * @param string  URL slug of school
     * @return object object of school information
     */

    public function bySlug($slug)
    {
        return $this->getBySlug($slug);
    }

   /**
     * Get school by their tag
     *
     * @param string  URL slug of tag
     * @param int Number of school per page
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function byTag($tag, $page=1, $limit=50)
    {
        return $this->getByTag($tag, $page, $limit);
    }

    /**
     * Create a new school
     *
     * @param array  Data to create a new object
     * @return boolean
     */

    public function create(array $data)
    {   // Create the school;
        $result = $this->createOrUpdate($data);
        return $result;
    }

    /**
     * Update an existing school
     *
     * @param array  Data to update an school
     * @param model  Model to store the data
     * @return boolean
     */

    public function update(array $data)
    {
        $result = $this->createOrUpdate($data, $this->school);
        return $result;
    }

    /**
    *handle|process create and update
    *inherits schoolInterface
    */

    public function createOrUpdate(array $data, $model = null)
    {
        //Get and remove tags from data
        $tags = $data['tags'];
        unset($data['tags']);
        //Make slug once.
        if (isset($data['slug']) === false) {
            $data['slug'] = $this->slug($data['title']);
        }
        //make status id for this school then remove status from data
        $data['status_id'] = $this->syncStatus($data);
        unset($data['status']);
        //Upload image and its url
        $newData = $this->saveImage($data);
        //create or update school
        if($model === null)
        {
            $school = School::create($data);
            $school_id = $school->school_id;
        } else {
            $school_id = $data['school_id'];
            $school = $model->findOrFail($school_id)->update($data);      
        }

        if(!$school){ return false; }
        //make tags for the school;
        $this->syncTags(
            $this->school, 
            $tags,
            $data['slug'],
            $school_id
        );
        return $school;
    }

    protected function saveImage($data)
    {
        if (isset($data['media']) && is_string($data['media'] !== true))
        {
            // Remove the old media if any
            if (optional($this->school)->media && Storage::disk('schools')->exists($this->school->media)) {
                Storage::disk('schools')->delete($this->school->media);
            }
                // Upload the new media
            $data['media'] = $data['media']->store('schools');
        }
        return $data;
    }

    /**
     * Sync tags for school
     *
     * @param \Illuminate\Database\Eloquent\Model  $school
     * @param array  $tags
     * @return void
     */
    protected function syncTags ($school, array $data, $slug, $school_id)
    {
        // Create or add tags
        $found = $this->tag->findOrCreateTag($data, $slug);
        $dataIds = [];
        foreach ($found as $data) {
            $dataIds[] = $data->tag_id;
        }
        // Assign set tags to school
        $school->findOrfail($school_id)->tags()->sync($dataIds);
    }

    protected function syncStatus (array $data)
    {
        $foundStatuses = $this->status
            ->findOrCreateStatus(
            //status of any program that is saved is [published] $this->statuses[0]
                [$this->statuses[$data['status']]],
                 $data['slug']
             );
        $status_id = '';
        foreach ($foundStatuses as $status) {
            $status_id = $status->status_id;
        }
        return $status_id;
    }

    /**
     * Get total school count
     *
     * @todo I hate that this is public for the decorators.
     *       Perhaps interface it?
     * @return int  Total school
     */
    protected function totalSchools($all = false)
    {
        if( ! $all )
        {
            return $this->school->where('status_id', 1)->count();
        }

        return $this->school->count();
    }

    /**
     * Get total school count per tag
     *
     * @todo I hate that this is public for the decorators
     *       Perhaps interface it?
     * @param  string  $tag  Tag slug
     * @return int     Total school per tag
     */
    protected function totalByTag($tag)
    {
        $result = $this->tagModel
                       ->where('tag', $tag);
         return $result->count();
    }

        /**
     * Convert any string to
     * an array
     *
     * @param  $delimiter string
     * @param  $string
     * @return array
     */

    public function convertStringToArray($delimiter, $string)
    {
        //don't convert if it is an array;
        if (is_array( $string )) { return $string;}
        $arr = explode($delimiter, $string);
        foreach( $arr as $key => $string )
        {
            $arr[$key] = trim($string);
        }
        return $arr;
    }

}
