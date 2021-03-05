<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\ApartmentPhoto;
use App\Models\ApartmentType;
use App\Models\PaymentOption;
use App\Models\City;
use App\Models\Amenity;

class Apartment extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function user(){
        return $this->belongsTo(user::class, 'user_id');
    }

    public function photos(){
        return $this->hasMany(ApartmentPhoto::class, 'apartment_id');
    }

    public function type(){
        return $this->belongsTo(ApartmentType::class, 'apartment_type_id');
    }

    public function paymentOption(){
        return $this->belongsTo(PaymentOption::class, 'payment_option_id');
    }

    public function city(){
        return $this->belongsTo(City::class, 'city_id');
    }

    public function amenities(){
        return $this->belongsToMany(Amenity::class, 'apartment_amenity', 'apartment_id', 'amenity_id');
    }
}


