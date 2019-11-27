<?php
namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Notification implements ShouldBroadcast{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $username;
    public $message;

    public function __construct(){
        //your variables
    }

    public function broadcastOn(){
        return ['notification'];
    }
}