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
        Schema::create('products', function (Blueprint $table) {
            $table->string("CodePro", 25)->primary();
            $table->string("NomPro", 255);
            $table->string("Color", 25);
            $table->double("BuyPrice");
            $table->double("SellPrice");
            $table->integer("QuantityStk");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
