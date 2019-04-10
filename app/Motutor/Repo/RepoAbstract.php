<?php 
namespace Motutor\Repo;

abstract class RepoAbstract {

    /**
    *Statuses for this application models
    *@var array
    */

    protected $statuses = [
        'status',
        'published',
        'draft',
        'activated',
        'deactivated',
    ];

    /**
     * Retrieve by id
     * regardless of status
     * @param \Illuminate\Database\Eloquent\Model  $model
     * @param  int $id ID
     * @return stdObject object 
     */

     /** Make a string "slug-friendly" for URLs
     * @param  string $string  Human-friendly tag
     * @return string       Computer-friendly tag
     */
    protected function slug($string)
        {
            return filter_var( 
            	str_replace(
                    ' ',
                    '-', 
                    strtolower( trim($this->addUniqueIdTo($string)))
                ), 
                FILTER_SANITIZE_URL
            );
        }

    protected function addUniqueIdTo($string)
    {
        return $string."-".uniqid();
    }

     /**
     * Find existing tags or create if they don't exist
     *
     * @param  array $data  Array of strings, each representing a datum
     * @param  string $slug  Unique string to locate an item
     * @param  arrayable object @model  database  table controller
     * @param  table row $row
     * @return array        Array or Arrayable collection of objects
     */
    public function findOrCreate (array $data, $slug, $row)
    {
        $found = $this->{$row}->whereIn($row, $data)->get();

        $returnData = [];

        if ( $found )
        {
            foreach( $found as $datum )
            {
                $pos = array_search($datum->{$row}, $data);

                // Add returned data to array
                if( $pos !== false )
                {
                    $returnData[] = $datum;
                    unset($data[$pos]);
                }
            }
        }

        // Add remainings data as new
        foreach ( $data as $datum )
        {
            $returnData[] = $this->{$row}
                ->create([ $row => $datum,
                    'slug' => $this->slug($slug),
                ]);
        }

        return $returnData;
    }

}