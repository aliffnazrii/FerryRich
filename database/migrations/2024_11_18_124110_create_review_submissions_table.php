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
        Schema::create('review_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paid_review_id');
            $table->foreign('paid_review_id')->references('id')->on('paid_reviews')->onDelete('cascade');
            $table->unsignedBigInteger('video_id')->nullable();
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('set null');
            $table->timestamp('post_date')->nullable();
            $table->string('link_video_tiktok')->nullable();
            $table->string('link_video_google')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('review_submissions');
    }
};
