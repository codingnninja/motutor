<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
    protected $primaryKey = "comment_id";

    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
    protected $fillable = [
        'student_id', 
        'commentor_id', 
        'comment',
    ];

    /**
     * store comment for about students
     * @param void
     * @return view
      */
      
      public function storeComment($data)
      {
          $student_id = $data['student_id'];
          $commentor_id = auth::user()->id;
          $comment = $data['comment'];
          $newData = [
              'student_id'=> $student_id, 
              'commentor_id' => $commentor_id, 
              'comment' => $comment
          ];

          return $this->create($newData);
      }
}
