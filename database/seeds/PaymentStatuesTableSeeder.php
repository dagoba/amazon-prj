<?php

use Illuminate\Database\Seeder;

class PaymentStatuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_statuses')->insert([
            'title_ru'=>'Создана',
            'title_en'=>'Created by'            
        ]);
        DB::table('payment_statuses')->insert([
            'title_ru'=>'Проведена',
            'title_en'=>'Held'            
        ]);
        DB::table('payment_statuses')->insert([
            'title_ru'=>'Отклонена',
            'title_en'=>'Rejected'            
        ]);
        DB::table('payment_statuses')->insert([
            'title_ru'=>'Отменена',
            'title_en'=>'Canceled'            
        ]);
        DB::table('payment_statuses')->insert([
            'title_ru'=>'На рассмотрении',
            'title_en'=>'Under consideration'            
        ]);
    }
}
