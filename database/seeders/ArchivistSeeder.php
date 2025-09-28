<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Archivist;
use Illuminate\Support\Facades\Hash;

class ArchivistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Archivist::create([
            'login' => 'admin_archive',
            'password' => Hash::make('qwerty'),
            'name' => 'Иванова Мария Сергеевна',
        ]);
    }

}
