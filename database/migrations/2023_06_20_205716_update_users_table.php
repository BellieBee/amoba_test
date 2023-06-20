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
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('picture')->nullable();
            $table->string('last_online')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('new_email')->nullable();
            $table->integer('status')->default(1);
            $table->integer('first')->default(0);
            $table->timestamp('last_accept_date')->nullable();
            $table->string('company_contact')->nullable();
            $table->double('credits')->default(0.00);
            $table->double('first_trip')->default(0);
            $table->string('incomplete_profile')->default(0);
            $table->boolean('phone_verify')->default(0);
            $table->string('token_auto_login')->nullable();
            $table->string('user_vertical')->nullable();
            $table->unsignedBigInteger('language_id')->default(1);
            $table->foreign('language_id')->references('id')->on('languages');
            $table->boolean('no_registered')->default(0);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
