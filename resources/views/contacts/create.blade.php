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
	<div class="card-header">Ajout de contact</div>
	<div class="card-body">
        <form method="post" action="{{ route('contacts.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="nom">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="prenom">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prenom" name="prenom" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="fonction">Fonction</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="fonction" name="fonction" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="telephone">Téléphone</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="email">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="entreprise_id">Entreprise</label>
                <div class="col-sm-10">
                    <select class="form-control" id="entreprise_id" name="entreprise_id" required>
                        <option value="">Liste des entreprises</option>
                        @foreach($entreprises as $entreprise)
                            <option value="{{ $entreprise->id }}">{{ $entreprise->raison_sociale }}</option>
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
