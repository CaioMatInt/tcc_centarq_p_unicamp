<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserCreatedResetPasswordNotification extends Notification {

    public function __construct($user) {
        $this->user = $user;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {

        return (new MailMessage)
            ->subject('Confirmacao de registro em Centarq')
            ->markdown(
            'emails.resetPasswordForCreatedUser', ['user' => $notifiable]
        );
    }

}
