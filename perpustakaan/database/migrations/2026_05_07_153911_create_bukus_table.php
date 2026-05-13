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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();

$table->string('judul');

$table->string('penulis');

$table->integer('harga');

$table->integer('stok')->default(0);

$table->string('gambar');

$table->text('deskripsi')->nullable();

$table->string('publisher')->nullable();

$table->string('release')->nullable();

$table->string('format')->nullable();

$table->string('page')->nullable();

$table->string('isbn')->nullable();

$table->foreignId('kategori_id')
      ->constrained('kategoris')
      ->onDelete('cascade');

$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
