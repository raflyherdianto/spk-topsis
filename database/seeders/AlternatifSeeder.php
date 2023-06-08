<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $alternatif = [
            [
                'code' => 'A1',
                'name' => 'QANDA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A2',
                'name' => 'Photomath',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A3',
                'name' => 'gauthmath',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A4',
                'name' => 'mathway',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A5',
                'name' => 'Microsoft math selver',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A6',
                'name' => 'Camera math',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A7',
                'name' => 'Todo Math',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A8',
                'name' => 'Topmath',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A9',
                'name' => 'Cymath',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'A10',
                'name' => 'Math workout',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
        Alternatif::insert($alternatif);
    }
}
