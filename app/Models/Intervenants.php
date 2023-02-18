<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervenants extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'date_naissance',
        'telephone',
        'mail',
        'num_secu',
        'num_conges_spectacles',
        'statut',
        'scenariste',
        'comedien',
        'formateur',
        'impro',
        'chanteur',
        'realisateur_monteur',
        'photographe',
        'musique',
        'langue',
        'commentaire',
        'photo',
    ];

    protected $casts = [
        'scenariste' => 'boolean',
        'comedien' => 'boolean',
        'formateur' => 'boolean',
        'impro' => 'boolean',
        'chanteur' => 'boolean',
        'realisateur_monteur' => 'boolean',
        'photographe' => 'boolean',
        'musique' => 'boolean',
    ];
}
