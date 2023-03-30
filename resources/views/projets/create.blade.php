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
        <form method="post" action="{{ route('projets.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="nature">Nature</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="nature" name="nature" required>    
                            <option value="formation">Formation</option>
                            <option value="communication">Communication</option>
                            <option value="team_building">Team Building</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="theme">Thème</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>
                </div>                 
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-4 col-label-form" for="prix_par_intervenants">Coût par intervenant</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="prix_par_intervenants" name="prix_par_intervenants" required>
                    </div>
                </div>
                <div class="col">
                    <div class="col input-group date" id='datetimepicker'>
                        <label class="col-sm-2 col-label-form" for="date_projet">Date du projet</label>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        <input type="date" class="col-sm-4 form-control" id="date_projet" name="date_projet" required>
                    </div>
                </div>
            </div>
            
            
            <div>
                <label class="col-sm-1 col-label-form" for="lieu">Lieu</label>
                <div class="col-sm-11">
                    <input type="text" class="form-control" id="lieu" name="lieu" required>
                </div>
            </div>
            <div>
                <label class="col-sm-2 col-label-form" for="prix_projet">Prix de vente</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="prix_projet" name="prix_projet" required>
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form" for="contact_id">Contact</label>
                <div class="col-sm-10">
                    <select class="form-control" id="contact_id" name="contact_id" required>
                        <option value="">Liste des contacts</option>
                        @foreach($contacts as $contact)
                            <option value="{{ $contact->id }}">{{ $contact->nom }} {{ $contact->prenom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div>
                <label class="col-sm-2 col-label-form" for="description">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                </div>  
            </div>

            <div>
                <label class="col-sm-4 col-label-form" for="url_gestion_administrative">URL gestion administrative</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="url_gestion_administrative" name="url_gestion_administrative" required>
                </div>
            </div>


            <!-- Blade view code -->
            <div>
                <label for="intervenants">Choisissez vos intervenants :</label>
                <div class="col-sm-10">
                    
                    <select class="form-control select2" id="intervenants" name="intervenants" multiple="multiple">
                        @foreach ($intervenants as $intervenant)
                        <option value="{{ $intervenant->id }}">{{ $intervenant->nom }} {{ $intervenant->prenom }}</option>
                        @endforeach
                    </select>
                    
                    <script>
                        $(document).ready(function() {
                        $('.select2').select2({
                            placeholder: "Rechercher un intervenant",
                            allowClear: true,
                            minimumInputLength: 1,
                            ajax: {
                            url: "{{ route('intervenants.search') }}",s
                            dataType: 'json',
                            delay: 250,
                            processResults: function(data) {
                                return {
                                results: $.map(data, function(intervenant) {
                                    return { id: intervenant.id, text: intervenant.nom + ' ' + intervenant.prenom };
                                })
                                };
                            },
                            cache: true
                            }
                        });
                        });
                    </script>
                </div>
            </div>
              

            
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ajouter" />
			</div>
        </form>
    </div>
</div>
@endsection('content')

