<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInterestTaxRateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interest_tax_rate', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('country_id')->nullable();
            $table->Integer('state_id')->nullable();
            $table->string('tax')->nullable();
            $table->Integer('created_by')->nullable();
            $table->Integer('updated_by')->nullable();
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
        Schema::dropIfExists('interest_tax_rate');
    }
}
