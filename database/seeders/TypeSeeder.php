<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'value' => 'A',
            'label' => 'Visual',
        ]);

        Type::create([
            'value' => 'B',
            'label' => 'Auditori',
        ]);

        Type::create([
            'value' => 'C',
            'label' => 'Kinestetik',
        ]);
    }
}
