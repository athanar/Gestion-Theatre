@extends('master')

@section('content')
<div class="card">
	<div class="card-header">Modifier le projet <b> {{ $projet->nom_du_projet}}</b></div>
	<div class="card-body">
		<form action="{{ route('projets.update', $projet->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom_du_projet">Nom</label>
                <input type="text" name="nom_du_projet" class="form-control" value="{{ $projet->nom_du_projet }}">
            </div>
            <div class="form-group">
                <label for="nature">Nature</label>
                <input type="text" name="nature" class="form-control" value="{{ $projet->nature }}">
            </div>
            <div class="form-group">
                <label for="nature">Thème</label>
                <input type="text" name="theme" class="form-control" value="{{ $projet->theme }}">
            </div>
            <div class="form-group">
                <label for="nature">Date</label>
                <input type="text" name="date_projet" class="form-control" value="{{ $projet->date_projet }}">
            </div>
            <div class="form-group">
                <label for="nature">Lieu</label>
                <input type="text" name="lieu" class="form-control" value="{{ $projet->lieu }}">
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <select name="statut">
                    <option value="Validé">Validé</option>
                    <option value="en cours">En cours</option>
                    <option value="perdu">Perdu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nature">Coût Total</label>
                <input type="text" name="prix_projet" class="form-control" value="{{ $projet->prix_projet }}">
            </div>
            <div class="form-group">
                <label for="nature">URL Gestion Administrative</label>
                <input type="text" name="url_gestion_administrative" class="form-control" value="{{ $projet->url_gestion_administrative }}">
            </div>
            <div class="form-group">
                <label for="nature">Description</label>
                <input type="text" name="description" class="form-control" value="{{ $projet->description }}">
            </div>
            <div class="form-group">
                <label for="secteur_activite">List des intervenants (choix multiple)</label>
                <div class="col-sm-10">
                    <select class="form-control" id="Intervenant_id" name="Intervenant_id[]" multiple required>
                        @foreach($intervenants as $intervenant)
                            <option value="{{ $intervenant->id }}" @if($projet->intervenants->contains($intervenant->id)) selected='selected' @endif>{{ $intervenant->nom }} {{ $intervenant->prenom }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="secteur_activite">Contact</label>
                <div class="col-sm-10">
                    <select class="form-control" id="contact_id" name="contact_id" required>
                        @foreach($contacts as $contact)
                            <option value="{{ $contact->id }}" @if($projet->contact->id === $contact->id )) selected @endif>{{ $contact->nom }} {{ $contact->prenoms }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="secteur_activite">Entreprise</label>
                <div class="col-sm-10">
                    <select class="form-control" id="entreprise_id" name="entreprise_id" required>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" @if($projet->entreprise === $entreprise->id )) selected @endif>{{ $entreprise->raison_sociale }} </option>  
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $projet->id }}" />
				<input type="submit" class="btn btn-primary" value="Valider les modifications" />
			</div>	
            
        </form>      
	</div>
</div>

@endsection('content')