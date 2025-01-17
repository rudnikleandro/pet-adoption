<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnergyLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id', 'high_energy', 'moderate_energy', 'low_energy'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
