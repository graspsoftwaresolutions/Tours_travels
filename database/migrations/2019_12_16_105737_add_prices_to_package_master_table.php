<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesToPackageMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_master', function (Blueprint $table) {
            $table->float('total_accommodation', 8, 2)->default(0)->after('status');
            $table->float('total_activities', 8, 2)->default(0)->after('total_accommodation');
            $table->float('transport_charges', 8, 2)->default(0)->after('total_activities');
            $table->float('additional_charges', 8, 2)->default(0)->after('transport_charges');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('package_master', function (Blueprint $table) {
            //
        });
    }
}
