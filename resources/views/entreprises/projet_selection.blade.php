<!DOCTYPE html>
<html>
<head>
    <title>Sélectionner des projets pour {{ $entreprise->nom }}</title>
</head>
<body>
    <h1>Sélectionner des projets pour {{ $entreprise->nom }}</h1>

    <form action="{{ route('entreprise.associateProjets', $entreprise->id) }}" method="post">
        @csrf
        <ul class="list-group">
            @foreach($projets as $projet)
                <li class="list-group-item">
                    <input type="checkbox" name="projets[]" value="{{ $projet->id }}">
                    {{ $projet->nom_du_projet }}
                </li>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-primary mt-2">Associer les projets sélectionnés</button>
    </form>
    
</body>
</html>
