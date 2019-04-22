<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = "profile_id";

    protected $fillable = [
    	'name',
        'teacher',
    ];
    
}
