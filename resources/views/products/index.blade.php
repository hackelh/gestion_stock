@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Produits</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Référence</th>
                <th>Catégorie</th>
                <th>Prix (€)</th>
                <th>Stock</th>
                <th>Seuil min.</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr @if($product->stock == 0) class="table-danger" @elseif($product->stock < $product->seuil_minimum) class="table-warning" @endif>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nom }}</td>
                    <td>{{ $product->reference }}</td>
                    <td>{{ $product->category?->nom }}</td>
                    <td>{{ number_format($product->prix, 2, ',', ' ') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->seuil_minimum }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection 