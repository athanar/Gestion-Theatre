@extends('master')

@section('content')
<div class="card">
    <!-- Heading -->
    <div class="card-header">Modifier l'entreprise {{ $entreprise->raison_sociale }}</div>

    <!-- Form Body -->
    <div class="card-body">
        <form action="{{ route('entreprises.update', $entreprise->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Raison Sociale -->
            <div class="form-group">
                <label for="nom">Raison Sociale</label>
                <input type="text" name="raison_sociale" class="form-control @error('raison_sociale') is-invalid @enderror" value="{{ old('raison_sociale', $entreprise->raison_sociale) }}">
                @error('raison_sociale')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Adresse -->
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse', $entreprise->adresse) }}">
                @error('adresse')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Téléphone -->
            <div class="form-group">
                <label for="ville">Téléphone</label>
                <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone', $entreprise->telephone) }}">
                @error('telephone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Groupe -->
            <div class="form-group">
                <label for="groupe">Groupe</label>
                <input type="text" name="groupe" class="form-control @error('groupe') is-invalid @enderror" value="{{ old('groupe', $entreprise->groupe) }}">
                @error('groupe')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Secteur d'activité -->
            <div class="form-group">
                <label for="secteur_activite">Secteur d'activité</label>
                <input type="text" name="secteur_activite" class="form-control @error('secteur_activite') is-invalid @enderror" value="{{ old('secteur_activite', $entreprise->secteur_activite) }}">
                @error('secteur_activite')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Valider les modifications" />
            </div>
        </form>      
    </div>
</div>
@endsection('content')
