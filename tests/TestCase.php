<?php

namespace Tests;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
/**
 * Class TestCase
 * @package Tests
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
	/**
     * Set up the test
     */
	 public function setUp()
	    {
	        parent::setUp();
	        $this->withoutExceptionHandling();
    		//create a dummy user
	        $this->user = factory('App\Models\User')->create();
	        $this->eloquentData = factory('App\Models\School')->create();
	    }
}
