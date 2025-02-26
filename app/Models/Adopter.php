<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Adopter
 *
 * Represents an adopter of an animal in the application.
 * This model manages the relationship and data associated with adopters.
 */
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

    /**
     * Relationship: Adopter belongs to an Animal.
     * 
     * Defines the relationship between an adopter and the animal they adopted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

    /**
     * Relationship: Shelter associated with the adopted animal.
     * 
     * This retrieves the shelter through the related animal.
     * Useful for indirectly accessing shelter details for an adopter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     */
    public function shelter()
    {
        return $this->animal->shelter();
    }
}
