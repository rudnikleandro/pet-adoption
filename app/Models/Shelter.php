<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}
