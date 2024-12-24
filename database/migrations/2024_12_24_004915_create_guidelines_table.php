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
        Schema::create('guidelines', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('product_id'); // Foreign key to the products table
            $table->string('title'); // Title of the guideline
            $table->string('file_path'); // Path to the uploaded file
            $table->string('file_type')->nullable(); // File type (e.g., pdf, docx, txt)
            $table->text('remark')->nullable(); // Optional remark for the guideline
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint to link with products table
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guidelines');
    }
};
