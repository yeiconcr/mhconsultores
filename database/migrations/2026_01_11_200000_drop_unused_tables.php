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
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('appointments');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('testimonials'); // Dropping testimonials before projects might help too, but disabling FK is safer
        Schema::dropIfExists('projects');
        Schema::dropIfExists('social_links');
        Schema::dropIfExists('newsletter_campaigns');

        Schema::enableForeignKeyConstraints();
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
