<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimalRelationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id', 'good_with_others', 'dominant_with_others', 'better_alone'
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
