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
        $students = [
            [
                'classroom_id' => 1,
                'name' => 'Abdul Azis',
                'nis' => 21221001,
                'birthday' => '2006-08-06',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 2,
                'name' => 'Abdul Azis',
                'nis' => 22231279,
                'birthday' => '2007-04-29',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 3,
                'name' => 'Abdul Mutholib',
                'nis' => 22231001,
                'birthday' => '2006-01-20',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 4,
                'name' => 'Abdullah Abdul Azis Tanjung',
                'nis' => 21221002,
                'birthday' => '2005-08-04',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 5,
                'name' => 'Abelia',
                'nis' => 21221003,
                'birthday' => '2006-01-28',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 2,
                'name' => 'Abril Febriansyah',
                'nis' => 22231002,
                'birthday' => '2006-04-29',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 6,
                'name' => 'Achmad Al Kahfi Nuur Imansyah',
                'nis' => 22231003,
                'birthday' => '2007-12-19',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 7,
                'name' => 'Achmad Dhani Guntoro',
                'nis' => 21221004,
                'birthday' => '2006-10-13',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 8,
                'name' => 'Achmad Fadillah',
                'nis' => 21221005,
                'birthday' => '2005-05-27',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 8,
                'name' => 'Achmad Fauzan Dzakri',
                'nis' => 21221197,
                'birthday' => '2006-01-26',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 9,
                'name' => 'Achmad Sutiadji',
                'nis' => 21221006,
                'birthday' => '2006-06-27',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 10,
                'name' => 'Achmad Zulfiqar',
                'nis' => 22231004,
                'birthday' => '2007-08-18',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 1,
                'name' => 'Addibah Nur Hikmah',
                'nis' => 21221007,
                'birthday' => '2005-12-31',
                'gender' => 'P',
            ],
            [
                'classroom_id' => 9,
                'name' => 'Ade Putra Andrian',
                'nis' => 21221008,
                'birthday' => '2006-08-06',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 11,
                'name' => 'Ade Raisma Fitria',
                'nis' => 11111111,
                'birthday' => '2007-10-15',
                'gender' => 'P',
            ],
            [
                'classroom_id' => 12,
                'name' => 'Ade Ridho Ahmad',
                'nis' => 22222222,
                'birthday' => '2007-10-19',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 13,
                'name' => 'Ade Rizki Akbar',
                'nis' => 33333333,
                'birthday' => '2007-02-01',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 9,
                'name' => 'Adha Surya Maulana',
                'nis' => 21221009,
                'birthday' => '2005-01-20',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 13,
                'name' => 'Adika Maulana Hanafi',
                'nis' => 44444444,
                'birthday' => '2007-08-21',
                'gender' => 'L',
            ],
            [
                'classroom_id' => 14,
                'name' => 'Adil Mulia Ramadhan',
                'nis' => 22231005,
                'birthday' => '2006-11-30',
                'gender' => 'L',
            ]
        ];

        foreach ($students as $student) {
            Student::create([
                'uuid' => Str::uuid(),
                'classroom_id' => $student['classroom_id'],
                'name' => $student['name'],
                'nis' => $student['nis'],
                'birthday' => $student['birthday'],
                'gender' => $student['gender'],
            ]);
        }
    }
}
