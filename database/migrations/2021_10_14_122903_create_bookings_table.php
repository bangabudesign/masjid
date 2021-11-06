<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_agency')->nullable();
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('event_name');
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->integer('daily_booking_rate')->default(0);
            $table->integer('hourly_booking_rate')->default(0);
            $table->integer('daily_booking_count')->default(0);
            $table->integer('hourly_booking_count')->default(0);
            $table->integer('booking_charge')->default(0);
            $table->boolean('status')->default(0);
            $table->longText('notes')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('spot_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
