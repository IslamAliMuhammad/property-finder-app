<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use APP\Models\Apartment;
class Amenity extends Model
{
    use HasFactory;

    protected $fillable = ['amenity'];

    public function apartments(){
        return $this->belongsToMany(Apartment::class, 'apartment_amenity', 'amenity_id', 'apartment_id');
    }
}
