<?php

namespace App\Http\Controllers;

use App\Models\Commentaires;
use App\Models\Contact;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::with('entreprises')->get();
        foreach($contacts as $contact){
           $contact['entreprises'] = Entreprise::find($contact->entreprise_id);
        }
       
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entreprises = Entreprise::all();
        return view('contacts.create', compact('entreprises'));
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
            'nom' => 'required|max:255',
            'prenom' => 'required|max:255',
            'fonction' => 'required|max:255',
            'email' => 'required|email',
            'telephone' => 'required',
            'entreprise_id' => 'required|exists:entreprises,id'
        ]);
        $contact = new Contact();
        $contact->nom = $validatedData['nom'];
        $contact->prenom = $validatedData['prenom'];
        $contact->fonction = $validatedData['fonction'];
        $contact->telephone = $validatedData['telephone'];
        $contact->email = $validatedData['email'];
        //$contact->entreprises = Entreprise::find($contact->entreprise_id);
        $contact->entreprise_id = $validatedData['entreprise_id'];

        $contact->save();
        return redirect()->route('contacts.index')->with('success', 'Contact créé avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::with('entreprises')->find($id);
        $commentaires = Commentaires::with('contact_id')->find($id);

        $contact->entreprises = Entreprise::find($contact->entreprise_id);
        $contact->commentaires = Commentaires::find($contact->$id);
        dump($commentaires);
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::with('entreprises')->find($id);
        $entreprises = Entreprise::all();
        return view('contacts.edit', compact('contact'),compact('entreprises'));
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
        $contact = Contact::find($id);
        $contact->nom = $request->nom;
        $contact->prenom = $request->prenom;
        $contact->fonction = $request->fonction;
        $contact->telephone = $request->telephone;
        $contact->email = $request->email;
        $contact->entreprise_id = $request->entreprise_id;

        $comments = [];
        $comment = [        
            'commentaire' => $request->comment,
            'contact_id' => $contact->id,
            'date' => now()
        ];
        array_push($comments, $comment);
        $contact->commentaires = $comments;

        $contact->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index');
    }

}
