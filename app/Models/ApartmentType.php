<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class ApartmentType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function apartments(){
        $this->hasMany(Apartment::class, 'apartment_id');
    }
}
