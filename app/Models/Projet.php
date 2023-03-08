<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nature',
        'theme',
        'prix_par_intervenants',
        'date_projet',
        'lieu',
        'prix_projet',
        'description',
        'contact_id',
        'url_gestion_administrative',
    ];
}
