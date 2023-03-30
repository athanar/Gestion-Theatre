<?php

namespace App\Http\Controllers;

use App\Models\Intervenants;
use Illuminate\Http\Request;

class IntervenantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intervenants = Intervenants::all();
        return view('intervenants.index', compact('intervenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('intervenants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $intervenant = new Intervenants();
        $intervenant->nom = $request->input('nom');
        $intervenant->prenom = $request->input('prenom');
        $intervenant->adresse = $request->input('adresse');
        $intervenant->date_naissance = $request->input('date_naissance');
        $intervenant->telephone = $request->input('telephone');
        $intervenant->email = $request->input('email');
        $intervenant->num_secu = $request->input('num_secu');
        $intervenant->num_conges_spectacles = $request->input('num_conges_spectacles');
        $intervenant->statut = $request->input('statut');
        $intervenant->scenariste = $request->input('scenariste') ?? false;
        $intervenant->comedien = $request->input('comedien') ?? false;
        $intervenant->formateur = $request->input('formateur') ?? false;
        $intervenant->impro = $request->input('impro') ?? false;
        $intervenant->chanteur = $request->input('chanteur') ?? false;
        $intervenant->realisateur_monteur = $request->input('realisateur_monteur') ?? false;
        $intervenant->photographe = $request->input('photographe') ?? false;
        $intervenant->musique = $request->input('musique') ?? false;
        $intervenant->langues = implode(',', $request->input('langues')) ?? '';
        $intervenant->commentaire = $request->input('commentaire');
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->getClientOriginalName();
            $path = $photo->storeAs('public/photos', $filename);
            $intervenant->photo = $filename;
        }

        $intervenant->save();

        return redirect()->route('intervenants.index')->with('success', 'Intervenant ajouté avec succès.');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('intervenants.show', ['intervenant' => Intervenants::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('intervenants.edit', ['intervenant' => Intervenants::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $intervenant = Intervenants::findOrFail($id);
        $intervenant->nom = $request->input('nom');
        $intervenant->prenom = $request->input('prenom');
        $intervenant->adresse = $request->input('adresse');
        $intervenant->date_naissance = $request->input('date_naissance');
        $intervenant->telephone = $request->input('telephone');
        $intervenant->mail = $request->input('mail');
        $intervenant->num_secu = $request->input('num_secu');
        $intervenant->num_conges_spectacles = $request->input('num_conges_spectacles');
        $intervenant->statut = $request->input('statut');
        $intervenant->scenariste = $request->input('scenariste') ?? false;
        $intervenant->comedien = $request->input('comedien') ?? false;
        $intervenant->formateur = $request->input('formateur') ?? false;
        $intervenant->impro = $request->input('impro') ?? false;
        $intervenant->chanteur = $request->input('chanteur') ?? false;
        $intervenant->realisateur_monteur = $request->input('realisateur_monteur') ?? false;
        $intervenant->photographe = $request->input('photographe') ?? false;
        $intervenant->musique = $request->input('musique') ?? false;
        $intervenant->langue = implode(',', $request->input('langue')) ?? '';
        $intervenant->commentaire = $request->input('commentaire');
        
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->getClientOriginalName();
            $path = $photo->storeAs('public/photos', $filename);
            $intervenant->photo = $filename;
        }
        
        $intervenant->save();

        return redirect()->route('intervenants.index')->with('success', 'Intervenant modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intervenant = Intervenants::findOrFail($id);
        $intervenant->delete();
        return redirect()->route('intervenants.index')->with('success', 'Intervenant supprimé avec succès.');
    }

    public function search(Request $request)
    {
        $search = $request->q;
       // $intervenants = Intervenants::with('nom', 'LIKE', "%$search%")->get();
        $intervenants = Intervenants::where('nom', 'like', '%'.$search.'%')
                                    ->orWhere('prenom', 'like', '%'.$search.'%')
                                    ->get();
        
        return response()->json($intervenants);
    }

}
