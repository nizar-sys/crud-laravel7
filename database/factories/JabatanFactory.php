<?php

namespace Database\Factories;

use App\Models\Jabatan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JabatanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jabatan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_jabatan' => 'IT Security',
            'gaji_pokok' => 20000000,
            'tunjangan_jabatan' => 300000,
            'tunjangan_makan_perhari' => 20000,
            'tunjangan_transport_perhari' => 50000
        ];
    }
}
