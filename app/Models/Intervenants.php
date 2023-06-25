<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Intervenants extends Model
{
    use HasFactory;

    protected $table = 'intervenants';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'date_naissance',
        'telephone',
        'email',
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
        'langues',
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

    public function projet() {
        return $this->belongsToMany(Projet::class, 'remunerations', 'intervenant_id', 'projet_id')
                ->withPivot('montant', 'type');
    }

    public function getFilePathAttribute($value)
    {
        return Storage::url($value);
    }

    public function remunerations()
    {
        return $this->hasMany(Remuneration::class);
    }

}
