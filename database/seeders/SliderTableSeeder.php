<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert(
            [
                [
                    'title' => 'Slider Başlığı 1',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => 'Sayfa-basligi-1',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ],
                [
                    'title' => 'Slider Başlığı 2',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => 'Sayfa-basligi-2',
                    'file' => '',
                    'status' => '1',
                    'must' => 2,
                ],
                [
                    'title' => 'Slider Başlığı 3',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => 'Sayfa-basligi-3',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ]
            ]);
    }
}
