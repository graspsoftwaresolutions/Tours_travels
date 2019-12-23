<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer('package_type')->nullable();
            $table->Integer('adult_count')->nullable();
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->Integer('child_count')->nullable();
            $table->Integer('infant_count')->nullable();
            $table->Integer('from_country_id')->nullable();
            $table->Integer('from_state_id')->nullable();
            $table->Integer('from_city_id')->nullable();
            $table->Integer('to_country_id')->nullable();
            $table->Integer('to_state_id')->nullable();
            $table->Integer('to_city_id')->nullable();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('created_at')->nullable();
            $table->biginteger('status')->default('1');
            $table->float('total_package_value', 8, 2);
            $table->float('tax_percentage', 8, 2);
            $table->float('tax_amount', 8, 2);
            $table->float('total_amount', 8, 2);
            $table->float('adult_price_person', 8, 2);
            $table->float('child_price_person', 8, 2);
            $table->float('infant_price', 8, 2);
            $table->float('total_accommodation', 8, 2)->default(0);
            $table->float('total_activities', 8, 2)->default(0);
            $table->float('discount_amount', 8, 2);
            $table->float('transport_additional_charges', 8, 2)->default(0);
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_master');
    }
}
