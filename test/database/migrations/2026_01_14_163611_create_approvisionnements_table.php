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
        Schema::create('approvisionnements', function (Blueprint $table) {
            $table->id('appro_id');
            $table->string('qte_appro');
            $table->string('date_appro');
            $table->integer('produit_id')->nullable();
            $table->integer('stock_avant')->nullable()->after('qte_appro');
            $table->integer('stock_apres')->nullable()->after('stock_avant');
            $table->timestamps();
            $table->foreign('produit_id')->references('produit_id')->on('produits')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvisionnements');
    }
};
