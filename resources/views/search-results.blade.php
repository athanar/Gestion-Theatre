<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Résultat de recherche</h1>
    
    <h2>Projets</h2>
    @if ($projets->isEmpty())
        <p>Pas de projets trouvés</p>
    @else
        <ul>
            @foreach ($projets as $projet)
                <li>{{ $projet->nom_du_projet }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Intervenants</h2>
    @if ($intervenants->isEmpty())
        <p>Pas d'intervenants.</p>
    @else
        <ul>
            @foreach ($intervenants as $intervenant)
                <li>{{ $intervenant->nom }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Entreprise</h2>
    @if ($entreprise->isEmpty())
        <p>Pas d'entreprise.</p>
    @else
        <ul>
            @foreach ($entreprises as $entreprise)
                <li>{{ $entreprise->raison_sociale }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Contacts</h2>
    @if ($contacts->isEmpty())
        <p>Pas de contacts</p>
    @else
        <ul>
            @foreach ($contacts as $contact)
                <li>{{ $contact->nom }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
