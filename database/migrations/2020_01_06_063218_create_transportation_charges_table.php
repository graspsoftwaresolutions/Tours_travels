<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportationChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transportation_charges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('from_country_id')->nullable();
            $table->Integer('from_state_id')->nullable();
            $table->Integer('from_city_id')->nullable();
            $table->Integer('to_country_id')->nullable();
            $table->Integer('to_state_id')->nullable();
            $table->Integer('to_city_id')->nullable();
            $table->float('distance', 8, 2)->nullable();
            $table->float('amount_per_km', 8, 2)->nullable();
            $table->biginteger('total_distance_amount')->nullable();
            $table->Integer('status')->default('1');
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
        Schema::dropIfExists('transportation_charges');
    }
}
