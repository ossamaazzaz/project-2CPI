<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Orders;
use Pusher\Pusher;

class MissingProducts extends Event implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    protected $order;
    protected $time;
    public function __construct(Orders $orders)
    {
        $this->order = $orders;
        $this->time = date('Y-m-d H:i:s');
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'eu', 
            'encrypted' => true
        );
 
       //Remember to set your credentials below.
        $pusher = new Pusher(
            '1f6e9b9676f948197518',
            'f3b116404a3d29bf63f4',
            '535519',
            $options
        );        
        //Send a message to notify channel with an event name of notify-event
        $pusher->trigger('privateorder.' . $this->order->user->id, 'MissingProducts', ['data' => $this->order->code, 'created_at' => $this->time]);  
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('order.'.$this->order->user->id);
    }
}
