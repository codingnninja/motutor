<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
    *The incrementing identification use by tag
    *
    *@var string
    */
    protected $primaryKey = "status_id";
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statuses';

    /**
    *The database table id used by the model
    *
    *@var string
    */

    protected $primary_key = 'status_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'status',
        'slug',
    );
}
