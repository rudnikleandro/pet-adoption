<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AnimalPhoto
 *
 * Represents a photo associated with an animal in the application.
 * This model manages the attributes and relationship for animal photos.
 */
class AnimalPhoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'photo_path',
    ];

    /**
     * Relationship: AnimalPhoto belongs to an Animal.
     * 
     * This defines the association between a photo and the animal it represents.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
