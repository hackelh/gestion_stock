<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProduits = Product::count();
        $totalStock = Product::sum('stock');
        $valeurTotale = Product::sum(\DB::raw('prix * stock'));
        $produitsSousSeuil = Product::whereColumn('stock', '<', 'seuil_minimum')->get();
        $produitsRupture = Product::where('stock', 0)->get();

        return view('dashboard', [
            'totalProduits' => $totalProduits,
            'totalStock' => $totalStock,
            'valeurTotale' => $valeurTotale,
            'produitsSousSeuil' => $produitsSousSeuil,
            'produitsRupture' => $produitsRupture,
        ]);
    }
} 