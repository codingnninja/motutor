<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


class StaffController extends Controller
{
    protected $staff,
              $request;

    public function __construct(User $staff, Request $request)
    {
        $this->staff = $staff;
        $this->request = $request->all();
    }

    /**
    * Show single school. We only want to show edit form
    * @param  int $id school ID
    * @return Redirect
    */
    public function show($id)
    {
        return redirect('/admin/school/'.$id.'/edit');
    }

    /**
    * Create student form
    * GET /admin/student/create
    */
    public function create()
        {
        $statuses = $this->status->all();
        return view('pages.core.admin.components.create_school', [
        'statuses' => $statuses,
        ]);
    }

    /**P
    * Get students
    * GET /admin/students
    */
    public function byPage()
    {
        /*
         *@Todo: the teacher type should be changed to staff to be inclusive of every staff
         */
        $staff = $this->staff->where('type', 'teacher')->paginate(20);
        return view('pages.core.admin.components.list', [
        'students' => $staff,
        ]);
    }
}
