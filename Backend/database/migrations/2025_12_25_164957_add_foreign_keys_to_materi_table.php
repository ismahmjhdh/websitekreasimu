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
        Schema::table('materi', function (Blueprint $table) {
            $table->foreign(['related_news_id'], 'materi_ibfk_1')->references(['id'])->on('berita')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['created_by'], 'materi_ibfk_2')->references(['id'])->on('admins')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('materi', function (Blueprint $table) {
            $table->dropForeign('materi_ibfk_1');
            $table->dropForeign('materi_ibfk_2');
        });
    }
};
