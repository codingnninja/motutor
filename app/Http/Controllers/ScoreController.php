<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\User;

class ScoreController extends Controller
{
  
    /**
     * record the score  
     * 
     * @return view
   */
  public function __construct(Score $score, Request $request, Subject $subject, SchoolClass $class, User $user)
  {
      $this->score = $score;
      $this->user = $user;
      $this->class = $class;
      $this->subject = $subject;
      $this->request = $request->all();
  }

  public function record($user_id)
  {
      $user = $this->user->find($user_id);
      $subjects = $user->subjects;
     return view($this->score->get('add_score'), ['subjects' => $subjects, 'user' => $user]);
  }
  
}
