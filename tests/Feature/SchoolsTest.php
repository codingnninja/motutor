<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\School;

class SchoolsTest extends TestCase
{
	use RefreshDatabase;
	protected $data;
    /**
     * Testing admin can only create,edit,update and delete school.
     *
     * @return void*/

    /** @test */

	public function authenticated_admin_can_crud_school()
		{
			$this->withoutExceptionHandling();
		/**
		*Temporary storage
		*/	
		Storage::fake('public');
		/**
		*Ensure there is there is one data in the database
		*@param int 
		*@param model
		*@return void
		*/

    	$this->assertEquals(1, School::count());

    	/** 
    	*Data to be persisted to the database for testing
    	*@var 
    	*/
    	$file = UploadedFile::fake()->image('image.jpg');

	    $this->data = $this->eloquentData->first()->toArray();

	    $this->data['media'] = $file;
	    $this->data['tags'] = 'offline school, kids';
	    $this->data['status'] = 0;
	    $this->postHandler('store.school', null, 200, $this->data);
	    $this->assertEquals(2, School::count());

	    $school_id = $this->data['school_id'];
	    $this->postHandler('delete.school', $school_id, 200,$this->data);
	    $this->assertEquals(1, School::count());

	    /**
	    *Confirm the data in the databade is one after persisting the data above
	    *@param int 
	    *@param model
	    *@return void
	    */

	    $schools = School::first();

	    $imagePath = 'schools/' . $file->hashName();

		$this->assertEquals($imagePath, $schools->media);

		Storage::assertExists($imagePath);
 		
 		/**
 		*confirm if $data above is equal to the one in the db
 		*/ 

	    $this->assertEquals($this->data['title'], $schools->title);
	    $this->assertEquals($this->data['emails'], $schools->emails);
	    $this->assertEquals($this->data['description'], $schools->description);
	    $this->assertEquals($this->data['why_choosing'], $schools->why_choosing);

	    $fil = UploadedFile::fake()->image('imago.jpg');
	    $n =$this->data;
	    $n['media'] = $fil;
	    $n['school_id'] = 2;
	    $this->postHandler('update.school', null, 200,$n);
	    $this->assertEquals(1, School::count());
	    Storage::assertMissing($schools->media);
	}

	public function postHandler ($routeName, $url = null, $expecting, $data = [])
		{
			/**
		    *persist data to the database by a dummy user through a named route and expecting json response and ok status.
		    *@return void
		    */

		    $this->actingAs($this->user)
			    ->postJson(route($routeName, $url), $data)
			    ->assertStatus($expecting);
		}

	/** @test */
	public function unauthenticated_users_cant_create_new_school()
		{
			$this->data = $this->eloquentData->first()->toArray();
			$this->withExceptionHandling();
	    	$this->actingAs($this->user)
	    		->postJson(route('store.school'), $this->data)
	        	->assertRedirect('/');
	    }
}
