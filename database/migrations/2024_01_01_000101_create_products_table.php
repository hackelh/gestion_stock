<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('reference')->unique();
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2);
            $table->integer('stock');
            $table->integer('seuil_minimum');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
}; 