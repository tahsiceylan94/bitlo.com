<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HomeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homesettings')->insert(
            [
                [
                    'description' => 'Slider Modül Kullanımı',
                    'key' => 'home_settings_slider',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 1 Durumu',
                    'key' => 'home_settings_manset_bir_durum',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 1 Başlık',
                    'key' => 'home_settings_manset_bir_baslik',
                    'value' => 'Anasayfa Manşet Başlık 1',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 1 Açıklama',
                    'key' => 'home_settings_manset_bir_aciklama',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 1 Buton Metin',
                    'key' => 'home_settings_manset_bir_buton_metin',
                    'value' => 'Bize Ulaşın',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 1 Buton Link',
                    'key' => 'home_settings_manset_bir_buton_link',
                    'value' => '#',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 2 Durumu',
                    'key' => 'home_settings_manset_iki_durum',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 2 Başlık',
                    'key' => 'home_settings_manset_iki_baslik',
                    'value' => 'Anasayfa Manşet Başlık 2',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 2 Açıklama',
                    'key' => 'home_settings_manset_iki_aciklama',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 2 Buton Metin',
                    'key' => 'home_settings_manset_iki_buton_metin',
                    'value' => 'İletişim',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Manşet 2 Buton Link',
                    'key' => 'home_settings_manset_iki_buton_link',
                    'value' => '#',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anasayfa Kutu Modülü Göster/Gizle',
                    'key' => 'home_settings_homebox',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anasayfa Kısa Bilgi Yazısı Durumu',
                    'key' => 'home_settings_kisa_durum',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anasayfa Kısa Bilgi Yazısı',
                    'key' => 'home_settings_kisa_yazisi',
                    'value' => '<h2>Modern Business Features</h2><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit:</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, omnis doloremque non cum id reprehenderit, quisquam totam aspernatur tempora minima unde aliquid ea culpa sunt. Reiciendis quia dolorum ducimus unde.</p>',
                    'type' => 'ckeditor',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anasayfa Kısa Bilgi Fotoğraf',
                    'key' => 'home_settings_kisa_fotograf',
                    'value' => '',
                    'type' => 'file',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],

                [
                    'description' => 'Anasayfa Seo Title',
                    'key' => 'home_settings_seo_title',
                    'value' => 'Anasayfa Zeplin Project',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anasayfa Seo Description',
                    'key' => 'home_settings_seo_description',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae.',
                    'type' => 'textarea',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Anasayfa Kısa Başlık',
                    'key' => 'home_settings_kisa_baslik',
                    'value' => 'Anasayfa Kısa Başlık',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
            ]);
    }
}
