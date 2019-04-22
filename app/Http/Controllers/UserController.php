<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Motutor\Repo\Profile\ProfileInterface;
use Motutor\Service\Form\Profile\ProfileForm;
use Motutor\Repo\Status\StatusInterface;
use Auth;
use App\Models\User;


class UserController extends Controller
{
    /**
     * profile repository
     * @var \Motutor\Repo\Profile\EloquentProfile
     */

    public $profile;

    /**
     * profile form service
     * @var \Motutor\Form\Service\ProfileForm
     */

    public $profileForm;

     /**
     * 
     * @var laravel request
     */

    public $request;

     /**
     * user model
     * @var laravel model
     */

    public $user;

    /**
     * status repository
     * @var \Motutor\Repo\Profile\EloquentStatus 
     */
    public $status;
    
    public function __construct(ProfileInterface $profile, Request $request, ProfileForm $profileForm, StatusInterface $status, User $user)
    {
        $this->profile = $profile;
        $this->status = $status;
        $this->user = $user;
        $this->profileForm = $profileForm;
        $this->request = $request->all();
    }
    
    /**
     * 
     */

    public function index()
    {
        return view('pages.core.profile.pages.dashboard');
    }

     /**
     * Show single item. We only want to show edit form
     * @param  int $id item ID
     * @return Redirect
     */
    public function show($id)
    {
        return redirect('/profile/'.$id);
    }

    /**
     * Create profile form
     * GET /profile/create
     */
    public function create()
    {
        return view('pages.core.admin.components.create_school');
    }
    
    /**
     * store new profile for a registered user.
     * @return redirect
     */
    public function store()
    {
        if($this->profileForm->save($this->request))
        {
            return redirect("profile/{$this->request['user_id']}")->with('success','You have created this profile successfully');
        }
        return redirect('/');
    }

    /**
     * Update User and Profile Models
     */
    public function update()
    {
        if($this->profileForm->update($this->request))
        {
            return redirect("profile/{$this->request['user_id']}")->with('success','You have updated this profile successfully');
        }
    }
    
    public function byId($id)
    {
        $gender = ['Female', 'Male'];
        $userRegData = $this->getRegistrationData($id);
        if($userProfile = compact($this->profile->byId($id, 'user')))
        {
            return view('pages.core.profile.pages.profile',[
                'profile' => $userProfile,
                'gender' => $gender[$userProfile->gender],
                'user' => $userRegData,
            ]);
        }
        return view('pages.core.profile.pages.create_user',['user' => $userRegData]);
    }
     /**
     *  
     * GET /profiles/
     */
    public function byPage()
    {
        $user = $this->user->paginate(20);
        return view('pages.core.admin.components.school', [
            'schools' => $users
        ]);
    }

    /**
     * Create profile form
     * GET /profile/profile/{id}/edit
     */
    public function edit($id)
    { 
        $userRegData = $this->getRegistrationData($id);
        if($profile = $this->profile->byId($id, 'user'))
        {
            return view('pages.core.profile.pages.edit_user', [
                'profile' => $profile,
                'user' => $userRegData,
            ]);
        }
    }
    /**
     * get user registration data with id
     * @param $id int
     * @return eloquent object
    */
    public function getRegistrationData($id)
    {
        return $this->user->findOrFail($id);
    }

}
