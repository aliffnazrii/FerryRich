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
        Schema::create('paid_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_creator_id');
            $table->foreign('content_creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->integer('deal_rate');
            $table->integer('total_product')->default(1);
            $table->enum('order_status', ['Pending', 'Delivered', 'Cancelled'])->default('Pending');
            $table->enum('payment_status', ['Pending', 'Paid'])->default('Pending');
            $table->date('payment_date_advance')->nullable();
            $table->date('payment_date_final')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paid_reviews');
    }
};
