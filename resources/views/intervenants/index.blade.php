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
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Action</th>
                    
                </tr>
                
            </thead>
            <tbody>
                @foreach($intervenants as $intervenant)
                    <tr>
                        <td>{{ $intervenant->nom }}</td>
                        <td>{{ $intervenant->prenom }}</td>
                        <td>{{ $intervenant->statut }}</td>
                        <td>{{ $intervenant->telephone }}</td>
                        <td>{{ $intervenant->email }}</td>
                        
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