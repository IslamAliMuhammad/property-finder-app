<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Villa;
class VillaPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['villa_id', 'photo_path'];

    public function villa(){
        return $this->belongsTo(Villa::class, 'villa_id');
    }
}
