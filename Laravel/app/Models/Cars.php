<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    public static function deactivateAllExceptOne($userId, $carId)
    {
        self::where('user_id', $userId)->where('id', '!=', $carId)->update(['is_active' => false]);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
