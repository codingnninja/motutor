<?php namespace Motutor\Repo\Profile;

use Motutor\Repo\RepoAbstract;
use Motutor\Repo\Profile\ProfileInterface;
use Motutor\Service\Cache\CacheInterface;
use Motutor\Repo\Status\StatusInterface;
use App\Models\Profile;

class EloquentProfile extends RepoAbstract implements ProfileInterface {

    protected $profile;
    protected $internalModel = "profile";
    // Class expects an Eloquent model
    public function __construct(Profile $profile, StatusInterface $status)
    {
        $this->profile = $profile;
        $this->status = $status;
    }

    /**
     * Retrieve profile by id
     * regardless of profile
     *
     * @param  int $id profile ID
     * @return stdObject object of profile information
     */

    public function byId($id)
    {
        return $this->getById($id);
    }

    /**
     * Get paginated profile
     *
     * @param int $page Number of profile per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function byPage($page=1, $limit=10, $all=false)
    {
        return $this->getByPage($page, $limit, $all);
    }

    /**
     * Get single profile by URL
     *
     * @param string  URL slug of profile
     * @return object object of profile information
     */

    public function bySlug($slug)
    {
        return $this->getBySlug($slug);
    }

    /**
     * Create a new profile
     *
     * @param array  Data to create a new object
     * @return boolean
     */

    public function create(array $data)
    {   // Create the profile;
        $result = $this->createOrUpdate($data);
        return $result;
    }

    /**
     * Update an existing profile
     *
     * @param array  Data to update an profile
     * @param model  Model to store the data
     * @return boolean
     */

    public function update(array $data)
    {
        $result = $this->createOrUpdate($data, $this->profile);
        return $result;
    }

    /**
    *handle|process create and update
    *inherits profileInterface
    */

    public function createOrUpdate(array $data, $profile = null)
    {

        $profile === null ?
            $profile = profile::create($data)
            :$profile->update($data);
            return $profile; 
    }

    /**
     * Get total profile count
     *
     * @todo I hate that this is public for the decorators.
     *       Perhaps interface it?
     * @return int  Total profile
     */
    protected function totalprofiles($all = false)
    {
        if( ! $all )
        {
            return $this->profile->where('status_id', 3)->count();
        }
        return $this->profile->count();
    }
}