<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Temperament
 *
 * Represents the temperament characteristics of an animal,
 * providing insights into its behavior and personality traits.
 */
class Temperament extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'calm',
        'playful',
        'protective',
        'agressive'
    ];

    /**
     * Define the relationship: this temperament entry belongs to a specific animal.
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
