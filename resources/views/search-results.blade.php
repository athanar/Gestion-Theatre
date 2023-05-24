@extends('master')
 
@section('content')
    <h1>Résultat de recherche</h1>
    
    <h2>Projets</h2>
    @if ($projets->isEmpty())
        <p>Pas de projets trouvés</p>
    @else
        <ul>
            @foreach ($projets as $projet)
                <li><a href="{{ route('projets.show', $projet) }}">{{ $projet->nom_du_projet }}</a></li>   
            @endforeach
        </ul>
    @endif

    <h2>Intervenants</h2>
    @if ($intervenants->isEmpty())
        <p>Pas d'intervenants.</p>
    @else
        <ul>
            @foreach ($intervenants as $intervenant)
                <li><a href="{{ route('intervenants.show', $intervenant) }}">{{ $intervenant->nom }} {{ $intervenant->prenom }}</a></li>
            @endforeach
        </ul>
    @endif

    <h2>Entreprise</h2>
    @if ($entreprise->isEmpty())
        <p>Pas d'entreprise.</p>
    @else
        <ul>
            @foreach ($entreprise as $entreprises)
                <li><a href="{{ route('entreprises.show', $entreprises) }}">{{ $entreprises->raison_sociale }}</a></li>
            @endforeach
        </ul>
    @endif

    <h2>Contacts</h2>
    @if ($contacts->isEmpty())
        <p>Pas de contacts</p>
    @else
        <ul>
            @foreach ($contacts as $contact)
            <li><a href="{{ route('contacts.show', $contact) }}">{{ $contact->nom }}</a></li>
            @endforeach
        </ul>
    @endif
@endsection('content')
