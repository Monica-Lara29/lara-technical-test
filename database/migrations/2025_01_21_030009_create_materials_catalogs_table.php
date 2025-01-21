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
        Schema::create('materials_catalogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('type');
            $table->string('isbn');
            $table->string('issn');
            $table->string('description');
            $table->integer('reference_value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials_catalogs');
    }
};
