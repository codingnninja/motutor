<?php namespace Motutor\Service\Form\Subscription;

use Motutor\Service\Validation\AbstractLaravelValidator;

class SubscriptionFormLaravelValidator extends AbstractLaravelValidator {

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules =  [
             // Assumes db connection
            'phone' => 'required|string|max:20',
            'email' => 'required',
            'fullname' => 'required|string|max:60',
            'slug' => 'required|string'
    ];

}