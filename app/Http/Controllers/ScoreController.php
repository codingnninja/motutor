<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use App\Models\Subject;
use App\Models\SchoolClass;
use App\Models\User;
use App\Models\Topic;
use App\Models\Comment;
use Auth;

class ScoreController extends Controller
{

  public function __construct(Score $score, Request $request, Subject $subject, SchoolClass $class, User $user, Topic $topic, Comment $comment)
  {
      $this->score = $score;
      $this->user = $user;
      $this->topic = $topic;
      $this->class = $class;
      $this->subject = $subject;
      $this->comment = $comment;
      $this->data = $request->all();
  }

  public function record($user_id)
  {
      $user = $this->user->find($user_id);
      $subjects = $user->subjects;
      $topics = $this->topic->all();
     return view($this->score->get('add_score'), ['subjects' => $subjects, 'user' => $user, 'topics' => $topics]);
  }

  public function test()
  {
      
      if($this->comment($this->data))
      {
        unset($this->data['comment']);
        //Todo: find out how to store array in data base then remove this;
        $this->data['topics'] = 'topics';
        return $this->score->create($this->data);
      }
  }

  public function store()
  {
    $this->data['topics'] = json_encode($this->data['topics']);
    return $this->data['topics'];
    unset($this->data['comment']);
     return $this->score->create($this->data);
  }

  /**
   * store comment for about students
   * @param void
   * @return view
    */
    
    public function comment($data)
    {
        return $this->comment->storeComment($data);
    }  
}
