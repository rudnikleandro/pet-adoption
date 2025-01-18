<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EnergyLevel
 *
 * Represents the energy level classification of an animal, providing details
 * about its activity and energy needs.
 */
class EnergyLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'high_energy',
        'moderate_energy',
        'low_energy'
    ];

    /**
     * Define the relationship: this energy level entry belongs to a specific animal.
     *
     * Establishes a foreign key relationship to the Animal model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
