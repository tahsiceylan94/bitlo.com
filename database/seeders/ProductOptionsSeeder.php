<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productsoptions')->insert(
            [
                [
                    'description' => 'Ürünler Menü İçinde Yer Alsın mı?',
                    'key' => 'product_settings_menu',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Ürünler Sayfasında Sağ Bar Olsun mu?',
                    'key' => 'product_settings_rightbar',
                    'value' => '0',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Ürünler Detay Sayfasında Sağ Bar Olsun mu?',
                    'key' => 'product_settings_rightbar_in',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Ürünler Listeleme Kolon Sayısı',
                    'key' => 'product_settings_column',
                    'value' => '2',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Ürünler Seo Title',
                    'key' => 'product_settings_seo_title',
                    'value' => 'Ürünler | Zeplin Panel',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Ürünler Seo Description',
                    'key' => 'product_settings_seo_description',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
            ]);
    }
}
