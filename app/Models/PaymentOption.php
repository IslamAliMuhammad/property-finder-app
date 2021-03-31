<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;
use App\Models\Villa;
use App\Models\Land;

class PaymentOption extends Model
{
    use HasFactory;

    protected $fillable = ['option'];

    public function apartments(){
        return $this->hasMany(Apartment::class, 'payment_option_id');
    }

    public function villas(){
        return $this->hasMany(Villa::class, 'payment_option_id');
    }

    public function lands() {
        return $this->hasMany(Land::class, 'payment_option_id');   
    }
}
