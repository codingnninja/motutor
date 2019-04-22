<?php namespace Motutor\Service\Validation;

use Illuminate\Validation\Factory;

abstract class AbstractLaravelValidator implements ValidableInterface {

    /**
     * Validator
     *
     * @var \Illuminate\Support\Facades\Validator
     */
    protected $validator;

    /**
     * Validation data key => value array
     *
     * @var Array
     */
    protected $data = [];

    /**
     * Validation errors
     *
     * @var Array
     */
    protected $errors = [];

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules = [];

    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Set data to validate
     *
     * @return \Motutor\Service\Validation\AbstractLaravelValidator
     */
    public function with(array $data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Validation passes or fails
     *
     * @return Boolean
     */
    public function passes()
    {
        $validator = $this->validator->make($this->data, $this->rules);

        if( $validator->fails() )
        {
            $this->errors = $validator->messages();
            return false;
        }

        return true;
    }

    /**
     * Return errors, if any
     *
     * @return array
     */
    public function errors()
    {
        return $this->errors;
    }

}