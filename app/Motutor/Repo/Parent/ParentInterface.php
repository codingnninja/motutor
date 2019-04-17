<?php 
namespace Motutor\Repo\Subscription;

interface SubscriptionInterface {
	
	/**
     * Retrieve subscription by id
     * regardless of status
     *
     * @param  int $id subscription ID
     * @return stdObject object of subscription information
     */
    public function byId($id);

    /**
     * Get paginated subscription
     *
     * @param int $page Number of subscription per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */
    public function byPage($page=1, $limit=10, $all=false);

    /**
     * Get single subscription by URL
     *
     * @param string  URL slug of subscription
     * @return object object of subscription information
     */
    public function bySlug($slug);

    /**
     * Create a new subscription
     *
     * @param array  Data to create a new object
     * @return boolean
     */
    public function create(array $data);

    /**
     * Update an existing subscription
     *
     * @param array  Data to update a subscription
     * @param model  Model to save a new object
     * @return boolean
     */
    public function update(array $data);

    /**
     * Common point create and update
     *
     * @param array  Data to update a subscription
     * @param model  Model to save a new object
     * @return boolean
     */
    public function createOrUpdate(array $data, $model=null);

}