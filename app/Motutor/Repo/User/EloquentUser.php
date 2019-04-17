<?php namespace Motutor\Repo\User;

use Motutor\Repo\RepoAbstract;
use Motutor\Repo\user\UserInterface;
use Motutor\Service\Cache\CacheInterface;
use App\Models\User;

class Eloquentuser extends RepoAbstract implements userInterface {

    protected $user;
    protected $internalModel = "profile";
    // Class expects an Eloquent model
    public function __construct(User $user, StatusInterface $status)
    {
        $this->user = $user;
        $this->status = $status;
    }

    /**
     * Retrieve user by id
     * regardless of user
     *
     * @param  int $id user ID
     * @return stdObject object of user information
     */

    public function byId($id)
    {
        return $this->getById($id);
    }

    /**
     * Get paginated user
     *
     * @param int $page Number of user per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function byPage($page=1, $limit=10, $all=false)
    {
        return $this->getByPage($page, $limit, $all);
    }

    /**
     * Get single user by URL
     *
     * @param string  URL slug of user
     * @return object object of user information
     */

    public function bySlug($slug)
    {
        return $this->getBySlug($slug);
    }

    /**
     * Create a new user
     *
     * @param array  Data to create a new object
     * @return boolean
     */

    public function create(array $data)
    { 
        $result = $this->createOrUpdate($data);
        return $result;
    }

    /**
     * Update an existing user
     *
     * @param array  Data to update a user
     * @param model  Model to store the data
     * @return boolean
     */

    public function update(array $data)
    {
        $result = $this->createOrUpdate($data, $this->user);
        return $result;
    }

    /**
    *handle|process create and update
    *inherits userInterface
    */

    public function createOrUpdate(array $data, $user = null)
    {
        $user === null ?
            $user = User::create($data)
            :$user->update($data);
            return $user; 
    }

    /**
     * Get total user count
     *
     * @todo I hate that this is public for the decorators.
     *       Perhaps interface it?
     * @return int  Total user
     */
    protected function totalusers()
    {
        return $this->user->count();
    }
}