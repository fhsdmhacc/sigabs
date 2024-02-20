<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ashif Ahmad Hakim',
                'email' => 'ashifahmadhakim@gmail.com',
                'role' => 'Super Admin',
            ],
            [
                'name' => 'Abdul Rohman',
                'email' => 'abdulrohman62@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Acep Bahtiar Rifai',
                'email' => 'aceprifai21@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Amrulloh',
                'email' => 'amrulloh21@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Andi Pandowo',
                'email' => 'andipandowo55@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Bayu Nurkholis',
                'email' => 'bayunurkholis92@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Chusnul Jiwar',
                'email' => 'chusnuljiwar18@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Defri Yenti',
                'email' => 'defriyenti56@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Dona',
                'email' => 'dona61@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Dwi Wiyati Budi Hapsari',
                'email' => 'dwihapsari51@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Eliyanto',
                'email' => 'eliyanto92@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Endah Sri Rahayu',
                'email' => 'endahrahayu08@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Feni Wulan Utami',
                'email' => 'feniutami92@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Frinsma Ninalia',
                'email' => 'frinsmaninalia96@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Hanny Handayani',
                'email' => 'hannyhandayani11@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Ida Amatusyakur',
                'email' => 'idaamatusyakur56@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Ilham Nur Karim',
                'email' => 'ilhamkarim11@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Japarudin Nijaptulloh',
                'email' => 'japarudinnijaptulloh11@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Kun Abdilbar Muallim, S. Pd',
                'email' => 'kunpd34@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Linda Rizkyani',
                'email' => 'lindarizkyani53@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Machfud Arifin',
                'email' => 'machfudarifin80@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Mahmudin',
                'email' => 'mahmudin34@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Muhamad Syahril',
                'email' => 'muhamadsyahril33@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Nabeel Ahmad',
                'email' => 'nabeelahmad08@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Nirwan Salim',
                'email' => 'nirwansalim61@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Nurcahyadi',
                'email' => 'nurcahyadi67@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Puput Putri Rahmawati',
                'email' => 'puputrahmawati27@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Rieda Hidayati',
                'email' => 'riedahidayati72@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Rizal Fauzi',
                'email' => 'rizalfauzi33@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Siti Rohmah',
                'email' => 'sitirohmah68@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Sobirin',
                'email' => 'sobirin53@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Syafratul Fuad Hasan',
                'email' => 'syafratulhasan62@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Teguh Winarto',
                'email' => 'teguhwinarto63@guru.smk.belajar.id',
                'role' => 'Teacher',
            ],
            [
                'name' => 'Wasim Ahmad Asgar',
                'email' => 'wasimasgar37@guru.smk.belajar.id',
                'role' => 'Super Admin',
            ]
        ];

        foreach ($users as $user) {
            User::create([
                'uuid' => Str::uuid(),
                'name' => $user['name'],
                'email' => $user['email'],
                'email_verified_at' => now(),
                'password' => Hash::make(12345678),
                'is_password_changed' => $user['name'] == 'Ashif Ahmad Hakim' ? true : false,
            ])->assignRole($user['role']);
        }
    }
}
