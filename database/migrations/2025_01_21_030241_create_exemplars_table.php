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
        Schema::create('exemplars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catalog_id')->constrained('materials_catalogs')->cascadeOnDelete();
            $table->string('reference_code');
            $table->integer('state');
            $table->foreignId('section_id')->constrained('sections')->cascadeOnDelete();
            $table->foreignId('library_id')->constrained('libraries')->cascadeOnDelete();
            $table->date('acquisition_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exemplars');
    }
};
