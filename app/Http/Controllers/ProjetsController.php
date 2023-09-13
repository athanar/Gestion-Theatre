<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Entreprise;
use App\Models\Intervenants;
use App\Models\Projet;
use App\Models\Remuneration;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProjetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projets = Projet::all();
        return view('projets.index',compact('projets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();
        $intervenants = Intervenants::all();    
        $entreprises = Entreprise::all();
        $intervenants = Intervenants::all();

        return view('projets.create',compact('contacts'),compact('intervenants','contacts','entreprises'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'nom_du_projet' => 'required|string|max:255',
            'nature' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'date_projet' => 'required',
            'lieu' => 'required',
            'prix_projet' => 'required',
            'description' => 'required',
            'contact_id' => 'required',
            'url_gestion_administrative' => 'required'
        ]);
        $projet = new Projet();
        $projet->nature = $request->nature;
        $projet->theme = $request->theme;
        $projet->prix_par_intervenants = $request->prix_par_intervenants;
        $projet->date_projet = $request->date_projet;
        $projet->lieu = $request->lieu;
        $projet->prix_de_vente = $request->prix_projet;
        $projet->description = $request->description;
        $projet->contact_id = $request->contact_id;
        $projet->url_gestion_administrative = $request->url_gestion_administrative;
        $projet->statut = $request->statut;
        $projet->nom_du_projet = $request->nom_du_projet;
        $projet->cout_total = $request->cout_total;
        $projet->cout_salarial = $request->cout_salarial;
        $projet->deplacement = $request->deplacement;
        $projet->restauration = $request->restauration;
        $projet->hebergement = $request->hebergement;
        
        $projet->save();

        $projet->intervenants()->attach($request->input('intervenants'));
        
        return redirect()->route('projets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projet = Projet::with(['contact.entreprise','intervenants'])->find($id);
        $contact = $projet->contact;
        $entreprise = $contact ? $contact->entreprise : null;
        $entreprises = Entreprise::all();
        $intervenants = $projet->intervenants;
        return view('projets.show', compact('projet','intervenants','entreprises','contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::with('commentaires')->find($id);
        $projet->load('contact.entreprise'); 
        $contacts = Contact::all();
        $contact = $projet->contact;
        $entreprise = $contact ? $contact->entreprise : null;
        $entreprises = Entreprise::all();
        $intervenants = Intervenants::all();

        return view('projets.edit', compact('projet','intervenants','contacts','entreprises'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        //dd($request);
        $projet = Projet::find($request->hidden_id);
        $projet->nature = $request->nature;
        $projet->theme = $request->theme;
        $projet->prix_par_intervenants = $request->prix_par_intervenants;
        $projet->date_projet = $request->date_projet;
        $projet->lieu = $request->lieu;
        $projet->prix_de_vente = $request->prix_projet;
        $projet->description = $request->description;
        $projet->contact_id = $request->contact_id;
        $projet->url_gestion_administrative = $request->url_gestion_administrative;
        $projet->entreprise_id = $request->entreprise_id;
        $projet->nom_du_projet = $request->nom_du_projet;
        $projet->statut = $request->statut;
        $projet->prix_de_vente = $request->prix_de_vente;
        $projet->nom_du_projet = $request->nom_du_projet;
        $projet->cout_total = $request->cout_total;
        $projet->cout_salarial = $request->cout_salarial;
        $projet->deplacement = $request->deplacement;
        $projet->restauration = $request->restauration;
        $projet->hebergement = $request->hebergement;
       // $projet->commentaire = $request->commentaire; 

       //montant des intervenants
       // Récupérer les rémunérations et les types de rémunérations
        $remunerations = $request->input('remuneration');
        $typesRemuneration = $request->input('type_remuneration');
    
        // Parcourir les intervenants et enregistrer leurs informations
        if ($remunerations !== null) {
            foreach ($remunerations as $intervenantId => $montant) {
                $type = $typesRemuneration[$intervenantId];
            
                // Trouver ou créer la rémunération pour cet intervenant et ce projet
                $remuneration = Remuneration::firstOrNew([
                    'projet_id' => $projet->id,
                    'intervenant_id' => $intervenantId
                ]);

                $remuneration->montant = $montant;
                $remuneration->type = $type;
                $remuneration->save();
            }
        }
        
        $projet->save();
        return redirect()->route('projets.index')->with('success', 'Le Projet a été mis à jour');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $projet = Projet::find($id);
        $projet->delete();

        return redirect()->route('projets.index')->with('success', 'Le projet a été effacé.');
 
    }

}
