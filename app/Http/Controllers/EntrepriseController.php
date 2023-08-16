<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Projet;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entreprises = Entreprise::with('contacts')->get();
        return view('entreprises.index', compact('entreprises'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entreprises.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entreprise = new Entreprise();
        $entreprise->raison_sociale = $request->raison_sociale;
        $entreprise->adresse = $request->adresse;
        $entreprise->telephone = $request->telephone;
        $entreprise->groupe = $request->groupe;
        $entreprise->secteur_activite = $request->secteur_activite;
        $entreprise->save();
        return redirect()->route('entreprises.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entreprise = Entreprise::with(['contacts','projets'])->find($id);
        return view('entreprises.show', compact('entreprise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entreprise = Entreprise::find($id);
        return view('entreprises.edit', compact('entreprise'));
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
        $entreprise = Entreprise::find($id);
        $entreprise->raison_sociale = $request->raison_sociale;
        $entreprise->adresse = $request->adresse;
        $entreprise->telephone = $request->telephone;
        $entreprise->groupe = $request->groupe;
        $entreprise->secteur_activite = $request->secteur_activite;
        $entreprise->save();
        return redirect()->route('entreprises.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entreprise = Entreprise::find($id);
        $entreprise->delete();
        return redirect()->route('entreprises.index');
    }

    public function showProjetSelection($id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $projets = Projet::all();
        return view('entreprises.projet_selection', compact('entreprise', 'projets'));
    }

    public function associateProjets(Request $request, $id)
    {
        $entreprise = Entreprise::findOrFail($id);
        $projets_ids = $request->input('projets');

        // Associer les projets sélectionnés à l'entreprise
        Projet::whereIn('id', $projets_ids)->update(['entreprise_id' => $entreprise->id]);

        return redirect()->route('entreprises.show', $entreprise->id);
    }
}
