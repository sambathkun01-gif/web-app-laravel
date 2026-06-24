<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory', function (Blueprint $table) {
        $table->id('IngredientID');
        $table->string('ItemName', 100);
        $table->string('Category', 50);
        $table->integer('StockLevel')->default(0);
        $table->decimal('UnitPrice', 10, 2)->default(0);
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
