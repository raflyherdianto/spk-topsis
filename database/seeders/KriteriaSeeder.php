<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriteria = [
            [
                'code' => 'C1',
                'name' => 'Ulasan Pengguna',
                'type'=> 'benefit',
                'weight'=> 0.456,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C2',
                'name' => 'Kapasitas Penyimpanan',
                'type'=> 'cost',
                'weight'=> 0.256,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C3',
                'name' => 'Rating',
                'type'=> 'benefit',
                'weight'=> 0.156,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C4',
                'name' => 'Jumlah Pengguna (dalam juta)',
                'type'=> 'benefit',
                'weight'=> 0.09,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'C5',
                'name' => 'Aplikasi Berbayar',
                'type'=> 'cost',
                'weight'=> 0.04,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Kriteria::insert($kriteria);
    }
}
