<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $primaryKey = "subscription_id";

    protected $fillable = [
    	'phone',
    	'email',
    	'fullname',
    	'slug',
	];
}
