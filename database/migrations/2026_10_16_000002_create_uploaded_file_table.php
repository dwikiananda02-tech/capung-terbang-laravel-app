<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('uploaded_file', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipe_file', ['video', 'photo'])->nullable();
            $table->string('judul_karya', 255);
            $table->string('dokumen', 500);
            $table->unsignedInteger('kategori_id');
            $table->decimal('harga', 10, 0);
            $table->string('lokasi_pengambilan', 255);
            $table->timestamp('created_date');
            $table->string('created_by', 10);
            $table->timestamp('updated_date');
            $table->string('updated_by', 10);

            // Struktur mengikuti database saat ini; foreign key tidak ditambahkan
            // agar sesuai dengan tabel existing yang diberikan.
            $table->index('kategori_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('uploaded_file');
    }
};
