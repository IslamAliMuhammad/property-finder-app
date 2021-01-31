<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class ApartmentPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'photo_path'];

    public function apartment(){
        return $this->belongsTo(Apartment::class, 'apartment_id');
    }
}
