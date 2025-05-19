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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('jobs');
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('pay_amount');
            $table->timestamp('created_at')->useCurrent();
            $table->boolean('is_completed');
            $table->unsignedTinyInteger('client_rating')->nullable();
            $table->string('client_feedback')->nullable();
            $table->unsignedTinyInteger('talent_rating')->nullable();
            $table->string('talent_feedback')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};
