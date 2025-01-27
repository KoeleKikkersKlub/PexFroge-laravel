<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ContactGegevens extends Model
{
    protected $table = 'contact_gegevens';
    use HasFactory;
    protected $fillable = [
        'voornaam',
        'achternaam',
        'contactemail',
        'telefoonnummer',
        'adres',
        'plaats',
        'postcode',
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
