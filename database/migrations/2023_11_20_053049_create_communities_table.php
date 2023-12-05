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
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('commune_id')->unsigned()->nullable();
            $table->string('name', 250)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('phone', 100)->nullable();
            $table->string('administrator_name', 250)->nullable();
            $table->string('administrator_phone', 250)->nullable();
            $table->string('email', 100)->nullable();
            $table->longText('obs')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
