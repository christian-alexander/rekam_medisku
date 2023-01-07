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
            'nama' => 'Admin Sekolah',
        ]);

        $guru = User::create([
            'username' => 'guru',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Bapak / Ibu Guru',
        ]);

        $siswa = User::create([
            'username' => 'siswa',
            'password' => '$2y$10$CNF5HPBI.g0gBo3oQwPwau1qmcv1TNBofIO7gRnfUn5qvQ2PdKdeO',
            'nama' => 'Siswa',
        ]);

        

        $admin->assignRole('admin');
        $guru->assignRole('guru');
        $siswa->assignRole('siswa');

    }
}
