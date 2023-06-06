<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserChatNotification implements ShouldBroadcastNow
{
	use Dispatchable, InteractsWithSockets, SerializesModels;

	public $message;
	public $ecrowId;

	public function __construct($message,$ecrowId)
	{
		$this->message = $message;
		$this->ecrowId = $ecrowId;
	}

	public function broadcastOn()
	{
		return ['user-chat-notification.' . $this->ecrowId];
	}
}
