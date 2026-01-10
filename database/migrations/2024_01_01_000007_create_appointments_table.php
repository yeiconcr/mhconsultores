<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained()->nullOnDelete();
            $table->string('client_name');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp_number')->nullable();
            $table->string('company')->nullable();
            $table->date('preferred_date');
            $table->time('preferred_time');
            $table->string('location_type')->default('virtual');
            $table->string('city')->nullable();
            $table->text('message')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('confirmed_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cancellation_reason')->nullable();
            $table->boolean('reminder_sent')->default(false);
            $table->string('google_calendar_event_id')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('preferred_date');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};