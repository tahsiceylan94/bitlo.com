<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert(
            [
                [
                    'title' => 'Blog Başlığı 1',
                    'content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'blog-basligi-1',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'cat' => 1,
                    'seo_title' => 'Blog Başlığı 1 | Zeplin',
                    'seo_description' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Blog Başlığı 2',
                    'content' => '2 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'blog-basligi-2',
                    'file' => '',
                    'status' => '1',
                    'must' => 2,
                    'cat' => 1,
                    'seo_title' => 'Blog Başlığı 2 | Zeplin',
                    'seo_description' => '2 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Blog Başlığı 3',
                    'content' => '3 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'blog-basligi-3',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'cat' => 1,
                    'seo_title' => 'Blog Başlığı 3 | Zeplin',
                    'seo_description' => '3 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Blog Başlığı 4',
                    'content' => '4 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'blog-basligi-4',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'cat' => 1,
                    'seo_title' => 'Blog Başlığı 4 | Zeplin',
                    'seo_description' => '4 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Blog Başlığı 5',
                    'content' => '5 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir. Lorem Ipsum kullanmanın amacı, sürekli buraya metin gelecek, buraya metin gelecek yazmaya kıyasla daha dengeli bir harf dağılımı sağlayarak okunurluğu artırmasıdır.',
                    'short_content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'blog-basligi-5',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'cat' => 1,
                    'seo_title' => 'Blog Başlığı 5 | Zeplin',
                    'seo_description' => '5 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ]
            ]);
    }
}
