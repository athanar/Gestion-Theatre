@extends('master')

@section('content')

@if($errors->any())

<div class="alert alert-danger">
	<ul>
	@foreach($errors->all() as $error)

		<li>{{ $error }}</li>

	@endforeach
	</ul>
</div>
@endif

<div class="card">
	<div class="card-header">Ajout de projet</div>
	<div class="card-body">
        <form method="POST" action="{{ route('projets.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nom_du_projet">Nom</label>
                <input type="text" name="nom_du_projet" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="nature">Nature</label>
                <select name="nature">
                    <option value="formation">Formation</option>
                    <option value="communications">Communication</option>
                    <option value="team building">Team building</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nature">Thème</label>
                <input type="text" name="theme" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="nature">Date</label>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
                <input type="date" class="col-sm-4 form-control" id="date_projet" value="" name="date_projet" required>    
            </div>
            <div class="form-group">
                <label for="nature">Lieu</label>
                <input type="text" name="lieu" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <select name="statut">
                    <option value="Validé">Validé</option>
                    <option value="en cours">En cours</option>
                    <option value="perdu">Perdu</option>
                </select>
            </div>

            <!-- Champ prix de vente -->
            <div class="form-group">
                <label for="prix_de_vente">Prix de vente</label>
                <input type="number" step="0.01" class="form-control" id="prix_de_vente" name="prix_de_vente" value="">
            </div>

            <!-- Champ commentaire -->
            <div class="form-group">
                <label for="commentaire">Commentaire</label>
                <textarea class="form-control" id="commentaire" name="commentaire">{{ old('commentaire') }}</textarea>
            </div>

            <div class="form-group">
                <label for="nature">Coût Total</label>
                <input type="text" name="prix_projet" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="nature">URL Gestion Administrative</label>
                <input type="text" name="url_gestion_administrative" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="nature">Description</label>
                <input type="text" name="description" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="secteur_activite">Liste des intervenants</label>
                <div class="col-sm-10">
                    <input type="text" id="search-input-intervenants" placeholder="Recherche...">

                    <div id="results_intervenants">
                    <!-- Les résultats de la recherche seront affichés ici -->
                    </div>

                    <script>

                    document.getElementById('search-input-intervenants').addEventListener('keyup', function() {
                        fetch('/search_intervenants?query=' + this.value)
                        .then(response => response.json())
                        .then(intervenants => {
                            let html = '';
                            intervenants.forEach(intervenant => {
                                html += `<p data-id="${intervenant.id}">${intervenant.nom} ${intervenant.prenom}</p>`;
                             });
                            const resultsDiv = document.getElementById('results_intervenants');
                            resultsDiv.innerHTML = html;

                            // Ajoutez un gestionnaire d'événements click à chaque élément de contact
                            resultsDiv.querySelectorAll('p').forEach(contactEl => {
                                contactEl.addEventListener('click', function() {
                                    const contactId = this.dataset.id;
                                    const contactNom = this.textContent;
                                    const selectedDiv = document.getElementById('selected_intervenants');

                                    // Crée une nouvelle ligne avec les informations de l'intervenant
                                    const newLine = document.createElement('div');
                                    newLine.setAttribute('data-id', contactId);
                                    newLine.innerHTML = `
                                        <span>${contactNom}</span>
                                        <input type="number" name="remuneration[${contactId}]" placeholder="Rémunération">
                                        <label><input type="radio" name="type_remuneration[${contactId}]" value="facture"> Facture</label>
                                        <label><input type="radio" name="type_remuneration[${contactId}]" value="cachet"> Cachet</label>
                                        / Coût global: <span class="total_cost_${contactId}">0</span>
                                        <button class="delete-button">Supprimer</button>
                                    `;


                                    // Ajoute la nouvelle ligne à la div
                                    selectedDiv.appendChild(newLine);

                                     // Ajoute un écouteur d'événements pour supprimer la ligne
                                    newLine.querySelector('.delete-button').addEventListener('click', function() {
                                        selectedDiv.removeChild(newLine);
                                    });
                                    // Obtenir les inputs pour la rémunération et le type de rémunération
                                    const remunerationInput = newLine.querySelector(`input[name="remuneration[${contactId}]"]`);
                                    const typeRemunerationInput = newLine.querySelectorAll(`input[name="type_remuneration[${contactId}]"]`);

                                    // Ajoutez des écouteurs d'événements pour mettre à jour le coût total lorsque ces valeurs changent
                                    remunerationInput.addEventListener('change', updateTotalCost);
                                    typeRemunerationInput.forEach(radio => radio.addEventListener('change', updateTotalCost));

                                    updateTotalCost();  // Mettre à jour le coût après l'ajout d'un nouvel intervenant

                                });
                            });
                        });
                    });

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
                    
                    </script>			

                    <!-- search_results.blade.php -->
                    <div id="selected_intervenants"></div>

                    <p>Coût salarial du projet: <span id="salaire_total">0</span></p>
                    <p>Coût global salarial du projet: <span id="total_cost">0</span></p>

                    Déplacement : <input type="number" name="deplacement" id="deplacement" placeholder="Déplacement" value="0">
                    Restauration  : <input type="number" name="restauration" id="restauration" placeholder="Restauration" value="0">
                    Hébergement : <input type="number" name="hebergement" id="hebergement" placeholder="Hébergement" value="0">
                    <p>Total des frais du projet: <span name="total_frais_visuel" id="total_frais_visuel">0</span></p>
                    <p>Coût global du projet: <span name="cout_global_visuel" id="cout_global_visuel">0</span></p>
                    <input type="hidden" id="total_frais" name="total_frais" value="0">
                    <input type="hidden" id="cout_global" name="cout_global" value="0">
                   
                    <script>
                        document.getElementById('deplacement').addEventListener('change', updateTotalCost);
                        document.getElementById('restauration').addEventListener('change', updateTotalCost);
                        document.getElementById('hebergement').addEventListener('change', updateTotalCost);
                    </script>

                </div>
            </div>
            <div class="form-group">
                <label for="secteur_activite">Contact</label>
                <div class="col-sm-10">
                    <input type="text" id="search-input" placeholder="Recherche...">

                    <div id="results">
                    <!-- Les résultats de la recherche seront affichés ici -->
                    </div>

                    <script>
                    document.getElementById('search-input').addEventListener('keyup', function() {
                        fetch('/search_contacts?query=' + this.value)
                        .then(response => response.json())
                        .then(contacts => {
                            let html = '';
                            contacts.forEach(contact => {
                                html += `<p data-id="${contact.id}">${contact.nom} ${contact.prenom}</p>`;
                             });
                            const resultsDiv = document.getElementById('results');
                            resultsDiv.innerHTML = html;

                            // Ajoutez un gestionnaire d'événements click à chaque élément de contact
                            resultsDiv.querySelectorAll('p').forEach(contactEl => {
                                contactEl.addEventListener('click', function() {
                                    const contactId = this.dataset.id;
                                    document.getElementById('contact_id').value = contactId;
                                });
                            });
                        });
                    });
                    </script>			

                    <!-- search_results.blade.php -->

                    <select class="form-control" id="contact_id" name="contact_id" required>
                        @foreach($contacts as $contact)
                            <option value="{{ $contact->id }}">{{ $contact->nom }} {{ $contact->prenoms }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="secteur_activite">Entreprise</label>
                <div class="col-sm-10">
                    <select class="form-control" id="entreprise_id" name="entreprise_id" required>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" >{{ $entreprise->raison_sociale }} </option>  
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ajouter" />
			</div>

        </form>
    </div>
</div>


@endsection('content')

