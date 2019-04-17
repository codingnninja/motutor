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
        $this->school = $profile;
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
        return view('pages.core.teacher.pages.dashboard');
    }

    /**
     * Create profile form
     * GET /teacher/create
     */
    public function create()
    {
        $statuses = $this->status->all();
        return view('pages.core.admin.components.create_school', [
            'statuses' => $statuses,
        ]);
    }
    /**
     * store new profile for a registered user.
     * @return redirect
     */
    public function store()
    {
        if($this->profileForm->save($this->request))
        {
            return view('pages.core.admin.dashboard', ['user' => $school]);
        }
        return redirect('/');
    }

    /**
     * Update User and Profile Models
     */
    public function update()
    {
        $newUser = $this->user->update($this->request);
        $newProfile = $this->profileForm->update($this->request);
        return view('pages.core.admin.components.create_school', ['result' => $result]);
    }
    
    public function byId()
    {
        return view('pages.core.teacher.pages.profile');
    }
     /**
     *  
     * GET /teachers/
     */
    public function byPage()
    {
        $page = 1;
        $perPage = 100;
        $user = $this->user->paginate(20);
        return view('pages.core.admin.components.school', [
            'schools' => $schools->items
        ]);
    }

    /**
     * Create profile form
     * GET /teacher/profile/{id}/edit
     */
    public function edit()
    {
        $statuses = $this->status->all();
        return view('pages.core.teacher.pages.edit_user', [
            'statuses' => $statuses,
        ]);
    }

}
