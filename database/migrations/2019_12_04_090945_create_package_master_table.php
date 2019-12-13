<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_master', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('package_name')->nullable();
            $table->Integer('adult_count')->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_master');
    }
}
