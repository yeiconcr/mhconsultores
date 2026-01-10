<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('company')->nullable();
            $table->string('industry');
            $table->text('challenge');
            $table->longText('solution');
            $table->longText('results');
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('location');
            $table->date('completion_date')->nullable();
            $table->integer('duration_months')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('show_client')->default(true);
            $table->json('metrics')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};