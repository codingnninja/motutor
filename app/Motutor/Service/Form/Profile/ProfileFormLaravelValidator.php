<?php namespace Motutor\Service\Form\Profile;

use Motutor\Service\Validation\AbstractLaravelValidator;

class ProfileFormLaravelValidator extends AbstractLaravelValidator {

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules =  [
            'user_id' => 'required|exists:users,id', // Assumes db connection
            'age' => 'required|string|max:255',
            'student_phone' => 'required|string|max:20',
            'parents_guidians_name' => 'require|string|max:255',
            'parents_guidians_phone' => 'require|string|max:255',
            'address' => 'nullable',
            'state_region' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'avatar' => 'nullable',
            'health_information' => 'required|string|max:255',
            'class' => 'required|string|max:255',
    ];

}