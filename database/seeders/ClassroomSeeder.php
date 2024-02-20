<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XII-MM (1)'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XI-TKR'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XI-PH'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XII-TKRO'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XII-PH'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XI-DKV (3)'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XII-MM (2)'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XII-TKJ'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XII-TBSM'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XI-DKV (1)'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'X-PH (1)'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'X-TSM (2)'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'X-TJKT'
        ]);

        Classroom::create([
            'uuid' => Str::uuid(),
            'user_id' => 34,
            'name' => 'XI-TSM'
        ]);
    }
}
