@extends('master')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Détail du contact</b></div>
			<div class="col col-md-6">
				<a href="{{ route('contacts.index') }}" class="btn btn-primary btn-sm float-end">Voir Tout</a>
			</div>
		</div>
	</div>

	<div class="card-body">
        <h1>{{ $contact->nom }} {{ $contact->prenom }} </h1>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Fonction</b></label>
			<div class="col-sm-10">
				{{ $contact->fonction}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Télephone</b></label>
			<div class="col-sm-10">
				{{ $contact->telephone}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Email</b></label>
			<div class="col-sm-10">
				{{ $contact->email}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Entreprise</b></label>
			<div class="col-sm-10">
				<a href="{{ route('entreprises.show', $contact->entreprises->id) }}" class="btn btn-primary btn-sm">{{ $contact->entreprises->raison_sociale}}</a>
			</div>
		</div>

		<h4>Commentaires</h4>

		@if ($contact->commentaires->count() > 0)
			<ul>
				@foreach ($contact->commentaires as $commentaire)
					<li>({{ $commentaire->created_at->format('d/m/Y') }}) - {{ $commentaire->commentaire }} </li>
				@endforeach
			</ul>
		@else
			<p>Aucun commentaire pour ce contact.</p>
		@endif
    </div>
</div>
@endsection('content')
