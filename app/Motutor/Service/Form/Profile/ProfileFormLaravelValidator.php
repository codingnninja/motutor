<?php namespace Motutor\Service\Form\Profile;

use Motutor\Service\Validation\AbstractLaravelValidator;

class ProfileFormLaravelValidator extends AbstractLaravelValidator {

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules =  [
            'user_id' => 'required|exists:users,id', // Assumes db connectio
            'age' => 'required|string|max:20',
            'gender' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'parents_guidians_name' => 'nullable|string|max:255',
            'parents_guidians_phone' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'avatar' => 'nullable',
            'health_information' => 'nullable|string|max:255',
    ];

}