<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Villa;
use App\Models\Land;
class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['gov_id', 'city_name'];

    public function governorate(){
        return $this->belongsTo(Governorate::class, 'gov_id');
    }

    public function users(){
        return $this->hasMany(User::class, 'city_id');
    }

    public function apartments(){
        return $this->hasMany(Apartment::class, 'city_id');
    }

    public function villas(){
        return $this->hasMany(Villa::class, 'city_id');
    }

    public function lands() {
        return $this->hasMany(Land::class, 'city_id');
    }
}
