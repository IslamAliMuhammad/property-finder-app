<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentAmenity extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'amenity_id'];
}
