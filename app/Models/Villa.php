<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\VillaPhoto;
use App\Models\Amenity;
use App\Models\VillaType;
use App\Models\PaymentOption;
use App\Models\City;

class Villa extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function photos(){
        return $this->hasMany(VillaPhoto::class, 'villa_id');
    }

    public function amenities(){
        return $this->belongsToMany(Amenity::class, 'villa_amenity', 'villa_id', 'amenity_id');
    }

    public function type(){
        return $this->belongsTo(VillaType::class, 'villa_type_id');
    }

    public function paymentOption(){
        return $this->belongsTo(PaymentOption::class, 'payment_option_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }
}
