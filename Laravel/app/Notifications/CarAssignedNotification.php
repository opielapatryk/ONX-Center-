<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CarAssignedNotification extends Notification
{
    
    use Queueable;
    private $car;

    public function __construct($car)
    {
        $this->car = $car;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
        ->from('admin@gmail.com', "Administrator")
        ->subject('Przypisanie samochodu')
        ->line('Twój samochód został przypisany.')
        ->line('Marka samochodu: '.$this->car->brand)
        ->line('Model samochodu: '.$this->car->model);
    }
}
