<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reply;

class FavoriteController extends Controller
{
    
	public function store(Reply $reply){
		$reply->favorite();
		return back();
	}
}
