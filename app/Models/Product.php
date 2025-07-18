<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'reference',
        'description',
        'prix',
        'stock',
        'seuil_minimum',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
} 