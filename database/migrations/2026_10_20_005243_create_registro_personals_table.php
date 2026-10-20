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
        Schema::create('registro_personals', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table ->string('apellidos',100);
            $table->date('fecha_nacimiento');
            $table->unsignedInteger('ninos')->default(0);
            $table->boolean('madre_cabeza')->default(0);
            $table->boolean('estudio')->default(false);
            $table->json('generos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_personals');
    }
};
