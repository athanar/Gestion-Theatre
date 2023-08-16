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
		<!--
		
		<div class="form-group">
			<label>Date</label>
			<p>{{ $projet->date }}</p>
		</div>

		
		<div class="form-group">
			<label>Prix de vente</label>
			<p>{{ $projet->prix_de_vente }}</p>
		</div>

	
		<div class="form-group">
			<label>Commentaire</label>
			<p>{{ $projet->commentaire }}</p>
		</div>
		-->
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
	
		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Déplacement</b></label>
			<div class="col-sm-10" name="deplacement" id="deplacement">
				{{ $projet->deplacement}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Restauration</b></label>
			<div class="col-sm-10" name="restauration" id="restauration">
				{{ $projet->restauration}}
			</div>
		</div>

		<div class="row mb-3">
			<label class="col-sm-2 col-label-form"><b>Hébergement</b></label>
			<div class="col-sm-10" name="hebergement" id="hebergement" >
				{{ $projet->hebergement}}
			</div>
		</div>	


		<p>Total des frais du projet: <span name="total_frais_visuel" id="total_frais_visuel">0</span></p>
		<p>Coût global du projet: <span name="cout_global_visuel" id="cout_global_visuel">0</span></p>
		<input type="hidden" id="total_frais" name="total_frais" value="0">
		<input type="hidden" id="cout_global" name="cout_global" value="0">
	   

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
<script>
// Met à jour le coût total et le coût salarial du projet
function updateTotalCost() {
	const totalSalaireEl = document.getElementById('salaire_total');
	let totalCost = 0;
	let totalSalaire = 0;

	// Parcourez chaque intervenant sélectionné
	document.querySelectorAll('#selected_intervenants div').forEach(intervenantEl => {
		const contactId = intervenantEl.getAttribute('data-id');
		const totalCostEl = document.querySelector(`.total_cost_${contactId}`);
		const remuneration = parseFloat(intervenantEl.querySelector('input[type="number"]').value) || 0;
		const typeRemunerationElement = intervenantEl.querySelector('input[type="radio"]:checked');
		let typeRemuneration;
		let costForThisContact = 0;

		if (typeRemunerationElement) {
			typeRemuneration = typeRemunerationElement.value;
		} 

		totalSalaire += remuneration;

		if (typeRemuneration === 'cachet') {
			costForThisContact = remuneration * 1.56;
			totalCost += costForThisContact;
		} else if (typeRemuneration === 'facture') {
			costForThisContact = remuneration;
			totalCost += costForThisContact;
		}
		totalCostEl.textContent = costForThisContact.toFixed(2);
	});

	// Mis à jour l'affichage du coût total et du coût salarial
	const totalCostGlobalEl = document.getElementById('total_cost');
	totalCostGlobalEl.textContent = totalCost.toFixed(2);
	totalSalaireEl.textContent = totalSalaire.toFixed(2);

	const deplacement = parseFloat(document.getElementById('deplacement').value) || 0;
	const restauration = parseFloat(document.getElementById('restauration').value) || 0;
	const hebergement = parseFloat(document.getElementById('hebergement').value) || 0;
	const totalFrais = deplacement + restauration + hebergement;

	document.getElementById('total_frais_visuel').textContent = totalFrais.toFixed(2);
	document.getElementById('cout_global_visuel').textContent = (totalFrais + totalCost).toFixed(2);
	document.getElementById('total_frais') = totalFrais.toFixed(2);
	document.getElementById('cout_global') = (totalFrais + totalCost).toFixed(2);
}

document.addEventListener("DOMContentLoaded", function() {
    updateTotalCost();
});

</script>	
@endsection('content')
