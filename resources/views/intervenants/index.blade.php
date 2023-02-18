@extends('master')
 
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Intervenants</b></div>
			<div class="col col-md-6">
				<a href="{{ route('intervenants.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
			</div>
		</div>
	</div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    
                </tr>
                
            </thead>
            <tbody>
                @foreach($intervenants as $intervenant)
                    <tr>
                        <td>{{ $intervenant->nom }}</td>
                        <td>{{ $intervenant->prenom }}</td>
                        <td>{{ $intervenant->fonction }}</td>
                        <td>{{ $intervenant->telephone }}</td>
                        <td>{{ $intervenant->email }}</td>
                        <td>{{ $intervenant->entreprises->raison_sociale}}</td>
                        
                        <td>
                            <a href="{{ route('intervenants.show', $intervenant->id) }}" class="btn btn-primary btn-sm">Afficher</a>
                            <a href="{{ route('intervenants.edit', $intervenant->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form style="display: inline-block" method="POST" action="{{ route('intervenants.destroy', $intervenant->id) }}">
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