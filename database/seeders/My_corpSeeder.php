<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MyCorp;

class My_corpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MyCorp::create([
            'corp' => '株式会社アスカプランニング',
            'postal' => '1111111',
            'address' => '静岡県浜松市南区渡瀬町',
            'tel' => '1234567891',
            'fax' => '1234567891',
            'place' => '貴社',
            'conditions' => '従来通り',
            'deadline' => '一ヶ月',
        ]);
    }
}
