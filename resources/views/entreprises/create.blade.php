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
	<div class="card-header">Ajout d'entreprise</div>
	<div class="card-body">
        <form method="post" action="{{ route('entreprises.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="raison_sociale">Raison sociale</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="raison_sociale" name="raison_sociale" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="adresse">Adresse</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="adresse" name="adresse" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="telephone">Téléphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="groupe">Groupe</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="groupe" name="groupe" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="secteur_activite">Secteur d'activité</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="secteur_activite" name="secteur_activite" required>
                </div>
            </div>

            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ajouter" />
			</div>
        </form>
    </div>
</div>
@endsection('content')

