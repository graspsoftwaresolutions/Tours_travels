<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title_name')->nullable();
            $table->string('duartion_hours')->nullable();
            $table->string('amount')->nullable();
            $table->string('country_id')->nullable();
            $table->string('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('address_one')->nullable();
            $table->string('address_two')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('langitude')->nullable();
            $table->text('short_description')->nullable();
            $table->text('overview')->nullable();
            $table->text('additional_info')->nullable();
            $table->mediumtext('inclusion_name')->nullable();
            $table->mediumtext('exclusion_name')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->nullable();
            $table->string('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Activities');
    }
}
