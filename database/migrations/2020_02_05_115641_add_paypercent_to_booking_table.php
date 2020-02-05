<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaypercentToBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_master', function (Blueprint $table) {
            $table->integer('paid_percentage')->default(0)->after('paid_amount');
            $table->integer('balance_percentage')->default(0)->after('balance_amount');
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
