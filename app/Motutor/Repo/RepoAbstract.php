<?php 
namespace Motutor\Repo;

abstract class RepoAbstract {

    /**
    *Statuses for this application models
    *@var array
    */

    protected $statuses = [
        'status',
        'published',
        'draft',
        'activated',
        'deactivated',
    ];

    /**
     * Retrieve item by id
     * regardless of item
     *
     * @param  int $id item ID
     * @return stdObject object of item
     */

    public function getById($id)
    {
        return $this->{$this->internalModel}
            ->where("{$this->internalModel}_id", $id)
            ->first();
    }

    
    /**
     * Get paginated school
     *
     * @param int $page Number of school per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function getByPage($page=1, $limit=10, $all=false)
    {
        $result = new \StdClass;
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = [];

        $query = $this->{$this->internalModel}->orderBy('created_at', 'desc');

        if( ! $all )
        {
            $query->where('status_id', 1);
        }

        $items = $query->skip( $limit * ($page-1) )
                         ->take($limit)
                         ->get();

        $result->totalItems = $this->totalSchools($all);
        $result->items = $items->all();

        return $result;
    }

    /**
     * Get single school by URL
     *
     * @param string  URL slug of school
     * @return object object of school information
     */

    public function getBySlug($slug)
    {
        return $this->{$this->internalModel}
        ->where('slug', $slug)
        ->where('status_id', 1)
        ->first();
    }

    /**
     * Get school by their tag
     *
     * @param string  URL slug of tag
     * @param int Number of school per page
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function getByTag($tag, $page=1, $limit=50)
    {
        $foundTag = $this->tagModel
            ->where('tag', $tag)
            ->first();

        $result = new \StdClass;
        $result->page = $page;
        $result->limit = $limit;
        $result->totalItems = 0;
        $result->items = [];

        if( !$foundTag )
        {
            return $result;
        }

        $items = $foundTag
            ->{$this->internalModel()}
            ->where("{$this->internalModel}.status_id", 1)
            ->orderBy(`{$this->internalModel}.created_at`, 'desc')
                ->skip( $limit * ($page-1) )
            ->take($limit)
            ->get();

        $result->totalItems = $this->totalByTag($tag);
        $result->items = $tems->all();

        return $result;
    }

    /**
     * Retrieve by id
     * regardless of status
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @param  int $id ID
     * @return stdObject object 
     */

     /** Make a string "slug-friendly" for URLs
     * @param  string $string  Human-friendly tag
     * @return string       Computer-friendly tag
     */

    protected function slug($string)
    {
        return filter_var( 
            str_replace(
                ' ',
                '-', 
                strtolower( trim($this->addUniqueIdTo($string)))
            ), 
            FILTER_SANITIZE_URL
        );
    }

    protected function addUniqueIdTo($string)
    {
        return $string."-".uniqid();
    }

     /**
     * Find existing tags or create if they don't exist
     *
     * @param  array $data  Array of strings, each representing a datum
     * @param  string $slug  Unique string to locate an item
     * @param  arrayable object @model  database  table controller
     * @param  table row $row
     * @return array        Array or Arrayable collection of objects
     */
    public function findOrCreate (array $data, $slug, $row)
    {
        $found = $this->{$row}->whereIn($row, $data)->get();

        $returnData = [];

        if ( $found )
        {
            foreach( $found as $datum )
            {
                $pos = array_search($datum->{$row}, $data);

                // Add returned data to array
                if( $pos !== false )
                {
                    $returnData[] = $datum;
                    unset($data[$pos]);
                }
            }
        }

        // Add remainings data as new
        foreach ( $data as $datum )
        {
            $returnData[] = $this->{$row}
                ->create([ $row => $datum,
                    'slug' => $this->slug($slug),
                ]);
        }

        return $returnData;
    }

}