<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Jabatan;
use Database\Factories\JabatanFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use HasFactory;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Jabatan::classfactory(10)->create();
        // $this->call(LevelUserSeeder::class);
        // $this->call(MenuSeeder::class);
        $this->call([
            MenuSeeder::class,
            // UsersSeeder::class,
        ]);
        // Jabatan::factory()->count(1)->create();
    }
}
