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
        Schema::create('user_plans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('currency_id');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->bigInteger('next_user_plan_id')->nullable();
            $table->timestamp('start_timestamp')->nullable();
            $table->timestamp('end_timestamp')->nullable();
            $table->timestamp('renewal_timestamp')->nullable();
            $table->double('renewal_price');
            $table->boolean('requires_invoice')->default(0);
            $table->integer('status')->default(1);
            $table->boolean('financiation')->default(0);
            $table->integer('status_finantiation')->default(0);
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->string('nif')->nullable();
            $table->string('business_name')->nullable();
            $table->boolean('pending_payment')->default(0);
            $table->timestamp('date_max_payment')->nullable();
            $table->timestamp('proxim_start_timestamp')->nullable();
            $table->timestamp('proxim_end_timestamp')->nullable();
            $table->timestamp('proxim_renewal_timestamp')->nullable();
            $table->double('proxim_renewal_price')->nullable();
            $table->double('credits_return');
            $table->boolean('cancel_employee')->default(0);
            $table->boolean('force_renovation')->default(0);
            $table->timestamp('date_canceled')->nullable();
            $table->double('amount_confirm_canceled')->nullable();
            $table->double('credit_confirm_canceled')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_plans');
    }
};
