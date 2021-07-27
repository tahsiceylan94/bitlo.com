<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert(
            [
                [
                    'description' => 'Tel',
                    'key' => 'contact_phone',
                    'value' => '0850 123 45 67',
                    'type' => 'text',
                    'must' => 0,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Tel 2',
                    'key' => 'contact_phone_two',
                    'value' => '0850 987 65 43',
                    'type' => 'text',
                    'must' => 1,
                    'delete' => '0',
                    'status' => '0'
                ],
                [
                    'description' => 'E-Mail',
                    'key' => 'contact_mail',
                    'value' => 'info@zeplin.com',
                    'type' => 'text',
                    'must' => 2,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'E-Mail 2',
                    'key' => 'contact_mail_two',
                    'value' => 'contact@zeplin.com',
                    'type' => 'text',
                    'must' => 3,
                    'delete' => '0',
                    'status' => '0'
                ],
                [
                    'description' => 'Facebook',
                    'key' => 'contact_facebook',
                    'value' => 'https://facebook.com',
                    'type' => 'text',
                    'must' => 4,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Instagram',
                    'key' => 'contact_instagram',
                    'value' => 'https://instagram.com',
                    'type' => 'text',
                    'must' => 5,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Twitter',
                    'key' => 'contact_instagram',
                    'value' => 'https://twitter.com',
                    'type' => 'text',
                    'must' => 6,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Youtube',
                    'key' => 'contact_youtube',
                    'value' => 'https://youtube.com',
                    'type' => 'text',
                    'must' => 7,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Google Maps',
                    'key' => 'contact_gmaps',
                    'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48152.64792803771!2d29.01271013379477!3d41.0353079435299!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cac826d524c9f1%3A0xc14f7612337b7f38!2zw5xza8O8ZGFyL8Swc3RhbmJ1bA!5e0!3m2!1str!2str!4v1610208279672!5m2!1str!2str" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
                    'type' => 'textarea',
                    'must' => 8,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Adres',
                    'key' => 'contact_adres',
                    'value' => '<p>deneme mahallesi deneme <br> sokak deneme apt 26/2</p>',
                    'type' => 'ckeditor',
                    'must' => 9,
                    'delete' => '0',
                    'status' => '1'
                ],


                [
                    'description' => 'Contact Seo Title',
                    'key' => 'contact_seo_title',
                    'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce quis efficitur tellus. Proin vel venenatis neque.',
                    'type' => 'textarea',
                    'must' => 10,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Contact Seo Description',
                    'key' => 'contact_seo_description',
                    'value' => 'İletişim | Zeplin Cms',
                    'type' => 'textarea',
                    'must' => 11,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Contact Seo Keywords',
                    'key' => 'contact_seo_keywords',
                    'value' => 'iletişim, zeplin iletişim',
                    'type' => 'textarea',
                    'must' => 12,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Contact Form Durum',
                    'key' => 'contact_form_has',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 13,
                    'delete' => '0',
                    'status' => '1'
                ],
                [
                    'description' => 'Contact Menü',
                    'key' => 'contact_menu_has',
                    'value' => '1',
                    'type' => 'text',
                    'must' => 14,
                    'delete' => '0',
                    'status' => '1'
                ],
            ]);
    }
}
