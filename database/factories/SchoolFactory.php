<?php
use Faker\Generator as Faker;
use App\Models\School;


$factory->define(School::class, function (Faker $faker) {
    return [
    		'user_id' => 1,
    		'status_id' => 1,
    		'slug' => $this->faker->sentence,
    		'title' => $this->faker->name,
	        'phones' => $this->faker->randomNumber(),
	        'emails' => $this->faker->unique()->safeEmail,
	        'description' => $this->faker->sentence,
	        'why_choosing' => $this->faker->sentence,
	        'address' => $this->faker->sentence,
	        'instructors' => $this->faker->sentence,
	        'what_you_get' => $this->faker->sentence,
	        // An image file called 'image.jpg' with width = 1px and height = 1px
   		    'media' => '',
	    ];
});
            