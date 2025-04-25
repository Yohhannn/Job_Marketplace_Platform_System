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
        Schema::create('hourly_jobs', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->decimal('rate_min');
            $table->decimal('rate_max');
            $table->integer('weekly_hours_limit');
            $table->foreignId('duration_id')->constrained('durations');

            $table->primary('id');
            $table->foreign('id')->references('id')->on('jobs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hourly_jobs');
    }
};
