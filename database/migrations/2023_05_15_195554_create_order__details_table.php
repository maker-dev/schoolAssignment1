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
        Schema::create('order__details', function (Blueprint $table) {
            $table->string("order_num", 25);
            $table->foreign('order_num')->references('NumOrd')->on('orders')->onUpdate('cascade')->onDelete('cascade');
            $table->string("product_code", 25);
            $table->foreign('product_code')->references('CodePro')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("OrderQuantity");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order__details');
    }
};
