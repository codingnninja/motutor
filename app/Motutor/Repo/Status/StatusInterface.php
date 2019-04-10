<?php namespace Motutor\Repo\Status;

interface StatusInterface {

    /**
     * Get all Statuses
     * @return Array Arrayable collection
     */
    public function all();

    /**
     * Get specific status
     * @param  int $id Status ID
     * @return object  Status object
     */
    public function byId($id);

    /**
     * Get specific status
     * @param  int $id Status slug
     * @return object  Status object
     */
    public function byStatus($status);

    /**
     * Find existing statuses or create if they don't exist
     *
     * @param  $data  Array of a string representing a status
     * @return array         Array or Arrayable collection of status objects
     */
    public function findOrCreateStatus(array $data, $slug);

}