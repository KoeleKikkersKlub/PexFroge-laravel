<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Traject extends Model
{
    use HasFactory;
    public function Student() :HasOne
    {
        return $this->hasOne(Student::class);
        }

    public function StageBedrijf() : HasMany
    {
        return $this->hasMany(Bedrijf::class);
    }

    public function Docent() : HasMany
    {
        return $this->hasMany(Docent::class);
    }
}