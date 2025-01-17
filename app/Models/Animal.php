<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function photos()
    {
        return $this->hasMany(AnimalPhoto::class);
    }

    public function veterinaryInfo()
    {
        return $this->hasOne(VeterinaryInfo::class);
    }

    public function temperament()
    {
        return $this->hasOne(Temperament::class);
    }

    public function energyLevel()
    {
        return $this->hasOne(EnergyLevel::class);
    }

    public function animalRelationship()
    {
        return $this->hasOne(AnimalRelationship::class);
    }

    public function shelter()
    {
        return $this->belongsTo(Shelter::class);
    }

    public function adopter()
    {
        return $this->hasOne(Adopter::class);
    }
}
