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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('user_id')->constrained();
            $table->string('status');
            $table->string('origin');
            $table->string('destination');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamp('submitted_at');
            $table->timestamp('rejected_at');
            $table->timestamp('cancelled_at');
        });

        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('lat');
            $table->double('long');
        });

        Schema::create('days', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->unsignedBigInteger('start_location_id');
            $table->unsignedBigInteger('end_location_id');
        });

        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained();
            $table->unsignedBigInteger('location_id');
            $table->string('meal');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
        });

        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained();
            $table->unsignedBigInteger('location_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
        });

        Schema::create('routes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('day_id')->constrained()->onDelete('cascade');
            $table->timestamp('start_time');
            $table->unsignedBigInteger('start_location_id');
            $table->unsignedBigInteger('end_location_id');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('days');
        Schema::dropIfExists('meals');
        Schema::dropIfExists('activities');
        Schema::dropIfExists('routes');
    }
};
