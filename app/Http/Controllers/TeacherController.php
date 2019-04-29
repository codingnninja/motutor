<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Subject;
use Auth;


class TeacherController extends Controller
{
    /**
     * schoolclass model
     * @var Laravel model
     */

    public $subject;

    /**
     * class model
     * @var Laravel model
     */

    public $class;

    public function __construct(SchoolClass $class, Subject $subject, Request $request)
    {
        $this->subject = $subject;
        $this->class = $class;
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
     * gets all classes and related students
     * 
     * @return view
     */
    public function class()
    {
       $classes = $this->class->where('teacher_id', auth::user()->id)->get();
       return view('pages.core.class.display_classes', ['classes' => $classes]);
    }

    /**
     * gets all classes and related students
     * 
     * @return view
     */
    public function subjects()
    {
       $subjects = $this->subject->where('teacher', auth::user()->id)->get();
       return view('pages.core.subject.display_subjects', ['subjects' => $subjects]);
    }

}
