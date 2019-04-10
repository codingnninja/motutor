<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   
    /**
    *The incrementing identification use by tag
    *
    *@var string
    */
    protected $primaryKey = "tag_id";
    
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'tag',
        'slug',
    );

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Define a many-to-many relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function schools()
    {
        return $this->belongsToMany('App\Models\School', 'schools_tags', 'tag_id', 'school_id');
    }
}
