<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserInvitationNotification extends Notification
{
    use Queueable;

    protected $password;

    public function __construct($password)
    {
        $this->password = $password;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('You have been invited to ' . config('app.name'))
                    ->line('You have been invited to join ' . config('app.name') . '.')
                    ->line('Your account has been created with the following details:')
                    ->line('Email: ' . $notifiable->email)
                    ->action('Set Your Password using', url('/password/reset'))
                    ->line('If you did not expect this invitation, no further action is required.');
    }
}