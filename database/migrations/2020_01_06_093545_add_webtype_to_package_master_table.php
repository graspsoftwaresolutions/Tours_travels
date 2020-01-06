<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWebtypeToPackageMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('package_master', function (Blueprint $table) {
            $table->integer('user_package')->default(0);
            $table->bigInteger('reference_number')->nullable();
            
            $table->integer('created_by')->nullable(); 
            $table->integer('updated_by')->nullable(); 
            $table->bigInteger('package_number')->nullable(); 
            $table->string('user_id')->nullable(); 
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
            $table->integer('user_package');
        });
    }
}
