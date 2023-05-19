<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Intervenants;
use App\Models\Projet;
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
        return view('projets.create',compact('contacts'),compact('intervenants'));
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
            'nature' => 'required|string|max:255',
            'theme' => 'required|string|max:255',
            'prix_par_intervenants' => 'required',
            'date_projet' => 'required',
            'lieu' => 'required',
            'prix_projet' => 'required',
            'description' => 'required',
            'contact_id' => 'required',
            'url_gestion_administrative' => 'required',
            'intervenants' => 'required'
        ]);

        $projet = new Projet();
        $projet->nature = $request->nature;
        $projet->theme = $request->theme;
        $projet->prix_par_intervenants = $request->prix_par_intervenants;
        $projet->date_projet = $request->date_projet;
        $projet->lieu = $request->lieu;
        $projet->prix_projet = $request->prix_projet;
        $projet->description = $request->description;
        $projet->contact_id = $request->contact_id;
        $projet->url_gestion_administrative = $request->url_gestion_administrative;
        
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
        $projet = Projet::with('contact.entreprise')->find($id);

        $intervenants = $projet->intervenants;
        return view('projets.show', compact('projet','intervenants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::find($id);
        $projet->load('contact.entreprise'); 

        $contact = $projet->contact;
        $entreprise = $contact ? $contact->entreprise : null;

        $intervenants = Intervenants::all();
        return view('projets.edit', compact('projet','intervenants'));
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

        $projet = Projet::find($request->hidden_id);
        $projet->nature = $request->nature;
        $projet->theme = $request->theme;
        $projet->prix_par_intervenants = $request->prix_par_intervenants;
        $projet->date_projet = $request->date_projet;
        $projet->lieu = $request->lieu;
        $projet->prix_projet = $request->prix_projet;
        $projet->description = $request->description;
        $projet->contact_id = $request->contact_id;
        $projet->url_gestion_administrative = $request->url_gestion_administrative;
        
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
