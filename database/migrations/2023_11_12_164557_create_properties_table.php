<?php

use Illuminate\Database\Eloquent\SoftDeletingScope;
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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('owner_id')->unsigned()->nullable();            
            $table->integer('region_id')->unsigned()->nullable();
            $table->integer('commune_id')->unsigned()->nullable();
            $table->integer('community_id')->unsigned()->nullable();
            $table->integer('property_type')->unsigned()->nullable();
            $table->string('code', 100)->nullable()->unique();
            $table->string('role', 100)->nullable();
            $table->string('address', 250)->nullable();
            $table->string('city', 250)->nullable();
            $table->integer('subclassification')->unsigned()->nullable();
            $table->decimal('m2', 8, 2)->nullable();
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('currency_type')->unsigned()->nullable();
            $table->decimal('rental_value_p', 8, 2)->nullable();
            $table->decimal('rental_value_uf', 8, 2)->nullable();
            $table->integer('start_pay_day')->unsigned()->nullable();
            $table->integer('end_pay_day')->unsigned()->nullable();
            $table->integer('administration_currency_type')->unsigned()->nullable();
            $table->decimal('administration_fee', 8, 2)->nullable();
            $table->decimal('warranty_ammount', 8, 2)->nullable();
            $table->integer('warranty_currency_type')->unsigned()->nullable();
            $table->integer('lease_adjustment_type')->unsigned()->nullable();
            $table->string('lease_adjustment_month',2)->nullable();
            $table->integer('validity')->unsigned()->nullable();
            $table->integer('renewal_alert')->unsigned()->nullable();
            $table->integer('period')->unsigned()->nullable();
            $table->boolean('rent_iva')->nullable()->default(false);
            $table->boolean('use_gc')->nullable()->default(false);
            $table->boolean('pay_contributions')->nullable()->default(false);
            $table->integer('retired')->unsigned()->nullable();
            $table->integer('reaso_retired')->unsigned()->nullable();
            $table->integer('n_rooms')->unsigned()->nullable();
            $table->integer('n_bathrooms')->unsigned()->nullable();
            $table->string('n_deparment', 100)->nullable();
            $table->string('n_warehouse', 100)->nullable();
            $table->string('n_parkin', 100)->nullable();
            $table->integer('water_service_id')->unsigned()->nullable();
            $table->string('water_service_number', 100)->nullable();
            $table->integer('electric_service_id')->unsigned()->nullable();
            $table->string('electric_service_number', 100)->nullable();
            $table->integer('gas_service_id')->unsigned()->nullable();
            $table->string('gas_service_number', 100)->nullable();
            $table->integer('gc_service_id')->unsigned()->nullable();
            $table->longText('observation')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
