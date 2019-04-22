<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $primaryKey = "profile_id";

    protected $fillable = [
    	'user_id',
        'age',
        'gender',
    	'phone',
    	'parents_guidians_name',
	    'parents_guidians_phone',
	    'address',
	    'state',
        'city',
	    'country',
	    'avatar',
	    'health_information',
    ];
    
	 /**
     * Define a one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->belongsTo('App\Models\User');
    }

}
