@extends('master')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Détail du projet {{ $projet->nom_du_projet}} </b></div>
			<div class="col col-md-6">
				<a href="{{ route('projets.index') }}" class="btn btn-primary btn-sm float-end">Revenir à la liste</a>
				<a href="{{ route('projets.edit', $projet->id) }}" class="btn btn-warning btn-sm">Modifier</a>
				<form style="display: inline-block" method="POST" action="{{ route('projets.destroy', $projet->id) }}">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-danger">Supprimer</button>
				</form>
			</div>
		</div>
	</div>

	<div class="card-body">
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Nature</b></label>
			<div class="col-sm-10">
				{{ $projet->nature}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Thème</b></label>
			<div class="col-sm-10">
				{{ $projet->theme}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Date</b></label>
			<div class="col-sm-10">
				{{ $projet->date_projet}}
			</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Statut</b></label>
			<div class="col-sm-10">
                {{ $projet->statut}}
			</div>
		</div>
		<!-- Champ de date -->
		<div class="form-group">
			<label>Date</label>
			<p>{{ $projet->date }}</p>
		</div>

		<!-- Champ de prix de vente -->
		<div class="form-group">
			<label>Prix de vente</label>
			<p>{{ $projet->prix_de_vente }}</p>
		</div>

		<!-- Champ de commentaire -->
		<div class="form-group">
			<label>Commentaire</label>
			<p>{{ $projet->commentaire }}</p>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Lieu</b></label>
			<div class="col-sm-10">
                {{ $projet->lieu}}
			</div>
		</div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Prix de vente</b></label>
			<div class="col-sm-10">
                {{ $projet->prix_projet}}
			</div>
		</div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>URL Gestion Administrative</b></label>
            <div class="col-sm-10">
                {{ $projet->url_gestion_administrative}}
            </div>
        </div>
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Description</b></label>
			<div class="col-sm-10">
                {{ $projet->description}}
			</div>
		</div>

		<h4>Intervenants</h4>
	
		@if ($projet->intervenants != null && $projet->intervenants->count() > 0)
		
			<ul>
				@foreach ($projet->remunerations as $remuneration)
					<div>
						<a href="{{ route('intervenants.show', ['intervenant' => $remuneration->intervenant->id]) }}">
							<span>{{ $remuneration->intervenant->nom }} {{ $remuneration->intervenant->prenom }}</span>
						</a>
						<span>{{ $remuneration->montant }}</span>
						<span>{{ $remuneration->type }}</span>
					</div>
				@endforeach
			</ul>
		@else
			<p>Aucun intervenant pour ce projet.</p>
		@endif

		<p>Nom du contact : 
			@if($projet->contact)
				<a href="{{ route('contacts.show', ['contact' => $projet->contact->id]) }}">
					{{ $projet->contact->nom }} {{ $projet->contact->prenom }}
				</a>
			@else
				Non défini
			@endif
		</p>
		<p>Coordonnées de l'entreprise : 
			@if($projet->contact && $projet->contact->entreprise_id)
			<a href="{{ route('entreprises.show', ['entreprise' => $projet->contact->entreprise_id]) }}">
				{{$projet->entreprise->raison_sociale}} {{ $projet->contact->entreprise_id }} 
			</a>
@else
    Non défini
@endif

		</p>		
		
		
    </div>
</div>
@endsection('content')
