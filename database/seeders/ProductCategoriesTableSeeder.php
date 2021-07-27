<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productcategories')->insert([
            [
                'title' => 'Kategori 1',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-1',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => NULL,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 1.1',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-1-1',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => 1,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 2',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-2',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => NULL,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 2.1',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-2-1',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => 2,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 2.2',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-2-2',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => 2,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 1.2',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-1-2',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => 1,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 3',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-3',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => NULL,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 3.1',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-3-1',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => 3,
                'created_at' => date('Y-m-d h:m:s')
            ],[
                'title' => 'Kategori 4',
                'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie. Nam dolor sapien, rutrum faucibus est non, tincidunt aliquet tortor. In turpis erat, viverra venenatis tortor et, facilisis interdum sem. In convallis tincidunt odio et laoreet. Sed lacus diam, convallis fringilla maximus non, condimentum nec nisi. Vivamus id erat mi. Nulla eu nulla quis turpis vehicula egestas. Aliquam in interdum risus. Vivamus erat ligula, fringilla non posuere quis, malesuada at diam. Duis ac egestas magna, at dapibus sapien. Cras nisl odio, pulvinar quis ante vitae, scelerisque malesuada augue. Nullam in enim arcu.</p><p>Sed vel molestie libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam porta eros elementum, aliquam sem et, iaculis est. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nullam nec orci ultrices ligula maximus pellentesque eu at enim. Proin neque purus, blandit quis metus a, rhoncus eleifend odio. Donec suscipit ipsum quis est efficitur placerat non quis nunc. Curabitur placerat id ex ut venenatis. Sed porta varius mauris mattis consectetur. Donec blandit arcu vitae bibendum aliquam. Vestibulum accumsan, libero sit amet placerat dictum, justo massa bibendum justo, sit amet vulputate tortor sem ut eros. Integer at blandit orci, at ullamcorper purus. Nulla sit amet sapien non ligula pretium dictum quis vitae nibh. Fusce dapibus at erat nec vestibulum.</p>',
                'short_content' => 'Vestibulum nisl quam, congue sit amet elit in, tincidunt aliquam quam. Duis quis pellentesque lacus.',
                'slug' => 'kategori-4',
                'file' => NULL,
                'status' => '1',
                'seo_title' => 'Kategor 1 | Zeplin Project',
                'seo_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum volutpat volutpat lectus eget molestie.',
                'parent_id' => NULL,
                'created_at' => date('Y-m-d h:m:s')
            ]
        ]);
    }
}
