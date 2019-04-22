<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class StudentController extends Controller
{
    protected $student,
			  $request;

	public function __construct(User $student, Request $request)
    {
        $this->student = $student;
        $this->request = $request->all();
    }

    /**
     * Show single student. We only want to show edit form
     * @param  int $id student ID
     * @return Redirect
     */
    public function show($id)
    {
        return redirect('/admin/student/'.$id.'/edit');
    }

    /**
     * Create student form
     * GET /admin/student/create
     */
    public function create()
    {
        $statuses = $this->status->all();
        return view('pages.core.admin.components.create_student', [
            'statuses' => $statuses,
        ]);
    }

     /**
     * Get students
     * GET /admin/students
     */
    public function byPage()
    {
        $students = $this->student->where('type', 'student')->paginate(20);
        return view('pages.core.admin.components.list', [
            'students' => $students,
        ]);
    }
}
