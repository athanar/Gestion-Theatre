@extends('master')

@section('content')
<div class="card">
	<div class="card-header">Modifier le contact {{ $contact->nom }} {{ $contact->prenom }}</div>
	<div class="card-body">
		<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $contact->nom }}">
            </div>
            <div class="form-group">
                <label for="adresse">Prénom</label>
                <input type="text" name="prenom" class="form-control" value="{{ $contact->prenom }}">
            </div>
            <div class="form-group">
                <label for="ville">Fonction</label>
                <input type="text" name="fonction" class="form-control" value="{{ $contact->fonction }}">
            </div>
            <div class="form-group">
                <label for="ville">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $contact->telephone }}">
            </div>
            <div class="form-group">
                <label for="groupe">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $contact->email }}">
            </div>
            <div class="form-group">
                <label for="secteur_activite">Entreprise</label>
                <div class="col-sm-10">
                    <select class="form-control" id="entreprise_id" name="entreprise_id" required>
                        <option value="">Liste des entreprises</option>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}" @if($contact->entreprise_id=== $entreprise->id) selected='selected' @endif>{{ $entreprise->raison_sociale }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="text-center">
				<!--input type="hidden" name="hidden_id" value="{{ $contact->id }}" /-->
				<input type="submit" class="btn btn-primary" value="Valider les modifications" />
			</div>	
        </form>      
	</div>
</div>

@endsection('content')