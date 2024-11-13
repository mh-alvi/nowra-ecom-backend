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
            $table->id();
            $table->string('name', 255);
            $table->string('description', 500);
            $table->string('image')->nullable(); // Assuming `image` is a path or URL to the image
            $table->string('size', 20);
            $table->decimal('price', 10, 2);
            $table->string('coupon', 255)->nullable();
            $table->decimal('discount_price', 10, 2)->nullable();
            $table->string('status')->default('inactive');
            $table->string('product_code', 255);
            $table->timestamps();
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
