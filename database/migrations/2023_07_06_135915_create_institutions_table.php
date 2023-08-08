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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('fantasy_name')->nullable();
            $table->string('email')->unique();
            $table->string('cnpj')->unique();
            $table->bigInteger('inep')->unique();
            $table->string('admin_dependency');
            $table->string('phases');
            $table->string('modalities');
            $table->string('state_registration')->nullable();
            $table->json('phone');
            $table->json('address');
            $table->json('metadata');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
