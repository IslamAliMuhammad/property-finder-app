<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
class Governorate extends Model
{
    use HasFactory;

    protected $fillable = ['governorate_name'];

    public function cities(){
        return $this->hasMany(City::class, 'gov_id');
    }
}
