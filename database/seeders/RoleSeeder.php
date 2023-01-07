<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $guru = Role::create(['name' => 'guru']);
        $siswa = Role::create(['name' => 'siswa']);

        // $nama_role->givePermissionTo('nama_permission');
    }
}
