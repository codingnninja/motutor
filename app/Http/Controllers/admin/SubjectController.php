<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;

class SubjectController extends Controller
{
    protected $subject,
              $request,
              $user;

    public function __construct(Subject $subject, Request $request, User $user)
    {
        $this->subject = $subject;
        $this->user = $user;
        $this->request = $request->all();
    }

    /**
    *We only want to show create form with created subjects if any.
    * 
    * @return view
    */
    public function byPage()
    {     
        $subjects = $this->subject->all();
        $teachers = $this->user->where('type', 'teacher')->get();
        return view('pages.core.subject.subject', ['teachers' => $teachers, 'subjects' => $subjects]);
    }

    /**
     * store a new subject.
     * @return redirect
     */
    public function store()
    {
        if($this->subject->create($this->request))
        {
            return redirect("/admin/subjects")->with('success','You have created the subject successfully');
        }
        return redirect("admin/subjects")->with('danger','We are unable to create the subject');
    }
}
