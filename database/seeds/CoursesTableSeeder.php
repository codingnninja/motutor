<?php

use Illuminate\Database\Seeder;
use App\Model\Courses;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	    {
	        $courses = factory(Courses::class, 10)->create();
	    }
}
