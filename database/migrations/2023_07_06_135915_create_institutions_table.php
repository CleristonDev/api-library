<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutions', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('uuid_generate_v4()'));
            $table->string('name')->unique();
            $table->string('fantasy_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('cnpj')->unique();
            $table->bigInteger('inep')->unique();
            $table->string('admin_dependency');
            $table->string('phases');
            $table->string('modalities');
            $table->string('type');
            $table->boolean('is_admin');
            $table->string('state_registration')->nullable();
            $table->json('phone');
            $table->json('address');
            $table->json('metadata');
            $table->string('status');
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
