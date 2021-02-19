<?php

use Illuminate\Database\Seeder;
use App\Models\Setting;
class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
            'default_locale'=>'ar',
            'default_timezone'=>'Asia/Jerusalem',
            'reviews_enabled'=>true,
            'auto_approve_reviews'=>true,
            'supported_currencies'=>['USD','SAR','ILS'],
            'default_currency'=>'USD',
            'store_email'=>'admin@ecommerce.test',
            'search_engine'=>'mysql',
            'local_shopping_cost'=>0,
            'outer_shopping_cost'=>0,
            'free_shopping_cost'=>0,
            'translatable'=>[
                'store_name'=>'Mohammed Store',
                'free_shopping_label'=>'Free Shopping',
                'local_shopping_label'=>'Local Shopping',
                'outer_shopping_label'=>'Outer Shopping',
            ],
        ]);
    }
}
