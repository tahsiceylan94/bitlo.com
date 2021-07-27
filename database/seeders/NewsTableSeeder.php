<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert(
            [
                [
                    'title' => 'Haberler Başlığı 1',
                    'content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'haberler-basligi-1',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'seo_title' => 'Haberler Başlığı 1 | Zeplin',
                    'seo_description' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Haberler Başlığı 2',
                    'content' => '2 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'haberler-basligi-2',
                    'file' => '',
                    'status' => '1',
                    'must' => 2,
                    'seo_title' => 'Haberler Başlığı 2 | Zeplin',
                    'seo_description' => '2 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Haberler Başlığı 3',
                    'content' => '3 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'haberler-basligi-3',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'seo_title' => 'Haberler Başlığı 3 | Zeplin',
                    'seo_description' => '3 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Haberler Başlığı 4',
                    'content' => '4 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'haberler-basligi-4',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'seo_title' => 'Haberler Başlığı 4 | Zeplin',
                    'seo_description' => '4 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Haberler Başlığı 5',
                    'content' => '5 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'haberler-basligi-5',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'seo_title' => 'Haberler Başlığı 5 | Zeplin',
                    'seo_description' => '5 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ]
            ]);
    }
}
