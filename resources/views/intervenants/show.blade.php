@extends('master')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Détail de l'intervenant</b> {{ $intervenant->nom }} {{ $intervenant->prenom }}</div>
			<div class="col col-md-6">
				<a href="{{ route('intervenants.index') }}" class="btn btn-primary btn-sm float-end">Voir Tout</a>
			</div>
		</div>
	</div>

	<div class="card-body">

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Adresse</b></label>
			<div class="col-sm-10">
				{{ $intervenant->adresse}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Date de naissance</b></label>
			<div class="col-sm-10">
				{{ $intervenant->date_naissance}}
			</div>
		</div>
       
        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Télephone</b></label>
			<div class="col-sm-10">
				{{ $intervenant->telephone}}
			</div>
		</div>

        <div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Email</b></label>
			<div class="col-sm-10">
				{{ $intervenant->email}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Numéro Sécu</b></label>
			<div class="col-sm-10">
				{{ $intervenant->num_secu}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Numéro Congé Spectacle</b></label>
			<div class="col-sm-10">
				{{ $intervenant->num_conges_spectacles}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Statut</b></label>
			<div class="col-sm-10">
				{{ $intervenant->statut}} - {{ $intervenant->statut_choix}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Langues parlées</b></label>
			<div class="col-sm-10">
				{{ $intervenant->langues}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Commentaires</b></label>
			<div class="col-sm-10">
				{{ $intervenant->commentaires}}
			</div>
		</div>
		
		

		
		
    </div>
</div>
@endsection('content')
