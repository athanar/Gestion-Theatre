@extends('master')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Détail de l'entreprise</b></div>
			<div class="col col-md-6">
				<a href="{{ route('entreprises.index') }}" class="btn btn-primary btn-sm float-end">Voir Tout</a>
			</div>
		</div>
	</div>
	<div class="card-body">
        <h1>{{ $entreprise->raison_sociale }}</h1>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Adresse</b></label>
			<div class="col-sm-10">
				{{ $entreprise->adresse}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Télephone</b></label>
			<div class="col-sm-10">
				{{ $entreprise->telephone}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Groupe</b></label>
			<div class="col-sm-10">
				{{ $entreprise->groupe}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Secteur d'activité</b></label>
			<div class="col-sm-10">
				{{ $entreprise->secteur_activite}}
			</div>
		</div>

        <h2>Contacts</h2>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Fonction</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                    </tr>
                    
                </thead>
                <tbody>
                    @foreach($entreprise->contacts as $contact)
                        <tr>
                            <td>{{ $contact->nom }}</td>
                            <td>{{ $contact->prenom }}</td>
                            <td>{{ $contact->fonction }}</td>
                            <td>{{ $contact->telephone }}</td>
                            <td>{{ $contact->email }}</td>

                            <td>
                                <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info">Afficher</a>
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning">Modifier</a>
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
</div>
@endsection('content')
