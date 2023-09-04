<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class SendMessage implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chat;



    public function __construct($chat)
    {
        $this->chat = $chat;

    }

    public function broadcastOn()
    {
        return [
            new PrivateChannel('chat-message.' . $this->chat->patient_id),
            new PrivateChannel('chat-message.' . $this->chat->doctor_id),
        ];
    }
}
