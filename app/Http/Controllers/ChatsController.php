<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Message;
use App\Events\MessageSent;
class ChatsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function fetchAllMessages(){
    	return Message::with('user')->get();
    }

    public function sendMessage(Request $request)
    {
        //   return Auth::user()->id;

        $messages = auth()->user()->messages()->create([
            'message' => $request->message
        ]);

        broadcast(new MessageSent($messages))->toOthers();

    	return ['status' => 'success'];
    }
}
