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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key for users
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign key for orders
            $table->decimal('amount', 10, 2);
            $table->string('currency', 3)->default('BDT'); // Currency code, defaulting to BDT (Bangladesh Taka)
            $table->enum('payment_method', ['cash_on_delivery', 'bkash', 'nagad', 'rocket', 'card', 'paypal'])
                ->default('cash_on_delivery'); // Payment method options
            $table->enum('status', ['pending', 'completed', 'failed', 'refunded'])
                ->default('pending'); // Payment status
            $table->string('transaction_id')->nullable(); // Transaction ID, optional for cash payments
            $table->text('note')->nullable(); // Optional note or description of the payment
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
