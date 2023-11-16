<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StagemarktProfiel extends Model
{
    use HasFactory;
    protected $table = 'stagemarkt_profiel';

    protected $fillable = [
        'cg_id',
        'name',
        'kvk_naam',
        'kvk_nummer',
        'kvk_vestigingsnummer',
        'bedrijfsindeling',
        'bedrijfsgrootte',
        'capaciteit',
    ];

    public function Bedrijf() :BelongsTo
    {
        return $this->belongsTo(Bedrijf::class);
    }
}
