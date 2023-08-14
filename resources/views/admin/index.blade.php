@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-white">
    <h1>Liste des utilisateurs</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Ajouter un utilisateur</a>
    <div class="container mt-4">
        <div>
            <table class="table mb-0 border">
                <thead>
                    <tr>
                        <th class="py-3">Nom</th>
                        <th class="py-3">Email</th>
                        <th class="py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="px-3">{{ $user->name }}</td>
                            <td class="px-3">{{ $user->email }}</td>
                            <td class="px-3">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning">Modifier</a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
