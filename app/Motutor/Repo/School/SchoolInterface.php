<?php 
namespace Motutor\Repo\School;

interface SchoolInterface {
	
	/**
     * Retrieve school by id
     * regardless of status
     *
     * @param  int $id school ID
     * @return stdObject object of school information
     */
    public function byId($id);

    /**
     * Get paginated schools
     *
     * @param int $page Number of schools per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function byPage($page=1, $limit=10, $all=false);

    /**
     * Get single school by URL
     *
     * @param string  URL slug of school
     * @return object object of school information
     */
    public function bySlug($slug);

   /**
     * Get schools by their tag
     *
     * @param string  URL slug of tag
     * @param int Number of schools per page
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function byTag($tag, $page=1, $limit=10);

    /**
     * Create a new school
     *
     * @param array  Data to create a new object
     * @return boolean
     */
    public function create(array $data);

    /**
     * Update an existing school
     *
     * @param array  Data to update a school
     * @param model  Model to save a new object
     * @return boolean
     */
    public function update(array $data);

    /**
     * Common point create and update
     *
     * @param array  Data to update an school
     * @param model  Model to save a new object
     * @return boolean
     */
    public function createOrUpdate(array $data, $model=null);



}