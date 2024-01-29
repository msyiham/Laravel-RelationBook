<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        Permission::create(['name' => 'tambah-indikator']);
        Permission::create(['name' => 'tambah-kelas']);
        Permission::create(['name' => 'lihat-user']);
        Role::create(['name' => 'admin']);
        $roleAdmin = Role::findByName('admin');
        $roleAdmin->givePermissionTo('tambah-indikator');
        $roleAdmin->givePermissionTo('tambah-kelas');
        $roleAdmin->givePermissionTo('lihat-user');
        //Teacher
        Permission::create(['name' => 'penilaian']);
        Permission::create(['name' => 'lihat-rekap']);
        Role::create(['name' => 'teacher']);
        $roleTeacher = Role::findByName('teacher');
        $roleTeacher->givePermissionTo('penilaian');
        $roleTeacher->givePermissionTo('lihat-rekap');
        //Student
        Permission::create(['name' => 'lihat-nilai']);
        Permission::create(['name' => 'buka-profil']);
        Role::create(['name' => 'student']);
        $roleStudent = Role::findByName('student');
        $roleStudent->givePermissionTo('buka-profil');
        $roleStudent->givePermissionTo('lihat-nilai');
    }
}
