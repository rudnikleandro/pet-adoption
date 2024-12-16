<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'breed',
        'size',
        'veterinary_info',
        'shelter_id',
    ];

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    public function adopter()
    {
        return $this->hasOne(Adopter::class);
    }
}
