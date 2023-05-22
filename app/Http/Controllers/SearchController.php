<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Intervenants;
use App\Models\Projet;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Controller extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');

    $projets = Projet::where('nom', 'LIKE', "%$query%")->get();
    $clients = Client::where('nom', 'LIKE', "%$query%")->get();
    $contacts = Contact::where('nom', 'LIKE', "%$query%")->get();
    $intervenants = Intervenants::where('nom', 'LIKE', "%$query%")->get();

    return view('search-results')->with([
        'projets' => $projets,
        'clients' => $clients,
        'contacts' => $contacts,
        'intervenants' => $intervenants,
    ]);
}

}
