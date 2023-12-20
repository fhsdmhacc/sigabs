<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            1 => [
                [
                    'value' => 'A',
                    'label' => 'Membaca instruksinya lebih dulu'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mendengarkan penjelasan dari seseorang yang pernah menggunakan peralatan tersebut'
                ],
                [
                    'value' => 'C',
                    'label' => 'Menggunakan peralatan tersebut, saya akan mampu mengetahuinya selagi menggunakannya'
                ]
            ],
            2 => [
                [
                    'value' => 'A',
                    'label' => 'Melihat peta'
                ],
                [
                    'value' => 'B',
                    'label' => 'Bertanya denah/arah ke orang lain'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mengikuti naluri dan mungkin menggunakan kompas'
                ]
            ],
            3 => [
                [
                    'value' => 'A',
                    'label' => 'Mengikuti petunjuk resep tertulis'
                ],
                [
                    'value' => 'B',
                    'label' => 'Menelepon seorang teman untuk mendapatkan penjelasan'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mengikuti naluri, mencoba seperti biasanya saya memasak'
                ]
            ],
            4 => [
                [
                    'value' => 'A',
                    'label' => 'Menulis instruksi bagi mereka'
                ],
                [
                    'value' => 'B',
                    'label' => 'Memberi penjelasan secara lisan kepada mereka'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mendemonstrasikan terlebih dahulu dan kemudian membiarkan mereka berlanjut'
                ]
            ],
            5 => [
                [
                    'value' => 'A',
                    'label' => 'Lihat bagaimana saya melakukannya'
                ],
                [
                    'value' => 'B',
                    'label' => 'Dengarkan saya menjelaskan'
                ],
                [
                    'value' => 'C',
                    'label' => 'Lakukanlah sendiri'
                ]
            ],
            6 => [
                [
                    'value' => 'A',
                    'label' => 'Pergi ke museum dan galeri'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mendengarkan musik dan bincang-bincang dengan teman-teman saya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Bermain olahraga atau melakukan hal yang bisa saya lakukan'
                ]
            ],
            7 => [
                [
                    'value' => 'A',
                    'label' => 'Membayangkan apakah pakaian tersebut sesuai bagi saya'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mendiskusikannya dengan karyawan toko'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mencoba pakaian dan melihat kesesuaiannya'
                ]
            ],
            8 => [
                [
                    'value' => 'A',
                    'label' => 'Membaca banyak brosur'
                ],
                [
                    'value' => 'B',
                    'label' => 'Meminta rekomendasi dari teman-teman'
                ],
                [
                    'value' => 'C',
                    'label' => 'Membayangkan akan seperti apa jika berada di sana'
                ]
            ],
            9 => [
                [
                    'value' => 'A',
                    'label' => 'Membaca ulasan di koran dan majalah'
                ],
                [
                    'value' => 'B',
                    'label' => 'Membahas apa yang saya butuhkan dengan teman-teman'
                ],
                [
                    'value' => 'C',
                    'label' => 'Melakukan test-drive banyak jenis'
                ]
            ],
            10 => [
                [
                    'value' => 'A',
                    'label' => 'Melihat apa yang pengajar lakukan'
                ],
                [
                    'value' => 'B',
                    'label' => 'Menanyakan ke pengajar tentang apa yang seharusnya saya lakukan'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mencobanya dan menemukan sendiri ketika saya mempelajarinya'
                ]
            ],
            11 => [
                [
                    'value' => 'A',
                    'label' => 'Membayangkan makanan akan seperti apa'
                ],
                [
                    'value' => 'B',
                    'label' => 'Memikirkannya sendiri atau membicarakannya dengan pasangan saya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Membayangkan makanan akan terasa seperti apa'
                ]
            ],
            12 => [
                [
                    'value' => 'A',
                    'label' => 'Melihat anggota band dan orang lain di antara para penonton'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mendengarkan lirik dan nada'
                ],
                [
                    'value' => 'C',
                    'label' => 'Terbawa dalam suasana dan musik'
                ]
            ],
            13 => [
                [
                    'value' => 'A',
                    'label' => 'Fokus pada kata-kata atau gambar di depan saya'
                ],
                [
                    'value' => 'B',
                    'label' => 'Membahas masalah dan memikirkan solusi yang mungkin dapat dilakukan'
                ],
                [
                    'value' => 'C',
                    'label' => 'Banyak melihat hal di sekitar, mencatat yang diperlukan'
                ]
            ],
            14 => [
                [
                    'value' => 'A',
                    'label' => 'Warnanya dan bagaimana penampilannya'
                ],
                [
                    'value' => 'B',
                    'label' => 'Paparan dari pramuniaga'
                ],
                [
                    'value' => 'C',
                    'label' => 'Tekstur peralatan tersebut dan bagaimana rasanya menyentuhnya'
                ]
            ],
            15 => [
                [
                    'value' => 'A',
                    'label' => 'Melihat sesuatu'
                ],
                [
                    'value' => 'B',
                    'label' => 'Sedang membicarakannya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Melakukan sesuatu'
                ]
            ],
            16 => [
                [
                    'value' => 'A',
                    'label' => 'Membayangkan skenario terburuk'
                ],
                [
                    'value' => 'B',
                    'label' => 'Memikirkan apa yang paling mengkhawatirkan saya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Tidak dapat duduk tenang, mondar mandir'
                ]
            ],
            17 => [
                [
                    'value' => 'A',
                    'label' => 'Penampilan mereka'
                ],
                [
                    'value' => 'B',
                    'label' => 'Apa yang mereka katakan kepada saya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Bagaimana mereka membuat saya mampu mengingatkan saya tentang mereka'
                ]
            ],
            18 => [
                [
                    'value' => 'A',
                    'label' => 'Menulis banyak catatan revisi dan diagram'
                ],
                [
                    'value' => 'B',
                    'label' => 'Menekuni catatan saya sendiri, atau membahasnya dengan orang lain'
                ],
                [
                    'value' => 'C',
                    'label' => 'Membayangkan membuat kemajuan belajar atau menciptakan rumus/cara yang tepat'
                ]
            ],
            19 => [
                [
                    'value' => 'A',
                    'label' => 'Menunjukkan kepada mereka apa yang saya maksud'
                ],
                [
                    'value' => 'B',
                    'label' => 'Menjelaskan kepada mereka dengan cara yang memungkinkan sampai mereka paham'
                ],
                [
                    'value' => 'C',
                    'label' => 'Memotivasi mereka untuk mencoba dan menyampaikan ide saya selagi mereka melakukan kegiatan'
                ]
            ],
            20 => [
                [
                    'value' => 'A',
                    'label' => 'Menonton film, fotografi, melihat seni atau mengamati orang-orang sekitar'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mendengarkan musik, radio atau bincang-bincang dengan teman-teman'
                ],
                [
                    'value' => 'C',
                    'label' => 'Berperan serta dalam kegiatan olahraga, atau menikmati makanan yang disajikan'
                ]
            ],
            21 => [
                [
                    'value' => 'A',
                    'label' => 'Menonton televisi'
                ],
                [
                    'value' => 'B',
                    'label' => 'Berbincang-bincang dengan teman-teman'
                ],
                [
                    'value' => 'C',
                    'label' => 'Melakukan aktivitas fisik atau membuat sesuatu'
                ]
            ],
            22 => [
                [
                    'value' => 'A',
                    'label' => 'Mengatur pertemuan bersama'
                ],
                [
                    'value' => 'B',
                    'label' => 'Berbicara dengan mereka melalui telepon'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mencoba melakukan sesuatu bersama-sama, misalnya suatu kegiatan atau makan bersama'
                ]
            ],
            23 => [
                [
                    'value' => 'A',
                    'label' => 'Tampilan dan pakaiannya'
                ],
                [
                    'value' => 'B',
                    'label' => 'Suara dan cara berbicaranya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Caranya berdiri dan bergerak'
                ]
            ],
            24 => [
                [
                    'value' => 'A',
                    'label' => 'Terus mengingat dan mencari tahu hal yang membuat saya marah'
                ],
                [
                    'value' => 'B',
                    'label' => 'Menyampaikan ke orang-orang sekitar tentang perasaan saya'
                ],
                [
                    'value' => 'C',
                    'label' => 'Membanting pintu atau menunjukkan kemarahan saya dengan cara lainnya'
                ]
            ],
            25 => [
                [
                    'value' => 'A',
                    'label' => 'Wajah'
                ],
                [
                    'value' => 'B',
                    'label' => 'Nama'
                ],
                [
                    'value' => 'C',
                    'label' => 'Hal-hal yang telah saya lakukan'
                ]
            ],
            26 => [
                [
                    'value' => 'A',
                    'label' => 'Mereka menghindari melihat Anda'
                ],
                [
                    'value' => 'B',
                    'label' => 'Perubahan suara mereka'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mereka menunjukkan hal aneh'
                ]
            ],
            27 => [
                [
                    'value' => 'A',
                    'label' => 'Saya berkata "Senang bertemu denganmu!"'
                ],
                [
                    'value' => 'B',
                    'label' => 'Saya berkata "Senang mendengar kabar tentangmu!"'
                ],
                [
                    'value' => 'C',
                    'label' => 'Saya memberi mereka pelukan atau jabat tangan'
                ]
            ],
            28 => [
                [
                    'value' => 'A',
                    'label' => 'Menulis catatan atau menyimpan rincian materi print-out'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mengatakan dengan suara keras atau mengulang-ulang kata-kata penting dan menghafal kata-kata kunci'
                ],
                [
                    'value' => 'C',
                    'label' => 'Melakukan dan mempraktikkan kegiatan atau membayangkan bagaimana suatu hal dilakukan'
                ]
            ],
            29 => [
                [
                    'value' => 'A',
                    'label' => 'Menulis surat'
                ],
                [
                    'value' => 'B',
                    'label' => 'Mengontak melalui telepon'
                ],
                [
                    'value' => 'C',
                    'label' => 'Mengembalikan ke toko atau menyampaikannya ke kepala kantor'
                ]
            ],
            30 => [
                [
                    'value' => 'A',
                    'label' => 'Saya paham apa yang Anda maksud'
                ],
                [
                    'value' => 'B',
                    'label' => 'Saya mendengar apa yang Anda katakan'
                ],
                [
                    'value' => 'C',
                    'label' => 'Saya tahu bagaimana Anda merasakannya'
                ]
            ]
        ];

        foreach ($questions as $item => $options) {
            foreach ($options as $option) {
                Option::create([
                    'question_id' => $item,
                    'value' => $option['value'],
                    'label' => $option['label'],
                ]);
            }
        }
    }
}
