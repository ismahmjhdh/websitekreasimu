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
        Schema::create('berita', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title');
            $table->text('content');
            $table->string('youtube_link')->nullable();
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->integer('created_by')->index('created_by');
            $table->enum('status', ['draft', 'published'])->nullable()->default('published');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
