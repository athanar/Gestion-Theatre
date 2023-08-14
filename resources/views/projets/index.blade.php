@extends('master')
 
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
                    <th>Nom du projet</th>
                    <th>Nature</th>
                    <th>Thème</th>
                    <th>Date</th>
                    <th>Lieu</th>
                </tr>
                
            </thead>
            <tbody>
                @foreach($projets as $projet)
                    <tr>
                        <td>{{ $projet->nom_du_projet }}</td>
                        <td>{{ $projet->nature }}</td>
                        <td>{{ $projet->theme }}</td>
                        <td>{{ $projet->date_projet }}</td>
                        <td>{{ $projet->lieu }}</td> 
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