<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = "profile_id";

    protected $fillable = [
        'user_id',
        'class_id',
        'age',
        'gender',
    	'phone',
    	'parents_guidians_name',
	    'parents_guidians_phone',
	    'address',
        'state',
        'doctor_phone',
        'blood_group',
        'city',
	    'country',
	    'avatar',
	    'health_information',//correct typo
    ];
    
	 /**
     * Define a one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->hasOne('App\Models\User', 'id');
    }

}
