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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->timestamp('upload_date')->nullable();
            $table->string('video_link')->nullable();
            $table->string('ad_code')->nullable();
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->enum('validate', ['1', '0'])->default('0');
            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->text('feedback')->nullable();

            $table->timestamps();

            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reviewed_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
