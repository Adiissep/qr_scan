<?php

namespace Database\Seeders;

use App\Models\Scan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Scanseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            ['id' => 1, 'tittle' => 'Simposium'],
            ['id' => 2, 'tittle' => 'Workshop 1'],
            ['id' => 3, 'tittle' => 'Workshop 2'],
            ['id' => 4, 'tittle' => 'Workshop 3'],
            ['id' => 5, 'tittle' => 'Workshop 4'],
            ['id' => 6, 'tittle' => 'Snack'],
        ];

        foreach ($datas as $key => $data){
            Scan::create($data);
        }
    }
}
