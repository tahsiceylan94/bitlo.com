<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogoptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogoptions')->insert(
            [
                [
                    'description' => 'Blog Menü İçinde Yer Alsın mı?',
                    'key' => 'blog_settings_menu',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Blog Sayfasında Sağ Bar Olsun mu?',
                    'key' => 'blog_settings_rightbar',
                    'value' => '0',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Blog Detay Sayfasında Sağ Bar Olsun mu?',
                    'key' => 'blog_settings_rightbar_in',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Blog Listeleme Kolon Sayısı',
                    'key' => 'blog_settings_column',
                    'value' => '2',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Blog Seo Title',
                    'key' => 'blog_settings_seo_title',
                    'value' => 'Blog | Zeplin Panel',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Blog Seo Description',
                    'key' => 'blog_settings_seo_description',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
            ]);
    }
}
