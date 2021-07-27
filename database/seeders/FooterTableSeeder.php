<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('footers')->insert(
            [
                [
                    'description' => 'İletişim',
                    'key' => 'footer_blok_iletisim',
                    'value' => 'iletisim',
                    'type' => 'blok',
                    'must' => 0,
                    'type_withpicture' => '0',
                    'delete' => '0',
                    'status' => '1'
                ],[
                'description' => 'Blog',
                'key' => 'footer_blok_blog',
                'value' => 'blog',
                'type' => 'blok',
                'must' => 1,
                'type_withpicture' => '0',
                'delete' => '0',
                'status' => '1'
            ],[
                'description' => 'Sayfalar',
                'key' => 'footer_blok_sayfalar',
                'value' => 'footer_blok_sayfalar',
                'type' => 'ckeditor',
                'must' => 2,
                'type_withpicture' => '0',
                'delete' => '0',
                'status' => '1'
            ],[
                'description' => 'Bilgilendirme',
                'key' => 'footer_blok_bilgilendirme',
                'value' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis efficitur tellus. Proin vel venenatis neque. Nunc auctor dui nec nulla posuere, in blandit libero dapibus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vestibulum non neque ante.</p>',
                'type' => 'ckeditor',
                'must' => 3,
                'type_withpicture' => '0',
                'delete' => '0',
                'status' => '1'
            ]
            ]);
    }
}
