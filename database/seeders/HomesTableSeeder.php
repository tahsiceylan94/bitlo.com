<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HomesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homes')->insert(
            [
                [
                    'title' => 'Anasayfa Başlığı 1',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => '#',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ],
                [
                    'title' => 'Anasayfa Başlığı 2',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => '#',
                    'file' => '',
                    'status' => '1',
                    'must' => 2,
                ],
                [
                    'title' => 'Anasayfa Başlığı 3',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => '#',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ],
                [
                    'title' => 'Anasayfa Başlığı 4',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => '#',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ],
                [
                    'title' => 'Anasayfa Başlığı 5',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => '#',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ],
                [
                    'title' => 'Anasayfa Başlığı 6',
                    'content' => 'Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin.',
                    'slug' => '#',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                ]
            ]);
    }
}
