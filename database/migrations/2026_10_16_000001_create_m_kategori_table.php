<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kategori', 50);
            $table->timestamp('created_date');
            $table->string('created_by', 4);
            $table->timestamp('updated_date');
            $table->string('updated_by', 4);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_kategori');
    }
};
