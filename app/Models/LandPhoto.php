<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Land;

class LandPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['land_id', 'photo_path'];

    public function land() {
        return $this->belongsTo(Land::class, 'land_id');
    }
}
