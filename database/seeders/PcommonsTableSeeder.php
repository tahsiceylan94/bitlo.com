<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PcommonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pcommons')->insert([
            [
                'p_id' => 1,
                'c_id' => 1,
                'created_at' => date('Y-m-d h:m:s')
            ],
            [
                'p_id' => 1,
                'c_id' => 2,
                'created_at' => date('Y-m-d h:m:s')
            ],
            [
                'p_id' => 1,
                'c_id' => 3,
                'created_at' => date('Y-m-d h:m:s')
            ],
            [
                'p_id' => 2,
                'c_id' => 1,
                'created_at' => date('Y-m-d h:m:s')
            ],
            [
                'p_id' => 2,
                'c_id' => 3,
                'created_at' => date('Y-m-d h:m:s')
            ],
            [
                'p_id' => 3,
                'c_id' => 2,
                'created_at' => date('Y-m-d h:m:s')
            ]
            ,[
                'p_id' => 3,
                'c_id' => 4,
                'created_at' => date('Y-m-d h:m:s')
            ]
        ]);
    }
}
