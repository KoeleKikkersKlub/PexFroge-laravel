<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactGegevens extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname',
        'lastname',
        'contactemail',
        'phonenumber',
        'address',
        'city',
        'zip',
    ];
}
