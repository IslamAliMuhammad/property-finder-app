<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Governorate;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = ['gov_id', 'city_name'];

    public function gov()
    {
        return $this->belongsTo(Governorate::class);
    }
}
