<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Admin Web',
        ]);

        $dokter = User::create([
            'username' => 'dokter',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Dokter',
        ]);

        $pengobat_tradisional = User::create([
            'username' => 'pengobat_tradisional',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Pengobat Tradisional',
        ]);

        $pasien = User::create([
            'username' => 'pasien',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Pasien',
        ]);

        

        $admin->assignRole('admin');
        $dokter->assignRole('dokter');
        $pengobat_tradisional->assignRole('pengobat_tradisional');
        $pasien->assignRole('pasien');

    }
}
