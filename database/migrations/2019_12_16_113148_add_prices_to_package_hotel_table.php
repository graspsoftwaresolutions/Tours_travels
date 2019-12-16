<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesToPackageHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_hotel', function (Blueprint $table) {
            $table->integer('total_rooms')->default(0)->after('hotel_id');
            $table->float('total_amount', 8, 2)->default(0)->after('total_rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_hotel', function (Blueprint $table) {
            //
        });
    }
}
