<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogcatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogcats')->insert(
            [
                [
                    'title' => 'Genel',
                    'content' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'genel',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'seo_title' => 'Genel | Zeplin',
                    'seo_description' => 'Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Kategori 2',
                    'content' => '2 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'kategori-2',
                    'file' => '',
                    'status' => '1',
                    'must' => 2,
                    'seo_title' => 'Kategori 2 | Zeplin',
                    'seo_description' => '2 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ],
                [
                    'title' => 'Kategori 3',
                    'content' => '3 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'slug' => 'kategori-3',
                    'file' => '',
                    'status' => '1',
                    'must' => 1,
                    'seo_title' => 'Kategori 3 | Zeplin',
                    'seo_description' => '3 Yinelenen bir sayfa içeriğinin okuyucunun dikkatini dağıttığı bilinen bir gerçektir.',
                    'seo_keyword' => '',
                    'created_at' => date('Y-m-d h:m:s')
                ]
            ]);
    }
}
