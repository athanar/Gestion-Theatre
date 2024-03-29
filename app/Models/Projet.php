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
        'statut'
    ];

    public function intervenants() {
        return $this->belongsToMany(Intervenants::class, 'remunerations', 'projet_id', 'intervenant_id')
                ->withPivot('montant', 'type');
    }


    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function commentaires()
    {
        return $this->hasMany('App\Models\Commentaires');
    }
    
    public function remunerations()
    {
        return $this->hasMany(Remuneration::class);
    }
    
    public function show($id)
    {
        $projet = Projet::with(['contact.entreprise' , 'intervenants','intervenants.remunerations'])->find($id);
        $contact = $projet->contact;
        $entreprise = $contact ? $contact->entreprise : null;

        $intervenants = $projet->intervenants;
        return view('projets.show', compact('projet', 'intervenants','entreprise'));
    }


}
