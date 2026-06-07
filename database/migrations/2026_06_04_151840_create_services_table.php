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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            //Ajout de la clé etrangère
            $table->foreignId('service_type_id')
            ->constrained('service_types')
            ->cascadeOnUpdate()
            ->restrictOnDelete();

            $table->string('nom');
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.er
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
