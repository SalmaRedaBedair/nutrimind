<?php

namespace App\Http\Controllers\API\Chat;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\MessageRequest;
use App\Interfaces\Chats\ChatRepositoryInterface;

class ChatController extends Controller
{

    private $chatRepository;

    public function __construct(ChatRepositoryInterface $chatRepository)
    {
        $this->chatRepository = $chatRepository;
    }

    //start new chat method
    public function create(MessageRequest $request)
    {
        return $this->chatRepository->create($request);
    }



    //show all messages in the chat
    public function showMessages(Request $request){
        $chat_messages = Message::all()->where('receiver_name',$request->receiver_name);
        return response([
            'status' => true,
            $chat_messages
        ]);
    }


    //show all chats user have
    public function showChats(){
        $chat = Chat::all()->where('sender_name',Auth::user()->name);
        return response([
            'status' => true,
            $chat
        ]);
    }

    //search for specific chat
    public function search(Request $request){
        $filter = $request->receiver_name;
        $chat = Chat::query()
            ->where('receiver_name', 'LIKE', "%{$filter}%")
            ->get();
        return response([
            'status' => true,
            $chat
        ]);

    }
}
