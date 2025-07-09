@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Ajouter une catégorie</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection 