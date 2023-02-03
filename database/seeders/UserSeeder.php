<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\KtpPasien;
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
            'no_hp' => '08123456789',
            'tipe_tenaga_kesehatan' => 0,
        ]);

        $dokter = User::create([
            'username' => 'dokter',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Dr. Hari Setiawan',
            'no_hp' => '08123456789',
            'tipe_tenaga_kesehatan' => 1,
        ]);

        $pengobat_tradisional = User::create([
            'username' => 'pengobat_tradisional',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Dukun Parjo',
            'no_hp' => '08123456789',
            'tipe_tenaga_kesehatan' => 2,
        ]);

        $pasien = User::create([
            'username' => 'pasien',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Pasien',
            'no_hp' => '08123456789',
            'jenis_kelamin' => 1,
            'tanggal_lahir' => '2001-01-01',
            'tipe_tenaga_kesehatan' => 0,
        ]);

        

        $admin->assignRole('admin');
        $dokter->assignRole('tenaga_kesehatan');
        $pengobat_tradisional->assignRole('tenaga_kesehatan');
        $pasien->assignRole('pasien');

        // ktp pasien
        KtpPasien::create([
            'pasien_id' => $pasien->id
        ]);
    }
}
