<?php

use Illuminate\Database\Seeder;

class PaymentSystemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_systems')->insert([
            'title'=>'Advanced Cash',
            'key' => 'advcash'   
        ]);
        DB::table('payment_systems')->insert([
            'title'=>'Btc',
            'key' => 'btc'
        ]);
        DB::table('payment_systems')->insert([
            'title'=>'PayPal',
            'key' => 'paypal'    
        ]);
        DB::table('payment_systems')->insert([
            'title'=>'Payeer',
            'key' => 'payeer'   
        ]);
        DB::table('payment_systems')->insert([
            'title'=>'Perfect Money',
            'key' => 'perfectmoney'   
        ]);
    }
}
