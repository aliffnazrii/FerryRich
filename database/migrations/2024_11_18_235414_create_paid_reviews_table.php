<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paid_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('content_creator_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('video_id');
            $table->decimal('deal_rate', 10, 2);
            $table->integer('total_product')->default(1);
            $table->string('shipment_tracking_number')->nullable();
            $table->boolean('product_received')->default(false);
            $table->enum('order_status', ['Pending', 'Ready To Ship', 'Delivered'])->default('Pending');
            $table->enum('payment_status', ['Pending', 'Paid', 'Failed'])->default('Pending');
            $table->enum('validation', ['Pending', 'Validated', 'Completed'])->default('Pending');
            $table->string('receipt_photo')->nullable();
            $table->timestamps();

            $table->foreign('content_creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
