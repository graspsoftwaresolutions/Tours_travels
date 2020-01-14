<?php

use Illuminate\Database\Seeder;

class chargeTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('charge_types')->insert([
            'name' => 'Airport(pickup/Drop)',
        ]);
        DB::table('charge_types')->insert([
            'name' => 'Driver beta',
        ]);
        DB::table('charge_types')->insert([
            'name' => 'Toll & Parking',
        ]);
        DB::table('charge_types')->insert([
            'name' => 'Interest Rate Tax',
            'tax_type' => '1',
        ]);
    }
}
