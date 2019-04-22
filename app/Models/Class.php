<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $primaryKey = "class_id";

    protected $fillable = [
    	'name',
        'teacher_id',//class teacher
    ];
}
