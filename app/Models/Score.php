<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public $viewPaths = [
        'add_score' => 'pages.core.score.add_score',
    ];
    
    public function get($viewPath){
        return $this->viewPaths[$viewPath];
    }
}
