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
        Schema::create('personal_skils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_personalSkil');
            $table->unsignedBigInteger('id_category');
            $table->string('foto_skils');
            $table->foreign('id_category')->references('id')->on('category_skils');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_skils');
    }
};
