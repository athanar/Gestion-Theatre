@extends('master')
 
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Entreprises</b></div>
			<div class="col col-md-6">
				<a href="{{ route('entreprises.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
			</div>
		</div>
	</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Raison Sociale</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th>Groupe</th>
                    <th>Secteur d'activité</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach($entreprises as $entreprise)
                    <tr>
                        <td>{{ $entreprise->raison_sociale }}</td>
                        <td>{{ $entreprise->adresse }}</td>
                        <td>{{ $entreprise->telephone }}</td>
                        <td>{{ $entreprise->groupe }}</td>
                        <td>{{ $entreprise->secteur_activite }}</td>
                        <td>
                            <a href="{{ route('entreprises.show', $entreprise->id) }}" class="btn btn-primary btn-sm">Afficher</a>
                            <a href="{{ route('entreprises.edit', $entreprise->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form style="display: inline-block" method="POST" action="{{ route('entreprises.destroy', $entreprise->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
