<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ActionEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
//    public $actionId;
//    public $actionData;
    public $message;
    public $nickname;
    public $data;
    /**
     * Create a new event instance.
     *
     * @author Author
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->message = $data['message'];
        $this->nickname = $data['nickname'];
//        $this->data=$data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @author Author
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
//        return new Channel('action-channel-one');
        return new Channel('news-action');
    }
//    public function broadcastOn()
//    {
//        return ['news-action'];
//    }
    public function broadcastAs()
    {
        return 'action-event';
    }
    /**
     * Get the data to broadcast.
     *
     * @author Author
     *
     * @return array
     */
//    public function broadcastWith()
//    {
//        return [
//            $data['message'] = $this->message,
//            $data['nickname'] = $this->nickname,
//
//        ];
//    }
}
