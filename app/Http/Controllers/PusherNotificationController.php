<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherNotificationController extends Controller
{

	public function demo(){
		return view('demo');
	}

	public function test(){
		return view('test');
	}
	public function testWithId($id){
		dd($id);
	}
    public function sendNotification(){
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            '874a2086ae007b106fbe',
            'd3347325873e402845c9',
            '769673', $options
        );

        $message= "Hello Cloudways";

        //Send a message to notify channel with an event name of notify-event
        $res = $pusher->trigger('notification', 'notification-event', $message);
        // return 
        dd($res);
    }
}
