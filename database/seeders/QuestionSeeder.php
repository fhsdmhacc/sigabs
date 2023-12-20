<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'name' => 'Ketika saya mengoperasikan peralatan baru, pada umumnya saya'
            ],
            [
                'name' => 'Ketika saya perlu petunjuk untuk bepergian, saya biasanya'
            ],
            [
                'name' => 'Ketika saya memasak masakan baru, saya biasanya melakukan'
            ],
            [
                'name' => 'Jika saya mengajar seseorang tentang sesuatu yang baru, saya cenderung untuk'
            ],
            [
                'name' => 'Saya cenderung mengatakan'
            ],
            [
                'name' => 'Selama waktu senggang, saya paling menikmati saat'
            ],
            [
                'name' => 'Ketika saya pergi berbelanja pakaian, saya cenderung untuk'
            ],
            [
                'name' => 'Bila saya memilih liburan, saya biasanya'
            ],
            [
                'name' => 'Jika saya membeli mobil baru, saya akan'
            ],
            [
                'name' => 'Ketika saya sedang belajar keterampilan baru, saya paling nyaman'
            ],
            [
                'name' => 'Jika saya memilih makanan pada daftar menu, saya cenderung untuk'
            ],
            [
                'name' => 'Ketika saya mendengarkan pertunjukan sebuah band, saya tidak bisa'
            ],
            [
                'name' => 'Ketika saya berkonsentrasi, saya paling sering'
            ],
            [
                'name' => 'Saya memilih peralatan rumah tangga karena saya suka'
            ],
            [
                'name' => 'Memori pertama saya terbentuk ketika'
            ],
            [
                'name' => 'Ketika saya cemas, saya'
            ],
            [
                'name' => 'Saya dapat mengingat orang lain, karena'
            ],
            [
                'name' => 'Ketika saya harus merevisi untuk ujian, saya biasanya'
            ],
            [
                'name' => 'Jika saya menjelaskan kepada seseorang, saya cenderung'
            ],
            [
                'name' => 'Saya benar-benar suka'
            ],
            [
                'name' => 'Sebagian besar waktu luang, saya habiskan'
            ],
            [
                'name' => 'Ketika pertama kali saya bertemu seseorang yang baru, saya biasanya'
            ],
            [
                'name' => 'Saya memperhatikan orang melalui'
            ],
            [
                'name' => 'Jika saya marah, saya cenderung untuk'
            ],
            [
                'name' => 'Saya merasa lebih mudah untuk mengingat'
            ],
            [
                'name' => 'Saya pikir bahwa saya dapat mengetahui apakah seseorang berbohong jika'
            ],
            [
                'name' => 'Ketika saya bertemu dengan seorang teman lama'
            ],
            [
                'name' => 'Saya mengingat hal-hal yang terbaik dengan cara'
            ],
            [
                'name' => 'Jika saya mengeluh tentang barang rusak yang sudah dibeli, saya paling nyaman'
            ],
            [
                'name' => 'Saya cenderung mengatakan'
            ]
        ];

        foreach ($questions as $question) {
            Question::create([
                'uuid' => Str::uuid(),
                'name' => $question['name'],
            ]);
        }
    }
}
