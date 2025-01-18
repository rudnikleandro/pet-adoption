<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Animal
 *
 * Represents an animal available for adoption in the application.
 * This model manages the attributes and relationships of animals.
 */
class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'breed',
        'size',
        'weight',
        'shelter_id',
    ];

    /**
     * Relationship: Animal has many photos.
     * 
     * This defines the relationship between an animal and its associated photos.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany(AnimalPhoto::class);
    }

    /**
     * Relationship: Animal has one veterinary information record.
     * 
     * This provides detailed health and medical records for the animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function veterinaryInfo()
    {
        return $this->hasOne(VeterinaryInfo::class);
    }

    /**
     * Relationship: Animal has one temperament record.
     * 
     * This includes behavioral characteristics of the animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function temperament()
    {
        return $this->hasOne(Temperament::class);
    }

    /**
     * Relationship: Animal has one energy level record.
     * 
     * This captures the activity level of the animal.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function energyLevel()
    {
        return $this->hasOne(EnergyLevel::class);
    }

    /**
     * Relationship: Animal has one animal relationship record.
     * 
     * This describes how the animal interacts with other animals.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function animalRelationship()
    {
        return $this->hasOne(AnimalRelationship::class);
    }

    /**
     * Relationship: Animal belongs to a shelter.
     * 
     * Defines the association between an animal and its shelter.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    /**
     * Relationship: Animal has one adopter.
     * 
     * Links the animal to its adopter if it has been adopted.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function adopter()
    {
        return $this->hasOne(Adopter::class);
    }
}
