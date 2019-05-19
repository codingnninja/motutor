<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $primaryKey = "score_id";
    /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'subject_id', 
      'student_id', 
      'term', 
      'homework_score',
      'classwork_score',
      'welcome_test_score',
      'note_score',
      'test_score',
      'exam',
      'topics',
  ];

    public $viewPaths = [
        'add_score' => 'pages.core.score.add_score',
    ];
    
    public function get($viewPath){
        return $this->viewPaths[$viewPath];
    }
}
