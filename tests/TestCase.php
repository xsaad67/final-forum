<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null,$attributes=[]){

    	$user = $user ?: create('App\User',$attributes);

    	$this->actingAs($user);

    	return $this;

    }
}
