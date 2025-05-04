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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('email')->unique();
            $table->integer('contact_number')->unique();
            $table->string('password');
            $table->string('desc_title')->nullable();
            $table->text('desc_text')->nullable();
            $table->foreignId('experience_level_id')->constrained('experience_levels');
            $table->foreignId('english_level_id')->constrained('english_levels');
            $table->decimal('hourly_rate');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
