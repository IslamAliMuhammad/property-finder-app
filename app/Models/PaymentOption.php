<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;
class PaymentOption extends Model
{
    use HasFactory;

    protected $fillable = ['option'];

    public function apartments(){
        return $this->hasMany(Apartment::class, 'payment_option_id');
    }
}
