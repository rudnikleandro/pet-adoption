<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'name',
        'phone',
        'email',
        'street',
        'city',
        'state',
        'adoption_date',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    public function shelter()
    {
        return $this->animal->shelter();
    }
}

