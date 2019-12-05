<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->nullable();
            $table->string('company_website')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_phone')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('zipcode')->nullable();
            $table->string('company_address_one')->nullable();
            $table->string('company_address_two')->nullable();
            $table->string('company_logo')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->nullable();
            $table->biginteger('status')->default('1');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('website_settings');
    }
}
