<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Apa itu identifikasi gaya belajar siswa?',
                'answer' => 'Proses menentukan cara terbaik siswa untuk memahami dan mengingat informasi. Ini mencakup gaya belajar seperti Visual, Auditori, dan Kinestetik.',
            ],
            [
                'question' => 'Bagaimana cara mengetahui gaya belajar melalui website ini?',
                'answer' => 'Siswa akan diberikan kuesioner sebanyak 30 pertanyaan untuk mengumpulkan informasi tentang gaya belajarnya. Website ini dikhususkan untuk siswa/i SMK Fadilah',
            ],
            [
                'question' => 'Apa manfaat mengetahui gaya belajar?',
                'answer' => 'Mengetahui gaya belajar dapat membantu tenaga pendidik, siswa dan orang tua untuk menyusun strategi pembelajaran yang lebih efektif dan sesuai dengan kebutuhan individu siswa.',
            ],
            [
                'question' => 'Apakah gaya belajar dapat berubah seiring waktu?',
                'answer' => 'Ya, gaya belajar dapat berkembang seiring waktu. Oleh karena itu, disarankan untuk secara periodik melakukan identifikasi gaya belajar untuk mengakomodasi perubahan gaya belajar.',
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create([
                'uuid' => Str::uuid(),
                'question' => $faq['question'],
                'answer' => $faq['answer'],
            ]);
        }
    }
}
