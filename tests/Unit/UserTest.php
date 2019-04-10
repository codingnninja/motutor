<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserTest extends TestCase
{
	/** @test */
    public function a_default_user_is_not_an_admin()
		{
		    $this->assertFalse($this->user->isAdmin());
		}

	/** @test */
	public function an_admin_user_is_an_admin()
		{
		    $admin = factory(User::class)
		        ->states('admin')
		        ->create();

		    $this->assertTrue($admin->isAdmin());
		}

	/** @test */
	public function a_default_user_can_be_an_instructor()
		{
		    $instructor = factory(User::class)
		        ->states('instructor')
		        ->create();

		    $this->assertTrue($instructor->isInstructor());
		}

}
