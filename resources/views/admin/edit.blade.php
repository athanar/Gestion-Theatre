@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
    <h1>Modifier l'utilisateur : {{ $user->name }}</h1>
    <form action="{{ route('admin.users.update', $user) }}" method="post">
        @csrf
        @method('PATCH')
    
        <!-- Champ du profil -->
        <div class="mb-3">
            <label for="profile" class="form-label">Profil</label>
            <input type="text" name="profile" id="profile" value="{{ $user->profile }}" class="form-control">
        </div>
    
        <!-- Champ de l'email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
        </div>
    
        <!-- Champs du mot de passe (Laissez-le vide si vous ne voulez pas le changer) -->
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe (Laissez-le vide si vous ne voulez pas le changer)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
    
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>
    
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
