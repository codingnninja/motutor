<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Motutor\Repo\Subscription\SubscriptionInterface;
use Motutor\Service\Form\Subscription\SubscriptionForm;
use App\Http\Controllers\Controller;
use App\Models\Subscription;

class SubscriptionController extends Controller
{
	protected $subcriptionForm;
	protected $request;
	protected $validatedData;

	public function __construct(SubscriptionInterface $subscription, Request $request, SubscriptionForm $subcriptionForm)
    {
        $this->subscription = $subscription;
        $this->subcriptionForm = $subcriptionForm;
        $this->request = $request->all();
    }

    public function index()
    {
        return view('pages.core.getcontacts');
    }

    /**
     * Show single subscription. We only want to show edit form
     * @param  int $id subscription ID
     * @return Redirect
     */
    public function show($id)
    {
        return redirect('/schools/subscription/'.$id.'/edit');
    }

    /**
     * Create subscription form
     * GET /admin/subscription/create
     */
    public function create ($slug)
	{
        return view('pages.core.getcontacts', [
            'slug' => $slug
        ]);
	}

    /**
     * Create subscription form
     * GET /admin/subscription/{id}/edit
     */
    public function edit($id)
    {
        $subscription = $this->subscription
                             ->byId($id);

        return view('admin.subscription_edit', [
            'subscription' => $subscription,
        ]);
    }

    public function store ()
   	{
        if (request()->slug !== 'process') 
        {
             $this->subcriptionForm
                  ->save($this->request);
             return view('pages.services.confirmation');
        }
        return redirect('/schools');
	}
       
    public function update()
	    {
   	    	$result = $this->subscriptionForm->update($this->request);
            return view('pages.core.subscription', ['result' => $result]);
	    }

   public function delete ($shcool_id)
    	{
    		$subscription = $this->subscriptionModel->destroy(request()->subscription_id);
    		return view('pages.core.admin.components.subscription', ['status => $subscription']);
    	}

	public function statusTest ($result, $status)
		{
			if( $result ) //$this->subscriptionform->save( $input ) 
	        {
            	return request()->wantsJson()
			    ? response()->json($result, $status)
			    : null;

	            // Success!
	            /*return Redirect::to('/admin/subscription')
	                    ->with('status', 'success');*/
	        } else {

	        	return request()->wantsJson()
			    ? response()->json($result, $status)
			    : null;

	           /* return Redirect::to('/admin/subscription/create')
	                    ->withInput()
	                    ->withErrors( $this->articleform->errors() )
	                    ->with('status', 'error');*/
	        }
				
		}
}