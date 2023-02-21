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
	<div class="card-header text-center">Ajout d'intervenant</div>
    <div class="card-body">
        <form method="post" action="{{ route('intervenants.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-header text-center">Coordonnées</div>
<br/>
            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required>
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="prenom">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse"  placeholder="Adresse" required>
                </div>
                <div class="col input-group date" id='datetimepicker'>
                    <label class="col-sm-4 col-label-form" for="date_naissance">Date de naissance</label>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input type="date" class="col-sm-4 form-control" id="date_naissance" name="date_naissance" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="telephone">Téléphone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone" required>
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-4 col-label-form" for="num_secu">Numéro Sécu</label>
                    <input type="number" class="form-control" id="num_secu" name="num_secu" placeholder="Num. Sécu" required>
                </div>
                <div class="col">
                    <label class="col-sm-6 col-label-form" for="num_conges_spectacles">Numéro Congés Spectacle</label>
                    <input type="number" class="form-control" id="num_conges_spectacles" name="num_conges_spectacles" placeholder="num_conges_spectacles" required>
                </div>
            </div>
<br/>
            <div class="card-header text-center">Spécificité</div>
<br/>
            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="statut">Statut</label>
                    <select name="statut" id="statut"  class="form-control">
                        <option value="comédien" name="statut[]" name="">Comédien</option>
                        <option value="intermittent" name="statut[]">Intermittent</option>
                        <option value="auto-entrepreneur" name="statut[]">Auto-entrepreneur</option>
                    </select>
                </div>

                 <div class="col">
                    <input type="checkbox" name="statut_choix[]" value="scenariste"> Scénariste <br/>
                    <input type="checkbox" name="statut_choix[]" value="comedien"> Comédien <br/>
                    <input type="checkbox" name="statut_choix[]" value="formateur"> Formateur <br/>
                    <input type="checkbox" name="statut_choix[]" value="impro"> Impro <br/>
                    <input type="checkbox" name="statut_choix[]" value="chanteur"> Chanteur <br/>
                    <input type="checkbox" name="statut_choix[]" value="realisateur"> Réalisateur <br/>
                    <input type="checkbox" name="statut_choix[]" value="monteur"> Monteur <br/>
                    <input type="checkbox" name="statut_choix[]" value="photographe"> Photographe <br/>
                    <input type="checkbox" name="statut_choix[]" value="musique"> Musique <br/>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="langues[]">Langues parlées</label>
                    <input type="checkbox" name="langues[]" value="francais"> Français</option>
                    <input type="checkbox" name="langues[]" value="anglais"> Anglais</option>
                    <input type="checkbox" name="langues[]" value="italien"> Italien</option>
                    <input type="checkbox" name="langues[]" value="allemand"> Allemand</option>
                    <input type="checkbox" name="langues[]" value="espagnol"> Espagnol</option>
                    </div>
            </div>
           
            <div class="row">
                <label for="comment">Commentaire</label>
                <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="photo">Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" placeholder="Photo">
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="cv">CV</label>
                    <input type="file" class="form-control" name="cv" id="cv" placeholder="CV">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="cni">CNI</label>
                    <input type="file" class="form-control" name="cni" id="cni" placeholder="Photo">
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="file">Pièce jointe</label>
                    <input type="file" class="form-control" name="file" id="file" placeholder="file">
                </div>
            </div>

            <div class="row">
                <label class="custom-file-label" for="chooseFile">Projets</label>
            </div>
            
            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Ajouter" />
			</div>
        </form>
    </div>
</div>
@endsection('content')

