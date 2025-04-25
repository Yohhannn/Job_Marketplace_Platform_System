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
        Schema::create('baybal_accounts', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->decimal('balance')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baybal_accounts');
    }
};
