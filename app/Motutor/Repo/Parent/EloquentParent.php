<?php namespace Motutor\Repo\Subscription;

use Motutor\Repo\RepoAbstract;
use Motutor\Repo\Subscription\SubscriptionInterface;
use Motutor\Service\Cache\CacheInterface;
use Motutor\Repo\Status\StatusInterface;
use App\Models\Subscription;

class EloquentSubscription extends RepoAbstract implements SubscriptionInterface {

    protected $subscription;
    // Class expects an Eloquent model
    public function __construct(Subscription $subscription, StatusInterface $status)
    {
        $this->subscription = $subscription;
        $this->status = $status;
    }

    /**
     * Retrieve subscription by id
     * regardless of subscription
     *
     * @param  int $id subscription ID
     * @return stdObject object of subscription information
     */

    public function byId($id)
    {
        return $this->subscription
            ->where('subscription_id', $id)
            ->first();
    }

    /**
     * Get paginated subscription
     *
     * @param int $page Number of subscription per page
     * @param int $limit Results per page
     * @param boolean $all Show published or all
     * @return StdClass Object with $items and $totalItems for pagination
     */

    public function byPage($page=1, $limit=10, $all=false)
        {
            $result = new \StdClass;
            $result->page = $page;
            $result->limit = $limit;
            $result->totalItems = 0;
            $result->items = [];

            $query = $this->subscription->orderBy('created_at', 'desc');

            if( ! $all )
            {
                $query->where('status_id', 3);
            }

            $subscriptions = $query->skip( $limit * ($page-1) )
                    ->take($limit)
                    ->get();

            $result->totalItems = $this->totalSubscriptions($all);
            $result->items = $subscriptions->all();

            return $result;
        }

        /**
     * Get single subscription by URL
     *
     * @param string  URL slug of subscription
     * @return object object of subscription information
     */

    public function bySlug($slug)
    {
        return $this->subscription
        ->where('slug', $slug)
        ->where('status_id', 3)
        ->first();
    }

    /**
     * Create a new subscription
     *
     * @param array  Data to create a new object
     * @return boolean
     */

    public function create(array $data)
    {   // Create the subscription;
        $result = $this->createOrUpdate($data);
        return $result;
    }

    /**
     * Update an existing subscription
     *
     * @param array  Data to update an subscription
     * @param model  Model to store the data
     * @return boolean
     */

    public function update(array $data)
    {
        $result = $this->createOrUpdate($data, $this->subscription);
        return $result;
    }

    /**
    *handle|process create and update
    *inherits subscriptionInterface
    */

    public function createOrUpdate(array $data, $subscription = null)
    {
        $data['status'] = 2;
        $data['status_id'] = $this->syncStatus($data);
        unset($data['status']);

        $subscription === null ?
            $subscription = Subscription::create($data)
            :$subscription->update($data);
            return $subscription; 
    }

    protected function syncStatus (array $data){
        $foundStatuses = $this->status
            ->findOrCreateStatus(
            //status of any program that is saved is [published] $this->statuses[0]
                [$this->statuses[$data['status']]], 
                 $data['slug']
             );
        $status_id = '';       
        foreach($foundStatuses as $status)
        {
            $status_id = $status->status_id;
        }
        return $status_id;
    }

    /**
     * Get total subscription count
     *
     * @todo I hate that this is public for the decorators.
     *       Perhaps interface it?
     * @return int  Total subscription
     */
    protected function totalsubscriptions($all = false)
    {
        if( ! $all )
        {
            return $this->subscription->where('status_id', 3)->count();
        }

        return $this->subscription->count();
    }
}