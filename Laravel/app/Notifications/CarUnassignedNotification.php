<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CarUnassignedNotification extends Notification
{
    
    use Queueable;

    public function __construct()
    {
        //
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from('admin@gmail.com', "Administrator")
        ->subject('Wypisanie samochodu')
        ->line('Nie masz przypisanego zadnego samochodu.');
    }
}
