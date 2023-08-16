@extends('master')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Détail de l'entreprise {{ $entreprise->raison_sociale }}</h4>
            <div>
                <a href="{{ route('entreprises.edit', $entreprise->id) }}" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Modifier
                </a>
                <form style="display: inline-block" method="POST" action="{{ route('entreprises.destroy', $entreprise->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                </form>
                <a href="{{ route('entreprises.index') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-arrow-left"></i> Revenir à la liste
                </a>
            </div>
        </div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette entreprise ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
                    <form method="POST" action="{{ route('entreprises.destroy', $entreprise->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card-body">

        <ul class="list-unstyled">
            <li><strong>Adresse :</strong> {{ $entreprise->adresse }}</li>
            <li><strong>Télephone :</strong> {{ $entreprise->telephone }}</li>
            <li><strong>Groupe :</strong> {{ $entreprise->groupe }}</li>
            <li><strong>Secteur d'activité :</strong> {{ $entreprise->secteur_activite }}</li>
        </ul>

        <h3 class="mt-5">Contacts</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Fonction</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entreprise->contacts as $contact)
                    <tr>
                        <td>{{ $contact->nom }}</td>
                        <td>{{ $contact->prenom }}</td>
                        <td>{{ $contact->fonction }}</td>
                        <td>{{ $contact->telephone }}</td>
                        <td>{{ $contact->email }}</td>

                        <td>
                            <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">Afficher</a>
                            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form style="display: inline-block" method="POST" action="{{ route('contacts.destroy', $contact->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3 class="mt-5">Projets</h3>
        <a href="{{ route('entreprise.showProjetSelection', $entreprise->id) }}" class="btn btn-primary btn-sm mb-3">Sélectionner des projets à associer</a>
        <ul class="list-group">
            @forelse($entreprise->projets as $projet)
                <li class="list-group-item">{{ $projet->nom_du_projet }}</li>
            @empty
                <li class="list-group-item">Aucun projet associé à cette entreprise.</li>
            @endforelse
        </ul>        

    </div>
</div>

@endsection
