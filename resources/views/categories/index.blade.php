@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Catégories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->nom }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 