<?php
namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat');
    }

    public function fetchMessages()
    {
        return Message::all();
    }

    public function sendMessage(Request $request)
    {
        $user = session()->get('user');

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $message = Message::create([
            'message' => $request->message,
            'user_id' => $user['user_id'],
            'user_name' => $user['name'],
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json([
            'message' => $message->message,
            'user_id' => $message->user_id,
            'user_name' => $message->user_name,
            'created_at' => $message->created_at->toDateTimeString(),
            'updated_at' => $message->updated_at->toDateTimeString()
        ]);
    }
}
