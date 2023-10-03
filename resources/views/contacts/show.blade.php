@extends('master')

@section('content')

<!-- Start Card -->
<div class="card">
    <!-- Start Card Header -->
    <div class="card-header bg-primary text-white">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Détail du contact</h4>
            <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-warning btn-sm">Modifier</a>                         
            <a href="{{ route('contacts.index') }}" class="btn btn-primary btn-sm">Retour à la liste</a>
        </div>
    </div>
    <!-- End Card Header -->

    <!-- Start Card Body -->
    <div class="card-body">
        <!-- Contact Name -->
        <h1>{{ $contact->nom }} {{ $contact->prenom }}</h1>

        <!-- Contact Function -->
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Fonction</b></label>
            <div class="col-sm-10">{{ $contact->fonction }}</div>
        </div>

        <!-- Contact Phone -->
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Téléphone</b></label>
            <div class="col-sm-10">{{ $contact->telephone }}</div>
        </div>

        <!-- Contact Email -->
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Email</b></label>
            <div class="col-sm-10">{{ $contact->email }}</div>
        </div>

        <!-- Contact Company -->
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Entreprise</b></label>
            <div class="col-sm-10">
                <a href="{{ route('entreprises.show', $contact->entreprises->id) }}" class="btn btn-primary btn-sm">{{ $contact->entreprises->raison_sociale }}</a>
            </div>
        </div>

        <!-- Contact Comments -->
        <h4>Commentaires</h4>

        @if ($contact->commentaires->count() > 0)
            <ul>
                @foreach ($contact->commentaires as $commentaire)
                    <li>({{ $commentaire->created_at->format('d/m/Y') }}) - {{ $commentaire->commentaire }}</li>
                @endforeach
            </ul>
        @else
            <p>Aucun commentaire pour ce contact.</p>
        @endif
    </div>
    <!-- End Card Body -->
</div>
<!-- End Card -->

@endsection('content')
