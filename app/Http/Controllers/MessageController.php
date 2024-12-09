<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store($conversationId,Request $request)
    {
        // dd($conversationId,$request);
        $message = Message::create([
            'conversation_id' => $conversationId,
            'user_id' => Auth::user()->id,
            'content' => $request->content,
        ]);
        // Phát event MessageSent
        broadcast(new MessageSent($message));
        
        return response()->json($message, 201);
    }

}
