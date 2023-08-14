@extends('layouts.app')

@section('content')

<style>
    .form-control {
        color: black;
    }
</style>

<div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
    <h1>Ajouter un utilisateur</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.users.store') }}" method="post" >
        @csrf
        
        <!-- Champ Nom/Login -->
        <div class="form-group">
            <label for="name">Nom/Login:</label>
            <input type="text" name="name" id="name" class="form-control text-black" required>
        </div>
    
        <!-- Champ Email -->
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
    
        <!-- Champ Mot de passe -->
        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>
    
        <!-- Champ Confirmation du Mot de passe -->
        <div class="form-group">
            <label for="password_confirmation">Confirmer le mot de passe:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
    
</div>
@endsection
