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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('experience_level_id')->constrained('experience_levels');
            $table->enum('type', ['hourly', 'fixed-price']);
            $table->enum('scope', ['one-time', 'ongoing', 'complex']);
            $table->decimal('score_required', 5, 2)->nullable();
            $table->foreignId('english_level_id')->nullable()->constrained('english_levels');
            $table->integer('number_of_hires')->default(1);
            $table->foreignId('client_id')->constrained('clients');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('last_viewed_at')->useCurrent();
            $table->boolean('is_active')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
