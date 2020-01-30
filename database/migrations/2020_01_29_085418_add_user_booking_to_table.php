<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserBookingToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_master', function (Blueprint $table) {
            $table->string('payment_type')->nullable();
            $table->string('payment_mode')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('balance_amount')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('user_booking')->default(0);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_master', function (Blueprint $table) {
            //
        });
    }
}
