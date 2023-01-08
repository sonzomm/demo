<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table ->id();
            $table ->dateTime('booking_date')->nullable();
            $table->foreignId('id_staff')->constrained('staff')->nullable();
            $table->foreignId('id_customer')->constrained('customers')->nullable();
            $table->foreignId('id_room')->constrained('rooms')->nullable();
            $table->foreignId('id_service')->constrained('services')->nullable();
            $table->date('date_checkin')->nullable();
            $table->date('date_checkout')->nullable();
            $table->integer('price_room')->nullable();
            $table->integer('price_service')->nullable();
            $table->integer('day')->nullable();
            $table->float('total_price')->nullable();
            $table->string('status')->nullable();
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
};
