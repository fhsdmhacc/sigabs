<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'uuid' => Str::uuid(),
            'name' => 'Fulan Ahmad',
            'identification_number' => 12345678,
            'birthday' => '2023-12-20',
            'gender' => 'L',
            'class' => 'X-TKJ',
        ]);
    }
}
