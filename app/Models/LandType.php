<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Land;
class LandType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];
    
    public function lands() {
        return $this->hasMany(Land::class, 'land_type_id');
    }
}
