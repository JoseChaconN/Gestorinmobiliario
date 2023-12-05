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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('rut', 100)->nullable();
            $table->string('passport', 100)->nullable();
            $table->string('email_1', 100)->nullable();
            $table->string('email_2', 100)->nullable();
            $table->string('phone_1', 100)->nullable();
            $table->string('phone_2', 100)->nullable();
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('commune_id')->unsigned()->nullable();
            $table->string('city', 100)->nullable();
            $table->string('direction', 100)->nullable();
            $table->string('invoice_name', 100)->nullable();
            $table->string('contact_company', 100)->nullable();
            $table->boolean('penalty_fee')->nullable()->default(false);
            $table->integer('commission_tax')->unsigned()->nullable();
            $table->longText('obs')->nullable();
            $table->boolean('retired')->nullable()->default(false);
            $table->integer('status')->unsigned()->nullable()->default(1);
            $table->string('aval_name', 100)->nullable();
            $table->string('aval_rut', 100)->nullable();
            $table->string('aval_email', 100)->nullable();
            $table->string('aval_phone', 100)->nullable();
            $table->integer('aval_region_id')->unsigned()->nullable();
            $table->integer('aval_commune_id')->unsigned()->nullable();
            $table->string('aval_direction', 100)->nullable();
            $table->string('aval_city', 100)->nullable();
            $table->string('third_name', 100)->nullable();
            $table->string('third_rut', 100)->nullable();
            $table->string('third_email', 100)->nullable();
            $table->string('third_phone', 100)->nullable();
            $table->integer('third_region_id')->unsigned()->nullable();
            $table->integer('third_commune_id')->unsigned()->nullable();
            $table->string('third_direction', 100)->nullable();
            $table->string('third_city', 100)->nullable();
            $table->boolean('owner')->nullable()->default(false);
            $table->boolean('tenant')->nullable()->default(false);
            $table->integer('payer_rut')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
