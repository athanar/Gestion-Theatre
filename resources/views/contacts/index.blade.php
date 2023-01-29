@extends('master')
 
@section('content')

<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Contacts</b></div>
			<div class="col col-md-6">
				<a href="{{ route('contacts.create') }}" class="btn btn-success btn-sm float-end">Ajouter</a>
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
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->nom }}</td>
                        <td>{{ $contact->prenom }}</td>
                        <td>{{ $contact->fonction }}</td>
                        <td>{{ $contact->telephone }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->entreprises->raison_sociale}}</td>
                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-primary btn-sm">Afficher</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form style="display: inline-block" method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
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