<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticpateInForumTest extends TestCase
{
  
  	use DatabaseMigrations;

  	/** @test **/
    public function an_authenticated_user_may_participate_in_forum(){

    	$this->signIn();//authenticated user

    	$thread = create('App\Thread');

    	$reply = create('App\Reply');

    	$this->post($thread->path().'/reply',$reply->toArray());

    	$this->get($thread->path())->assertSee($reply->body);
    }

	/** @test **/
	public function unauthorized_users_cannot_delete_replies(){
		$reply = create('App\Reply');

		$this->delete("/replies/{$reply->id}")
			->assertRedirect("/login");

		$this->signIn();
		$this->delete("/replies/{$reply->id}")
			->assertStatus(403);
	}
	/** @test **/
	public function authorized_user_can_update_replies(){

		$this->signIn();

		$reply = create('App\Reply',['user_id'=>auth()->id()]);

		$updatedReply = "You have been changed fool.";

		$this->patch("/replies/{$reply->id}",['body'=>$updatedReply]);
		// dd(request('body'));
		$this->assertDatabaseHas('replies',['id'=>$reply->id, 'body'=>$updatedReply]);
		
	}

	/** @test **/
	public function unauthorized_users_cannot_update_replies(){
		$reply = create('App\Reply');

		$updatedReply = "You have been changed fool.";

		$this->patch("/replies/{$reply->id}",['body'=>$updatedReply])
			->assertRedirect('login');

		$this->signIn();
		$this->patch("/replies/{$reply->id}")
			->assertStatus(403);
	}
}
