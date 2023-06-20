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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('external_id');
            $table->string('external_budget_id');
            $table->string('external_route_id');
            $table->unsignedBigInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks');
            $table->string('name');
            $table->string('notes')->nullable();
            $table->timestamp('timestamp')->nullable();
            $table->string('arrival_address');
            $table->timestamp('arrival_timestamp')->nullable();
            $table->string('departure_address');
            $table->timestamp('departure_timestamp')->nullable();
            $table->integer('capacity');
            $table->boolean('confirmed_pax_count')->default(0);
            $table->timestamp('reported_departure_timestamp')->nullable();
            $table->double('reported_departure_kms')->nullable();
            $table->timestamp('reported_arrival_kms')->nullable();
            $table->string('reported_vehicle_plate_number')->nullable();
            $table->integer('status');
            $table->json('status_info');
            $table->integer('reprocess_status')->default(0);
            $table->integer('return')->default(0);
            $table->string('synchronized_downstream')->nullable();
            $table->string('synchronized_upstream')->nullable();
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->bigInteger('sale_tickets_drivers')->default(0);
            $table->string('notes_drivers')->nullable();
            $table->string('itinerary_drivers');
            $table->double('cost_if_externalized')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
