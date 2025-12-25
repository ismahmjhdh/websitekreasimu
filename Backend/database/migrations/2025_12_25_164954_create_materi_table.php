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
        Schema::create('materi', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('file_url')->nullable();
            $table->string('access_password');
            $table->integer('related_news_id')->nullable()->index('related_news_id');
            $table->integer('created_by')->index('created_by');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
