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
                            <option value="{{ $intervenant->id }}" @if($projet->intervenant_id=== $intervenant->id) selected='selected' @endif>{{ $intervenant->nom }} {{ $intervenant->prenom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="comment">Commentaire</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>
            <div class="text-center">
				<input type="hidden" name="hidden_id" value="{{ $projet->id }}" />
				<input type="submit" class="btn btn-primary" value="Valider les modifications" />
			</div>	
        </form>      
	</div>
</div>

@endsection('content')