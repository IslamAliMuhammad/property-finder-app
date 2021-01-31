<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartmentPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['apartment_id', 'photo_path'];
}
