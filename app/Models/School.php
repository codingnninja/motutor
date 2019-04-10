<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
	protected $primaryKey = "school_id";

    protected $fillable = [
    	'user_id',
    	'status_id',
    	'slug',
    	'title',
	    'emails',
	    'address',
	    'phones',
        'status',
	    'media',
	    'description',
	    'why_choosing',
	    'instructors',
	    'what_you_get',
        '_token',
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

    /**
     * Define a one-to-one relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    /**
     * Define a many-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(
            'App\Models\Tag', 
            'schools_tags', 
            'school_id', 
            'tag_id')->withTimestamps();
    }
}
