<?php namespace Motutor\Service\Form\Subscription;

use Motutor\Service\Validation\ValidableInterface;
use Motutor\Repo\Subscription\SubscriptionInterface;

class SubscriptionForm {

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
     * Subscription repository
     *
     * @var \Motutor\Repo\Subscription\SubscriptionInterface
     */
    protected $subscription;

    public function __construct(ValidableInterface $validator, SubscriptionInterface $subscription)
    {
        $this->validator = $validator;
        $this->subscription = $subscription;
    }

    /**
     * Create an new subscription
     *
     * @return boolean
     */
    public function save(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }
        return $this->subscription->create($input);
    }

    /**
     * Update an existing subscription model
     *
     * @return boolean
     */
    public function update(array $input)
    {
        if( ! $this->valid($input) )
        {
            return false;
        }
        return $this->subscription->update($input);
    }

    /**
     * Return subscription validation errors
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