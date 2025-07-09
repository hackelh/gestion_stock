@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Dashboard</h1>
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Nombre total de produits</h5>
                    <p class="card-text display-4">{{ $totalProduits }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Stock total</h5>
                    <p class="card-text display-4">{{ $totalStock }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Valeur totale du stock (€)</h5>
                    <p class="card-text display-4">{{ number_format($valeurTotale, 2, ',', ' ') }}</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Produits en dessous du seuil minimum</h2>
    @if($produitsSousSeuil->count())
        <div class="alert alert-warning">
            <ul>
                @foreach($produitsSousSeuil as $produit)
                    <li>{{ $produit->nom }} (Stock: {{ $produit->stock }}, Seuil: {{ $produit->seuil_minimum }})</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-success">Aucun produit sous le seuil minimum.</div>
    @endif

    <h2>Produits en rupture de stock</h2>
    @if($produitsRupture->count())
        <div class="alert alert-danger">
            <ul>
                @foreach($produitsRupture as $produit)
                    <li>{{ $produit->nom }} (Référence: {{ $produit->reference }})</li>
                @endforeach
            </ul>
        </div>
    @else
        <div class="alert alert-success">Aucun produit en rupture.</div>
    @endif
</div>
@endsection
