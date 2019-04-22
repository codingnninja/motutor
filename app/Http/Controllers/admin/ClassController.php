<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\User;

class ClassController extends Controller
{
    protected $subject,
              $request,
              $class,
              $user;

    public function __construct(Subject $subject, Request $request, SchoolClass $class, User $user)
    {
        $this->subject = $subject;
        $this->class = $class;
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
        $classes = $this->class->all();
        $teachers = $this->user->all();
        return view('pages.core.class.class', [
            'subjects' => $subjects, 
            'classes' => $classes,
            'teachers' => $teachers,
        ]);
    }

    /**
    * store a new subject.
    * @return redirect
    */
    public function store()
    {
        if($this->class->create($this->request))
        {
            return redirect("/admin/classes")->with('success','You have created the class successfully');
        }
        return redirect("admin/subjects")->with('danger','We are unable to create the class');
    }
}
