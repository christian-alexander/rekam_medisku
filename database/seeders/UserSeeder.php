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
            'tipe_tenaga_kesehatan' => 0,
        ]);

        $dokter = User::create([
            'username' => 'dokter',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Dokter',
            'tipe_tenaga_kesehatan' => 1,
        ]);

        $pengobat_tradisional = User::create([
            'username' => 'pengobat_tradisional',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Pengobat Tradisional',
            'tipe_tenaga_kesehatan' => 2,
        ]);

        $pasien = User::create([
            'username' => 'pasien',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Pasien',
            'tipe_tenaga_kesehatan' => 0,
        ]);

        

        $admin->assignRole('admin');
        $dokter->assignRole('tenaga_kesehatan');
        $pengobat_tradisional->assignRole('tenaga_kesehatan');
        $pasien->assignRole('pasien');

    }
}
