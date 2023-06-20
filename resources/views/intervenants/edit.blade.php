@extends('master')

@section('content')
<div class="card">
	<div class="card-header">Modifier l'intervenant {{ $intervenant->nom }} {{ $intervenant->prenom }}</div>
	<div class="card-body">
		<form action="{{ route('intervenants.update', $intervenant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3 class="mb-4">Informations de base</h3>
            <div class="form-group row">
                <div class="col-md-6">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" class="form-control" value="{{ $intervenant->nom }}" required>
                </div>
                <div class="col-md-6">
                    <label for="adresse">Prénom</label>
                    <input type="text" name="prenom" class="form-control" value="{{ $intervenant->prenom }}" required>    
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="ville">Adresse</label>
                    <input type="text" name="adresse" class="form-control" value="{{ $intervenant->adresse }}" required>    
                </div>
                <div class="col-md-6">
                    <label for="ville">Date de naissance</label>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input type="date" class="col-sm-4 form-control" id="date_naissance" value="{{ $intervenant->date_naissance }}" name="date_naissance" required>    
                </div>
            </div>   

            <div class="form-group row">
                <div class="col-md-6">
                    <label for="groupe">Téléphone</label>
                    <input type="text" name="telephone" class="form-control" value="{{ $intervenant->telephone }}" required>    
                </div>
                <div class="col-md-6">
                    <label for="groupe">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $intervenant->email }}" required>    
                </div>
            </div>
           
            <h3 class="mb-4 mt-4">Spécificité</h3>
            <div class="form-group row">
                <div class="col-md-6">
                    <label class="col-sm-4 col-label-form" for="num_secu">Numéro Sécu</label>
                    <input type="number" class="form-control" id="num_secu" name="num_secu" value="{{ $intervenant->num_secu }}" placeholder="Num. Sécu" required>
                </div>
                <div class="col-md-6">
                    <label class="col-sm-6 col-label-form" for="num_conges_spectacles">Numéro Congés Spectacle</label>
                    <input type="number" class="form-control" id="num_conges_spectacles" name="num_conges_spectacles" value="{{ $intervenant->num_conges_spectacles }}" placeholder="num_conges_spectacles" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6">
                    <label class="col-sm-4 col-label-form" for="statut">Statut</label>
                    <select name="statut" id="statut"  class="form-control">
                        <option value="comédien" name="statut[]" {{ $intervenant->statut == 'comédien' ? 'selected' : '' }} name="">Comédien</option>
                        <option value="intermittent" name="statut[]" {{ $intervenant->statut == 'intermittent' ? 'selected' : '' }} >Intermittent</option>
                        <option value="auto-entrepreneur" name="statut[]" {{ $intervenant->statut == 'auto-entrepreneur' ? 'selected' : '' }} >Auto-entrepreneur</option>
                    </select>    
                </div>


                @foreach($roles as $role)
                <div class="form-group">
                    <label for="montant_{{ $role }}">Montant pour le rôle {{ $role }}</label>
                    <input type="text" id="montant_{{ $role }}" name="montants[{{ $role }}]" class="form-control" value="{{ $intervenant->remunerations->where('role', $role)->first()->montant ?? '' }}">
                </div>

                <div class="form-group">
                    <label>Type de rémunération pour le rôle {{ $role }}</label><br>
                
                    <input type="radio" id="type_remuneration_cachet_{{ $role }}" name="types_remuneration[{{ $role }}]" value="cachet" @if (($intervenant->remunerations->where('role', $role)->first()->type_remuneration ?? '') == 'cachet') checked @endif>
                    <label for="type_remuneration_cachet_{{ $role }}">Cachet</label><br>
                
                    <input type="radio" id="type_remuneration_facture_{{ $role }}" name="types_remuneration[{{ $role }}]" value="facture" @if (($intervenant->remunerations->where('role', $role)->first()->type_remuneration ?? '') == 'facture') checked @endif>
                    <label for="type_remuneration_facture_{{ $role }}">Facture</label>
                </div>
                @endforeach
                

                <div class="col-md-6">
                    <label class="col-sm-4 col-label-form" for="langues[]">Profession</label>
                    <select name="statut_choix[]" id="statut_choix"  class="form-control" multiple>
                        <option value="scenariste"  {{ in_array('scenariste', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Scénariste</option>
                        <option value="comedien"  {{ in_array('comedien', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Comédien</option>
                        <option value="formateur"  {{ in_array('formateur', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Formateur</option>
                        <option value="impro"  {{ in_array('impro', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Impro</option>
                        <option value="chanteur"  {{ in_array('chanteur', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Chanteur</option>
                        <option value="realisateur"  {{ in_array('realisateur', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Réalisateur</option>
                        <option value="monteur"  {{ in_array('monteur', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Monteur</option>
                        <option value="photographe"  {{ in_array('photographe', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Photographe</option>
                        <option value="musique"  {{ in_array('musique', explode(',', $intervenant->statut_choix)) ? 'selected' : '' }}> Musique</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="langues[]">Langues parlées</label>
                    <select name="langues[]" id="langues"  class="form-control" multiple>
                        <option value="francais"  {{ in_array('français', explode(',', $intervenant->langues)) ? 'selected' : '' }}> Français</option>
                        <option value="anglais"   {{ in_array('anglais', explode(',', $intervenant->langues)) ? 'selected' : '' }}> Anglais</option>
                        <option value="italien"   {{ in_array('italien', explode(',', $intervenant->langues)) ? 'selected' : '' }}> Italien</option>
                        <option value="allemand"  {{ in_array('allemand', explode(',', $intervenant->langues)) ? 'selected' : '' }}> Allemand</option>
                        <option value="espagnol"  {{ in_array('espagnol', explode(',', $intervenant->langues)) ? 'selected' : '' }}> Espagnol</option>
                    </select>
                </div>
            </div>
           
            <h3 class="mb-4 mt-4">Commentaire</h3>
            <div class="form-group row">
                <label for="comment">Commentaire</label>
                <textarea class="form-control" id="commentaire" name="commentaire" id="commentaire" rows="3">{{ $intervenant->commentaire}}</textarea>
            </div>

            <h3 class="mb-4 mt-4">Documents</h3>
            <div class="form-group row">>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="photo">Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" placeholder="Photo">
                    @if($intervenant->photo)
                        <p>Photo actuelle: {{ $intervenant->photo }}</p>
                    @endif
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="cv">CV</label>
                    <input type="file" class="form-control" name="cv" id="cv" placeholder="CV">
                    @if($intervenant->cv)
                        <p>CV actuel: {{ $intervenant->cv }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group row">>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="cni">CNI</label>
                    <input type="file" class="form-control" name="cni" id="cni" placeholder="Photo">
                    @if($intervenant->cn)
                        <p>CNI actuel: {{ $intervenant->cni }}</p>
                    @endif
                </div>
                <div class="col">
                    <label class="col-sm-2 col-label-form" for="file">Pièce jointe</label>
                    <input type="file" class="form-control" name="file" id="file" placeholder="file">
                    @if($intervenant->file)
                        <p>Fichier actuel: {{ $intervenant->file }}</p>
                    @endif
                </div>
            </div>

            <div class="form-group row">>
                <label class="custom-file-label" for="chooseFile">Projets</label>
            </div>

            <div class="text-center">
				<input type="submit" class="btn btn-primary" value="Valider les modifications" />
			</div>	
        </form>      
	</div>
</div>

@endsection('content')