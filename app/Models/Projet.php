<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;

    protected $table = 'projets';

    protected $fillable = [
        'nom_du_projet',
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

    public function intervenants() {
        return $this->belongsToMany(Intervenants::class);
    }

    public function projet() {
        return $this->belongsTo(Projet::class);
    }

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
    public function show($id)
{
    $projet = Projet::find($id);
    $contact = $projet->contact;
    $entreprise = $contact ? $contact->entreprise : null;

    // Utilisez dd() pour déboguer
    dd($entreprise);

    $intervenants = $projet->intervenants;
    return view('projets.show', compact('projet','intervenants'));
}


}
