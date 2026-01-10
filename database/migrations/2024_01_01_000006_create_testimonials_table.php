<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->string('client_name');
            $table->string('company')->nullable();
            $table->string('position')->nullable();
            $table->text('content');
            $table->integer('rating')->default(5);
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('approved')->default(false);
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};