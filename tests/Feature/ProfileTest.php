<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProfileTest extends TestCase
{
    
    use DatabaseMigrations;

	/** @test **/
	public function a_user_has_a_profile(){

		$user = create('App\User',['name'=>'JohnDoe']);

		$this->get('/profiles/'.$user->name)
			->assertSee($user->name);	
	}

	/** @test **/
	public function a_user_profile_has_threads(){
	
		$user = create('App\User',['name'=>'JohnDoe']);

		$threads = create('App\Thread',['user_id'=>$user->id]);

		$this->get('/profiles/'.$user->name)
			->assertSee($threads->title)
			->assertSee($threads->body);

	}

}

?>
