<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminAlert extends Notification
{
    use Queueable;

    public $message;
    public $type;
    public $url;

    /**
     * Creer un nouvelle instance de notification.
     */
    public function __construct($message, $type, $url = '#')
    {
        $this->message = $message;
        $this->type = $type;
        $this->url = $url;
    }

    /**
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message,
            'type' => $this->type,
            'url' => $this->url,
        ];
    }
}
