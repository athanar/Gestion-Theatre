@extends('master')
 
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Projets</b></div>
			<div class="col col-md-6">
				<a href="{{ route('projets.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
			</div>
		</div>
	</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Fonction</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Entreprise</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach($projets as $projets)
                    <tr>
                        <td>{{ $projet->nom }}</td>
                        <td>{{ $projet->prenom }}</td>
                        <td>{{ $projet->fonction }}</td>
                        <td>{{ $projet->telephone }}</td>
                        <td>{{ $projet->email }}</td>
                        <td>{{ $projet->entreprises->raison_sociale}}</td>
                        
                        <td>
                            <a href="{{ route('projets.show', $projet->id) }}" class="btn btn-primary btn-sm">Afficher</a>
                            <a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form style="display: inline-block" method="POST" action="{{ route('projets.destroy', $projet->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection('content')