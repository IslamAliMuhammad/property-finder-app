<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Villa;
class VillaType extends Model
{
    use HasFactory;

    protected $fillable = ['type'];

    public function villas(){
        return $this->hasMany(Villa::class, 'villa_type_id');
    }
}
