<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('social_links');
        Schema::dropIfExists('newsletter_campaigns');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No se implementa down() porque no tenemos los esquemas originales aquí
        // y el objetivo es limpiar tablas de modelos eliminados.
    }
};
