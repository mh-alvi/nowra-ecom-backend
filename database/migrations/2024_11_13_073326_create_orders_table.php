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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key referencing `users` table
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Foreign key referencing `users` table

            $table->unsignedBigInteger('product_id'); // Foreign key referencing `users` table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade'); // Foreign key referencing `users` table

            $table->string('order_no')->unique(); // Assuming order_no is a unique identifier
            $table->integer('order_quantity');
            $table->decimal('order_price', 10, 2);
            $table->string('custom_note', 255)->nullable(); // Custom note is optional
            $table->enum('status', ['pending', 'delivered', 'completed', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
