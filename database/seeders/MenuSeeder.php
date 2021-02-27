<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            [
                'nama_menu' => 'Master data',
                'level_menu' => 'main_menu',
                'url' => 'master-data',
                'aktif' => 'Y',
                'nomor_urut' => 1,
                'master_menu' => 0,
            ],
            [
                'nama_menu' => 'Divisi',
                'level_menu' => 'sub_menu',
                'url' => 'master-data/divisi',
                'aktif' => 'Y',
                'nomor_urut' => 2,
                'master_menu' => 1,
            ],
            [
                'nama_menu' => 'Jabatan',
                'level_menu' => 'sub_menu',
                'url' => 'master-data/jabatan',
                'aktif' => 'Y',
                'nomor_urut' => 3,
                'master_menu' => 1,
            ],
            [
                'nama_menu' => 'Konfigurasi',
                'level_menu' => 'main_menu',
                'url' => 'konfigurasi',
                'aktif' => 'Y',
                'nomor_urut' => 4,
                'master_menu' => 0,
            ],
            [
                'nama_menu' => 'Setup aplikasi',
                'level_menu' => 'sub_menu',
                'url' => 'konfigurasi/setup',
                'aktif' => 'Y',
                'nomor_urut' => 5,
                'master_menu' => 4,
            ],
        ]);
    }
}
