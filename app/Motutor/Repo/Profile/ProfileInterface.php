<?php 
namespace Motutor\Repo\Profile;

interface ProfileInterface {
	
	/**
     * Retrieve profile by id
     * regardless of status
     *
     * @param  int $id profile ID
     * @return stdObject object of profile information
     */
    public function byId($id);

    /**
     * Get paginated profile
     *
     * @param int $page Number of profile per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function byPage($page=1, $limit=10, $all=false);

    /**
     * Get single profile by URL
     *
     * @param string  URL slug of profile
     * @return object object of profile information
     */
    public function bySlug($slug);

    /**
     * Create a new profile
     *
     * @param array  Data to create a new object
     * @return boolean
     */
    public function create(array $data);

    /**
     * Update an existing profile
     *
     * @param array  Data to update a profile
     * @param model  Model to save a new object
     * @return boolean
     */
    public function update(array $data);

    /**
     * Common point create and update
     *
     * @param array  Data to update a profile
     * @param model  Model to save a new object
     * @return boolean
     */
    public function createOrUpdate(array $data, $model=null);

}