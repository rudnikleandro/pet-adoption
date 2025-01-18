<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Shelter
 *
 * Represents a shelter that houses animals available for adoption.
 * Stores detailed information about the shelter and its associated animals.
 */
class Shelter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cnpj',
        'street',
        'city',
        'state',
        'phone',
        'responsible_name',
    ];

    /**
     * Relationship: Shelter has many animals.
     * 
     * This defines the one-to-many relationship between a shelter and the animals it houses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
