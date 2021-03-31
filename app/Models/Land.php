<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\LandPhoto;
use App\Models\LandType;
use App\Models\PaymentOption;
use App\Models\City;

class Land extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function photos() {
        return $this->hasMany(LandPhoto::class, 'land_id');
    }

    public function type() {
        return $this->belongsTo(LandType::class, 'land_type_id');
    }

    public function paymentOption() {
        return $this->belongsTo(PaymentOption::class, 'payment_option_id');
    }

    public function city() {
        return $this->belongsTo(City::class, 'city_id');
    }
}
