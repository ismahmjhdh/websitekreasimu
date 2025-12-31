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
        Schema::create('materi_files', function (Blueprint $table) {
            $table->id();
            $table->integer('materi_id');
            $table->string('file_name'); // Nama file yang ditampilkan
            $table->string('file_url'); // Path file PDF
            $table->string('file_type')->default('pdf'); // Tipe file
            $table->integer('file_size')->nullable(); // Ukuran file dalam bytes
            $table->integer('order')->default(0); // Urutan file
            
            $table->foreign('materi_id')->references('id')->on('materi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_files');
    }
};
