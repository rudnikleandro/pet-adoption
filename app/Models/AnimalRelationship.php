<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnimalRelationship
 *
 * This model represents the social behavior and compatibility of an animal
 * with other animals, providing details about its relationships.
 */
class AnimalRelationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'good_with_others',
        'dominant_with_others',
        'better_alone'
    ];

    /**
     * Define the relationship: this relationship entry belongs to a specific animal.
     *
     * This establishes a foreign key relationship to the Animal model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
