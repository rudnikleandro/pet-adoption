<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VeterinaryInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id', 'rabies_vaccine', 'polyvalent_vaccine', 'giardia_vaccine', 
        'flu_vaccine', 'antiparasitic', 'neutered'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
