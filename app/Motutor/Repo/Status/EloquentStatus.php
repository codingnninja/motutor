<?php namespace Motutor\Repo\Status;

use Motutor\Repo\RepoAbstract;
use App\Models\Status;

class EloquentStatus extends RepoAbstract implements StatusInterface {

    protected $status;

    public function __construct(Status $status)
    {
        $this->status = $status;
    }

    /**
     * Get all Statuses
     * @return Array Arrayable collection
     */
    public function all()
    {
        return $this->status->all();
    }

    /**
     * Get specific status
     * @param  int $id Status ID
     * @return object  Status object
     */
    public function byId($id)
    {
        return $this->status->find($id);
    }

    /**
     * Get specific status
     * @param  string $slug Status slug
     * @return object  Status object
     */
    public function byStatus($slug)
        {
            return $this->status->where('slug', $slug);
        }

    /**
     * Find existing statuses or create if they don't exist
     *
     * @param  $data  Array of a string representing a status
     * @return array        Array or Arrayable collection of status objects
     */
    public function findOrCreateStatus(Array $data, $slug)
        {
            return $this->findOrCreate($data, $slug, 'status');
        }

}
