<!DOCTYPE html>
<html>
<head>
    <title>Sélectionner des projets pour {{ $entreprise->nom }}</title>
</head>
<body>
    <h1>Sélectionner des projets pour {{ $entreprise->nom }}</h1>

    <form action="{{ route('entreprise.associateProjets', $entreprise->id) }}" method="post">
        @csrf

        <ul>
        @foreach($projets as $projet)
            <li>
                <input type="checkbox" name="projets[]" id="projet-{{ $projet->id }}" value="{{ $projet->id }}">
                <label for="projet-{{ $projet->id }}">{{ $projet->nom_du_projet }}</label>
            </li>
        @endforeach
        </ul>

        <button type="submit">Associer les projets sélectionnés</button>
    </form>
</body>
</html>
