<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert(
            [
                [
                    'settings_description' => 'Başlık 1',
                    'settings_key' => 'title',
                    'settings_value' => 'Laravel Zeplin Starting',
                    'settings_type' => 'text',
                    'settings_must' => 0,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Başlık 1',
                    'settings_key' => 'Description',
                    'settings_value' => 'Laravel Zeplin Description',
                    'settings_type' => 'text',
                    'settings_must' => 1,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Anahtar Kelimeler',
                    'settings_key' => 'keywords',
                    'settings_value' => 'zeplin, cms, tahsin berk ceylan',
                    'settings_type' => 'text',
                    'settings_must' => 2,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Logo',
                    'settings_key' => 'settings_logo',
                    'settings_value' => NULL,
                    'settings_type' => 'file',
                    'settings_must' => 3,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Icon',
                    'settings_key' => 'ico',
                    'settings_value' => NULL,
                    'settings_type' => 'file',
                    'settings_must' => 4,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Footer Kolon Sayısı',
                    'settings_key' => 'footer_kolon_sayisi',
                    'settings_value' => '4',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Sitemize Hoş Geldiniz',
                    'settings_key' => 'settings_welcome_text',
                    'settings_value' => 'Sitemize Hoş Geldiniz',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Sitemize Hoş Geldiniz',
                    'settings_key' => 'settings_logo',
                    'settings_value' => 'Sitemize Hoş Geldiniz',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Site Başlığı',
                    'settings_key' => 'settings_site_name',
                    'settings_value' => 'Zeplin Web Sitesi',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Logo Genişliği',
                    'settings_key' => 'settings_logo_width',
                    'settings_value' => '155',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Logo Genişliği',
                    'settings_key' => 'settings_logo_width',
                    'settings_value' => '155',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ],[
                    'settings_description' => 'Site Telif Hakları Yazısı',
                    'settings_key' => 'settings_footer',
                    'settings_value' => 'Tüm Hakları Saklıdır © Zeplin Yazılım',
                    'settings_type' => 'text',
                    'settings_must' => 9,
                    'settings_delete' => '0',
                    'settings_status' => '1'
                ]
            ]);
    }
}
