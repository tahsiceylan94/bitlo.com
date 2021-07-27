<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsoptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('newsoptions')->insert(
            [
                [
                    'description' => 'Haberler Menü İçinde Yer Alsın mı?',
                    'key' => 'news_settings_menu',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Haberler Sayfasında Sağ Bar Olsun mu?',
                    'key' => 'news_settings_rightbar',
                    'value' => '0',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Haberler Detay Sayfasında Sağ Bar Olsun mu?',
                    'key' => 'news_settings_rightbar_in',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Haberler Listeleme Kolon Sayısı',
                    'key' => 'news_settings_column',
                    'value' => '2',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Haberler Seo Title',
                    'key' => 'news_settings_seo_title',
                    'value' => 'Haberler | Zeplin Panel',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Haberler Seo Description',
                    'key' => 'news_settings_seo_description',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
            ]);
    }
}
