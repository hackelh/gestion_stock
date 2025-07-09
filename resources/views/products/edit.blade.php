@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Modifier le produit</h1>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $product->nom) }}" required>
            @error('nom')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="reference" class="form-label">Référence</label>
            <input type="text" name="reference" id="reference" class="form-control" value="{{ old('reference', $product->reference) }}" required>
            @error('reference')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix (€)</label>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control" value="{{ old('prix', $product->prix) }}" required>
            @error('prix')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="seuil_minimum" class="form-label">Seuil minimum</label>
            <input type="number" name="seuil_minimum" id="seuil_minimum" class="form-control" value="{{ old('seuil_minimum', $product->seuil_minimum) }}" required>
            @error('seuil_minimum')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">-- Choisir --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if(old('category_id', $product->category_id) == $category->id) selected @endif>{{ $category->nom }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection 