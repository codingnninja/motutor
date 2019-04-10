<?php

use Illuminate\Database\Seeder;
use App\Models\Schools;

class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
	    {
	        $schools = factory(Schools::class, 10)->create();
	    }
}
