<?php namespace Motutor\Service\Form\School;

use Motutor\Service\Validation\AbstractLaravelValidator;

class SchoolFormLaravelValidator extends AbstractLaravelValidator {

    /**
     * Validation rules
     *
     * @var Array
     */
    protected $rules =  [
            'title' => 'required|string',
            'user_id' => 'required|exists:users,id', // Assumes db connection
            'phones' => 'required|string|max:20',
            'address' => 'nullable',
            'emails' => 'required',
            'media' => 'nullable',
            'description' => 'required',
            'what_you_get' => 'required|string|max:600',
            'why_choosing' => 'required',
            'instructors' => 'nullable',
            'tags' => 'required|string',

    ];

}