<?php namespace Motutor\Service\Form\School;

use Motutor\Service\Validation\ValidableInterface;
use Motutor\Repo\School\SchoolInterface;

class SchoolForm {

    /**
     * Form Data
     *
     * @var array
     */
    protected $data;

    /**
     * Validator
     *
     * @var \Motutor\Form\Service\ValidableInterface
     */
    protected $validator;

    /**
     * School repository
     *
     * @var \Motutor\Repo\School\SchoolInterface
     */
    protected $school;

    public function __construct(ValidableInterface $validator, SchoolInterface $school)
    {
        $this->validator = $validator;
        $this->school = $school;
    }

    /**
     * Create an new school
     *
     * @return boolean
     */
    public function save(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        $input['tags'] = $this->processTags($input['tags']);
        return $this->school->create($input);
    }

    /**
     * Update an existing school model
     *
     * @return boolean
     */
    public function update(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        $input['tags'] = $this->processTags($input['tags']);

        return $this->school->update($input);
    }

    /**
     * Return school validation errors
     *
     * @return array
     */
    public function errors()
    {
        return $this->validator->errors();
    }

    /**
     * Test if form validator passes
     *
     * @return boolean
     */
    protected function valid(array $input)
    {
        return $this->validator->with($input)->passes();
    }

    /**
     * Convert string of tags to
     * array of tags
     *
     * @param  string
     * @return array
     */
    protected function processTags($tags)
    {
        $tags = explode(',', $tags);

        foreach( $tags as $key => $tag )
        {
            $tags[$key] = trim($tag);
        }

        return $tags;
    }

}