@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Modifier la catégorie</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $category->nom) }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection 