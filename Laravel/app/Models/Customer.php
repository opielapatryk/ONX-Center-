<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public static function getFirstAvailableId()
    {
        $maxId = Customer::max('id');
        $firstAvailableId = 1;

        for ($i = 1; $i <= $maxId + 1; $i++) {
            $customer = Customer::find($i);

            if (!$customer) {
                $firstAvailableId = $i;
                break;
            }
        }

        return $firstAvailableId;
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function cars()
    {
        return $this->hasMany(Customercar::class);
    }
}
