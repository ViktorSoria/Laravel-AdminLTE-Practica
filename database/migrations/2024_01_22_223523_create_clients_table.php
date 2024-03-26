<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('curp', 18);
            $table->string('apellido', 75);
            $table->string('nombre', 75);
            $table->string('email', 75);
            $table->string('telefono', 15);
            $table->string('direccion')->nullable();
            $table->string('estado',15)->nullable();
            $table->string('alta',15)->nullable();
            $table->string('contrato',50)->nullable();
            $table->string('folio',8)->nullable();
            $table->string('baja',15)->nullable();
            $table->string('estatus',8)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
