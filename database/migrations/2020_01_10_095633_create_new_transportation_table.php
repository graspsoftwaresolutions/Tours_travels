<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewTransportationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_transportation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('country_id')->nullable();
            $table->Integer('state_id')->nullable();
            $table->string('type')->nullable();
            $table->string('pack_name')->nullable();         
            $table->biginteger('transport_pack_amount')->nullable();
            $table->biginteger('unpack_amount_per_km')->nullable();
            $table->biginteger('unpack_amount_per_hr')->nullable();
            $table->Integer('status')->default('1');
            $table->Integer('created_by')->nullable();
            $table->Integer('updated_by')->nullable();
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
        Schema::dropIfExists('new_transportation');
    }
}
