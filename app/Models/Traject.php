<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;



class Traject extends Model
{
    protected $table = 'traject';
    use HasFactory;
    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id', 'id');
    }
    
    public function stageBedrijf(): HasMany
    {
        return $this->hasMany(Bedrijf::class, 'traject_id', 'id');
    }
    
    public function docent(): HasMany
    {
        return $this->hasMany(Docent::class, 'user_id', 'id');
    }
    
}