<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Ürün 1',
                'content' => '<p>1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-1',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 1 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Ürün 2',
                'content' => '<p>2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-2',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 2 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Ürün 3',
                'content' => '<p>3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-3',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 3 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Ürün 4',
                'content' => '<p>4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-4',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 4 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Ürün 5',
                'content' => '<p>5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-5',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 5 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Ürün 6',
                'content' => '<p>6 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-6',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 6 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Ürün 7',
                'content' => '<p>7 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Praesent at risus ut mi interdum dapibus. Aenean non augue diam. Aenean imperdiet tempus metus vel imperdiet.',
                'slug' => 'urun-7',
                'fiyat' => '39',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Ürün 7 | Ürünler | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'created_at' => date('Y-m-d h:m:s')
            ],
        ]);
    }
}
