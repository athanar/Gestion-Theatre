<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Entreprise;
use App\Models\Intervenants;
use App\Models\Projet;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        $projets = Projet::where('nom_du_projet', 'LIKE', "%$query%")->get();
        $entreprise = Entreprise::where('raison_sociale', 'LIKE', "%$query%")->get();
        $contacts = Contact::where('nom', 'LIKE', "%$query%")->get();
        $intervenants = Intervenants::where('nom', 'LIKE', "%$query%")->get();

        return view('search-results')->with([
            'projets' => $projets,
            'entreprise' => $entreprise,
            'contacts' => $contacts,
            'intervenants' => $intervenants,
        ]);
    }

    public function search_contacts(Request $request)
    {
        $query = $request->input('query');

        $contacts = Contact::where('nom', 'like', "%{$query}%")
                        ->orWhere('prenom', 'like', "%{$query}%")
                        ->get();

        return response()->json($contacts);
    }

    public function search_intervenants(Request $request)
    {
        $query = $request->input('query');

        $intervenants = Intervenants::where('nom', 'like', "%{$query}%")
                        ->orWhere('prenom', 'like', "%{$query}%")
                        ->get();

        return response()->json($intervenants);
    }

}
