<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
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

    /**
     * profile model
     * @var Laravel model
     */

    public $profile;

    public function __construct(SchoolClass $class, Subject $subject, Request $request, Profile $profile)
    {
        $this->subject = $subject;
        $this->class = $class;
        $this->profile = $profile;
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
       $classes = $this->class->all();
       return view('pages.core.class.display_classes', ['classes' => $classes]);
    }

    /**
     * gets all classes and related students
     * 
     * @return view
     */
    public function studentsForSubject()
    {
       $subjects = $this->subject->where('teacher', auth::user()->id)->get();
       return $subjects;
    }

    /**
     * gets all subjects managed by Id
     * 
     * @return view
     */
    public function subjects()
    {
       $subjects = $this->subject->all();
       return view('pages.core.subject.display_subjects', ['subjects' => $subjects]);
    }

    /**
     * gets all students in a class
     * 
     * @return view
     */
    public function studentsInClass($class_id)
    {
       $studentsInClass = $this->profile->where('class_id', $class_id)->get();
       return view('pages.core.display_one', ['items' => $studentsInClass]);
    }

}
