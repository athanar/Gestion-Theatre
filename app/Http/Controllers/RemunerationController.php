<?php

namespace App\Http\Controllers;

use App\Models\Intervenants;
use App\Models\Remuneration;
use Illuminate\Http\Request;

class RemunerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Intervenants $intervenant)
    {
        $data = $request->validate([
            'role' => 'required',
            'montant' => 'required|numeric',
            'type_remuneration' => 'required|in:cachet,facture',
        ]);

        $remuneration = new Remuneration($data);
        $remuneration->intervenant()->associate($intervenant);
        $remuneration->save();

        return redirect()->route('intervenant.show', [$intervenant])->with('status', 'Rémunération ajoutée avec succès');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
