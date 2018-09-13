<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ActivityTest extends TestCase
{
  
  	use DatabaseMigrations;

 	/** @test **/
 	public function it_records_activity_when_a_thread_is_created(){
 		
 		$this->signIn();

 		$thread = create('App\Thread');
 		$this->assertDatabaseHas('activities',[
 			'type' => 'created_thread',
 			'user_id' => auth()->id(),
 			'subject_id' => $thread->id,
 			'subject_type' => 'App\Thread',
 		]);

 		$activity = \App\Activity::first();

 		$this->assertEquals($activity->subject->id,$thread->id);
 	}

	/** @test **/
	public function it_records_activity_when_a_reply_is_created(){

		$this->signIn();

 		$reply = create('App\Reply');

 		$this->assertDatabaseHas('activities',[
 			'type' => 'created_reply',
 			'user_id' => auth()->id(),
 			'subject_id' => $reply->id,
 			'subject_type' => 'App\Reply',
 		]);


	}

	/** @test **/
	public function it_fetches_a_feed_for_user(){
		$this->signIn();
		$threads = create('App\Thread',['user_id'=>auth()->id()],2);

		auth()->user()->activities()->first()->update(['created_at'=>\Carbon\Carbon::now()->subWeek()]);


		$feed = \App\Activity::feed(auth()->user());
		
		$this->assertTrue($feed->keys()->contains(
			\Carbon\Carbon::now()->format('d-m-Y')
		));

		$this->assertTrue($feed->keys()->contains(
			\Carbon\Carbon::now()->subWeek()->format('d-m-Y')
		));

	}
}

?>
