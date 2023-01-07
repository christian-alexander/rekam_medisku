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
        $pelayan_kesehatan = Role::create(['name' => 'pelayan_kesehatan']); //bisa dokter atau pengobat tradisional
        $pasien = Role::create(['name' => 'pasien']);

        // $nama_role->givePermissionTo('nama_permission');
    }
}
