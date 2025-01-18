<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VeterinaryInfo
 *
 * Represents the veterinary information of an animal, including vaccination
 * and medical history details.
 */
class VeterinaryInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'rabies_vaccine',
        'polyvalent_vaccine',
        'giardia_vaccine',
        'flu_vaccine',
        'antiparasitic',
        'neutered'
    ];

    /**
     * Define the relationship: VeterinaryInfo belongs to an Animal.
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
