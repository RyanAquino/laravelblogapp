<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\User;

class ChatController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view ('pages.chat');
    }

    public function showChat(){
    	return Message::with('user')->get();
    }
    
    // public function postMsg(){
    //     $user = Auth::user();

    //     $user->messages()->create([
    //         'message' => request()->get('message')
    //     ]);
    // }


}
