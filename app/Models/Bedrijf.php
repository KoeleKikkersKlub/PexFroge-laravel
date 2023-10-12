<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Bedrijf extends Model
{
    public function StagemarktProfiel() :HasOne
    {
        return $this->hasOne(Bedrijf::class);
    }

    public function BedrijfUser() :HasMany
    {
        return $this->hasMany(BedrijfUser::class);
    }
}

