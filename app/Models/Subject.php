<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $primaryKey = "subject_id";

    protected $fillable = [
    	'name',
        'teacher',
    ];

     /**
     * Define a many-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'students_subjects', 'subject_id', 'user_id');
    }
    
}
