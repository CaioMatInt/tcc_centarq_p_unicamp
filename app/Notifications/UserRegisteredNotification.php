<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserRegisteredNotification extends Notification {

    public function __construct($user) {
        $this->user = $user;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {

        return (new MailMessage)
            ->success()
            ->subject('Welcome')
            ->line('we are happy to see you here.')
            ->line('Please tell your friends about us.');
    }

}
