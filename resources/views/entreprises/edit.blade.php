@extends('master')

@section('content')
<div class="card">
	<div class="card-header">Modifier l'entreprise {{ $entreprise->raison_sociale }}</div>
	<div class="card-body">
		<form action="{{ route('entreprises.update', $entreprise->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Raison Sociale</label>
                <input type="text" name="raison_sociale" class="form-control" value="{{ $entreprise->raison_sociale }}">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control" value="{{ $entreprise->adresse }}">
            </div>
            <div class="form-group">
                <label for="ville">Téléphone</label>
                <input type="text" name="telephone" class="form-control" value="{{ $entreprise->telephone }}">
            </div>
            <div class="form-group">
                <label for="groupe">Groupe</label>
                <input type="text" name="groupe" class="form-control" value="{{ $entreprise->groupe }}">
            </div>
            <div class="form-group">
                <label for="secteur_activite">Secteur d'activité</label>
                <input type="text" name="secteur_activite" class="form-control" value="{{ $entreprise->secteur_activite }}">
            </div>
            <div class="text-center">
				<!--input type="hidden" name="hidden_id" value="{{ $entreprise->id }}" /-->
				<input type="submit" class="btn btn-primary" value="Valider les modifications" />
			</div>	
        </form>      
	</div>
</div>

@endsection('content')