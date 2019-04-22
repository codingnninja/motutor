<?php namespace Motutor\Service\Form\Profile;

use Motutor\Service\Validation\ValidableInterface;
use Motutor\Repo\Profile\ProfileInterface;

class ProfileForm {

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
     * Profile repository
     *
     * @var \Motutor\Repo\Profile\ProfileInterface
     */
    protected $profile;

    public function __construct(ValidableInterface $validator, ProfileInterface $profile)
    {
        $this->validator = $validator;
        $this->profile = $profile;
    }

    /**
     * Create an new profile
     *
     * @return boolean
     */
    public function save(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }

        return $this->profile->create($input);
    }

    /**
     * Update an existing profile model
     *
     * @return boolean
     */
    public function update(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        } 
        return $this->profile->update($input);
    }

    /**
     * Return profile validation errors
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
}