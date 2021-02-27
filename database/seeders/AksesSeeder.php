<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('akses')->insert([
            [
                'level_user_id' => 1,
                'menu_id' => 1,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
            ],
            [
                'level_user_id' => 1,
                'menu_id' => 2,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
            ],
            [
                'level_user_id' => 1,
                'menu_id' => 3,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
            ],
            [
                'level_user_id' => 1,
                'menu_id' => 4,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
            ],
            [
                'level_user_id' => 1,
                'menu_id' => 5,
                'akses' => 1,
                'tambah' => 1,
                'edit' => 1,
                'hapus' => 1,
            ],
        ]);
    }
}
