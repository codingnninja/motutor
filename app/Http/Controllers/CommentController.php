<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use Auth;

class CommentController extends Controller
{
     /**
     * user authentication
     * @var Laravel auth
     */

    public $auth;

    /**
     * data from request
     * @var Laravel request
     */

    public $request;

     /**
     * comment model
     * @var laravel model
     */

    public $comment;

    /**
     * user model
     * @var laravel model
     */

    public $user;

    public function __construct(Auth $auth, Request $request, Comment $comment, User $user)
    {
        $this->auth = $auth;
        $this->comment = $comment;
        $this->user = $user;
        $this->data = $request->all();
    }
    
    /**
     * store comment for about students
     * @param void
     * @return view
      */
      
    public function store()
    {
        return $this->comment->storeComment($this->data);
    }

    /**
    * dispay comment input
    * @param int $student_id 
    * @return view
    */
    
    public function comment($student_id)
    {
        $user = $this->user->find($student_id);
        return view('pages.core.comment.comment', ['student' => $user]);
    }
}

