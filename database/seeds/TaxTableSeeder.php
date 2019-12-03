<?php

use Illuminate\Database\Seeder;

class TaxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tax')->insert([
            'tax_name' => 'GST',
            'tax_value' => '5000',
        ]);
    }
}
