<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create(['nama_kelas' => '12 IPS 1']);
        Kelas::create(['nama_kelas' => '12 IPS 2']);
        Kelas::create(['nama_kelas' => '12 IPS 3']);
    }
}
