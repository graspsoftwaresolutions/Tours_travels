<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBookingTransports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_transports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('day_numbers');
            $table->float('airportpickup_amount', 8, 2)->default(0);
            $table->float('driverbeta_amount', 8, 2)->default(0);
            $table->float('tollparking_amount', 8, 2)->default(0);
            $table->float('interestrate_amount', 8, 2)->default(0);

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
        Schema::dropIfExists('booking_transports');
    }
}
