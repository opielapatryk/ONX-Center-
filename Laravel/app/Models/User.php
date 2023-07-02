<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; 

class User extends Model
{
    use HasFactory, Notifiable; 
    public function cars()
    {
        return $this->hasMany(Cars::class);
    }

    public function setActiveCar(Cars $car)
    {
        $this->cars()->update(['is_active' => false]); // Ustawia wszystkie samochody użytkownika na nieaktywne
        $car->is_active = true;
        $car->save();
    }
}
