@extends('master')

@section('content')
<div class="card">
	<div class="card-header">
		<div class="row">
			<div class="col col-md-6"><b>Détail de l'intervenant</b> {{ $intervenant->nom }} {{ $intervenant->prenom }}</div>
			<div class="col col-md-6">
				<a href="{{ route('intervenants.index') }}" class="btn btn-primary btn-sm float-end">Retour à la liste</a>
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
				{{ $intervenant->statut}}
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

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Photo</b></label>
			<div class="col-sm-10">
				@if($intervenant->cv)
					<img src="{{ asset('storage/photos/' . $intervenant->photo) }}" alt="Image">
				@else
					<p>Aucune Photo disponible</p>
				@endif
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>CV</b></label>
			<div class="col-sm-10">
				@if($intervenant->cv)
					<a href="{{ asset('storage/cvs/' . $intervenant->cv) }}" target="_blank">Voir le CV</a>
				@else
					<p>Aucun CV disponible.</p>
				@endif
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>CNI</b></label>
			<div class="col-sm-10">
				@if($intervenant->cni)
					<a href="{{ asset('storage/cvs/' . $intervenant->cni) }}" target="_blank">Voir la CNI</a>
				@else
					<p>Aucune CNI disponible.</p>
				@endif
			</div>
		</div>	

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Pièce jointe</b></label>
			<div class="col-sm-10">
				@if($intervenant->cni)
					<a href="{{ asset('storage/cvs/' . $intervenant->file) }}" target="_blank">Voir la pièce jointe</a>
				@else
					<p>Aucune pièce jointe disponible.</p>
				@endif
			</div>
		</div>	
		
    </div>
</div>
@endsection('content')
