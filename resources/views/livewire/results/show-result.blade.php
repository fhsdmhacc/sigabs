<main>
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8" x-data="{ isSlideOverShow: false, selectedTab: '1' }">
        <div
            class="mx-auto grid max-w-2xl grid-cols-1 grid-rows-1 items-start gap-x-8 gap-y-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            <div class="lg:col-start-3 lg:row-end-1">
                <h2 class="sr-only">
                    {{ __('Ringkasan') }}
                </h2>

                <div class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5">
                    <dl class="flex flex-wrap">
                        <div class="flex-auto pl-6 pt-6">
                            <dt class="text-sm font-semibold leading-6 text-gray-900">
                                {{ __('Detail Hasil') }}
                            </dt>

                            <dd class="mt-1 text-base font-semibold leading-6 text-gray-900">
                                {{ __('Kelas :classroom', [
                                    'classroom' => $classroom->name,
                                ]) }}
                            </dd>
                        </div>

                        <div class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                            <dt class="flex-none">
                                <span class="sr-only">
                                    {{ __('Jumlah Siswa') }}
                                </span>

                                <x-icon name="users" class="h-6 w-5 text-gray-400" />
                            </dt>

                            <dd class="text-sm font-medium leading-6 text-gray-900">
                                {{ __(':count siswa', [
                                    'count' => $classroom->students->count(),
                                ]) }}
                            </dd>
                        </div>

                        <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                            <dt class="flex-none">
                                <span class="sr-only">
                                    {{ __('Dibuat Pada') }}
                                </span>

                                <x-icon name="calendar-days" class="h-6 w-5 text-gray-400" />
                            </dt>

                            <dd class="text-sm leading-6 text-gray-500">
                                {{ __('Dibuat pada :created_at', [
                                    'created_at' => \Carbon\Carbon::parse($classroom->created_at)->isoFormat('DD MMMM YYYY'),
                                ]) }}
                            </dd>
                        </div>
                    </dl>

                    <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                        <button x-on:click="isSlideOverShow = ! isSlideOverShow"
                            class="text-sm font-semibold leading-6 text-gray-900">
                            {{ __('Lihat Saran') }}
                            <span aria-hidden="true">&rarr;</span>
                        </button>
                    </div>
                </div>
            </div>

            <div
                class="-mx-4 px-4 py-8 shadow-sm ring-1 ring-gray-900/5 sm:mx-0 sm:rounded-lg sm:px-8 sm:pb-14 lg:col-span-2 lg:row-span-2 lg:row-end-2 xl:px-16 xl:pb-20 xl:pt-16">
                <table class="w-full whitespace-nowrap text-left text-sm leading-6">
                    <colgroup>
                        <col class="w-full">
                        <col>
                        <col>
                        <col>
                    </colgroup>
                    <thead class="border-b border-gray-200 text-gray-900">
                        <tr>
                            <th scope="col" class="px-0 py-3 font-semibold">
                                {{ __('Nama Siswa') }}
                            </th>

                            <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">
                                {{ __('Visual') }}
                            </th>

                            <th scope="col" class="hidden py-3 pl-8 pr-0 text-right font-semibold sm:table-cell">
                                {{ __('Auditori') }}
                            </th>

                            <th scope="col" class="py-3 pl-8 pr-0 text-right font-semibold">
                                {{ __('Kinestetik') }}
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($classroom->students as $student)
                            <tr class="border-b border-gray-100">
                                <td class="max-w-0 px-0 py-5 align-top">
                                    <div class="truncate font-medium text-gray-900">
                                        {{ $student->name }}
                                    </div>

                                    <div class="truncate text-gray-500">
                                        {{ __('NIS :nis', [
                                            'nis' => $student->nis,
                                        ]) }}
                                    </div>
                                </td>

                                <td
                                    class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">
                                    {{ __(':visual%', [
                                        'visual' => $student->result ? Number::format(($student->result->visual * 100) / 30, 2) : 0,
                                    ]) }}
                                </td>

                                <td
                                    class="hidden py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700 sm:table-cell">
                                    {{ __(':auditory%', [
                                        'auditory' => $student->result ? Number::format(($student->result->auditory * 100) / 30, 2) : 0,
                                    ]) }}
                                </td>

                                <td class="py-5 pl-8 pr-0 text-right align-top tabular-nums text-gray-700">
                                    {{ __(':kinesthetic%', [
                                        'kinesthetic' => $student->result ? Number::format(($student->result->kinesthetic * 100) / 30, 2) : 0,
                                    ]) }}
                                </td>
                            </tr>
                        @empty
                            <tr class="border-b border-gray-100">
                                <td colspan="4" class="max-w-0 px-0 py-5 align-top text-center">
                                    <div class="truncate text-gray-500">
                                        {{ __('Tidak ditemukan data apapun.') }}
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="lg:col-start-3">
                <h2 class="text-sm font-semibold leading-6 text-gray-900">
                    {{ __('Aktivitas Terkini') }}
                </h2>

                <ul role="list" class="mt-6 space-y-6 h-full max-h-96 overflow-y-auto">
                    @forelse ($results as $result)
                        <li class="relative flex gap-x-4">
                            @if (!$loop->last)
                                <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                                    <div class="w-px bg-gray-200"></div>
                                </div>
                            @endif

                            <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                                <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                            </div>

                            <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500">
                                <span class="font-medium text-gray-900">
                                    {{ $result->student->name }}
                                </span>
                                {{ __('telah mengisi tes.') }}
                            </p>

                            <time datetime="{{ $result->updated_at }}"
                                class="flex-none py-0.5 text-xs leading-5 text-gray-500">
                                {{ \Carbon\Carbon::parse($result->updated_at)->shortRelativeDiffForHumans() }}
                            </time>
                        </li>
                    @empty
                        <li class="relative flex gap-x-4">
                            <div class="absolute left-0 top-0 flex w-6 justify-center -bottom-6">
                                <div class="w-px bg-gray-200"></div>
                            </div>

                            <div class="relative flex h-6 w-6 flex-none items-center justify-center bg-white">
                                <div class="h-1.5 w-1.5 rounded-full bg-gray-100 ring-1 ring-gray-300"></div>
                            </div>

                            <p class="flex-auto py-0.5 text-xs leading-5 text-gray-500">
                                {{ __('Tidak ditemukan data apapun.') }}
                            </p>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
            <div x-show="isSlideOverShow" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div x-show="isSlideOverShow" class="fixed inset-0 overflow-hidden">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 sm:pl-16">
                        <div x-show="isSlideOverShow"
                            x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                            x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                            x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                            class="pointer-events-auto w-screen max-w-md" @click.away="isSlideOverShow = false">
                            <div class="flex h-full flex-col bg-white shadow-xl">
                                <div class="p-6">
                                    <div class="flex items-start justify-between">
                                        <h2 class="text-base font-semibold leading-6 text-gray-900"
                                            id="slide-over-title">
                                            {{ __('Interpretasi dan Saran') }}
                                        </h2>

                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button" x-on:click="isSlideOverShow = !isSlideOverShow"
                                                class="relative rounded-md bg-white text-gray-400 hover:text-gray-500">
                                                <span class="absolute -inset-2.5"></span>

                                                <span class="sr-only">
                                                    {{ __('Tutup panel') }}
                                                </span>

                                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-b border-gray-200">
                                    <div class="px-6">
                                        <nav class="-mb-px flex space-x-6">
                                            <button type="button" x-on:click="selectedTab = '1'"
                                                x-bind:class="selectedTab === '1' ? 'border-primary text-primary' :
                                                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                                                class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                                                {{ __('Visual') }}
                                            </button>

                                            <button type="button" x-on:click="selectedTab = '2'"
                                                x-bind:class="selectedTab === '2' ? 'border-primary text-primary' :
                                                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                                                class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                                                {{ __('Auditori') }}
                                            </button>

                                            <button type="button" x-on:click="selectedTab = '3'"
                                                x-bind:class="selectedTab === '3' ? 'border-primary text-primary' :
                                                    'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700'"
                                                class="whitespace-nowrap border-b-2 px-1 pb-4 text-sm font-medium">
                                                {{ __('Kinestetik') }}
                                            </button>
                                        </nav>
                                    </div>
                                </div>

                                <ul role="list" class="flex-1 divide-y divide-gray-200 overflow-y-auto">
                                    <li x-show="selectedTab === '1'">
                                        <div class="px-5 py-6">
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Visual') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <p>
                                                        {{ __('Siswa bergaya belajar visual, seperti namanya, belajar paling baik dengan menggunakan mata mereka. Mereka lebih suka melihat bagaimana melakukan sesuatu daripada berdiskusi. Ini adalah gaya belajar pendidikan konvensial, secara tradisional diarahkan. Tidak mengherankan, karena 60% orang percaya dirinya sebagai pembelajar visual, dan ini adalah salah satu gaya yang lebih mudah untuk mengakomodasi pembelajaran dalam skala besar.') }}
                                                    </p>

                                                    <p class="mt-4">
                                                        {{ __('Gaya belajar visual, berarti siswa belajar dengan melihat dan mencermati.') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Siswa pada umumnya:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Membuat catatan rinci daripada terlibat diskusi.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Cenderung duduk di depan agar dapat melihat dengan jelas.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Mendapatkan manfaat dari ilustrasi dan presentasi, dan terutama yang berwarna.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Memberikan komentar seperti, "Bagaimana kamu melihat situasinya?", "Apa yang kamu lihat dan dapat menghentikanmu agar fokus?", "Apakah kamu melihat apa yang aku tunjukkan padamu?".') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900 mb-4">
                                                    {{ __('Saran memaksimalkan pembelajaran untuk Guru:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Saat mengajar siswa bergaya belajar visual ini, pastikan untuk memiliki diagram, diagram, kode warna, dan video untuk memperkuat pengetahuan.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Siswa bergaya visual menyukai visualisasi berupa garis besar, garis waktu, dan representasi data visual lainnya. Bukan hanya mereka suka membaca, mereka juga mengembangkan konstruksi konten di luar kata-kata, tetapi memvisualisasikannya dengan gambar statis dan gambar bergerak.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Hindari tes yang membutuhkan pendengaran dan respons yang luas. Para siswa ini lebih sesuai jika diberi materi ajar berupa esai, pilihan ganda, dan diagram.') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900 mb-4">
                                                    {{ __('Saran memaksimalkan pembelajaran untuk Siswa:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Gunakan peta, garis waktu dan gambar.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Buatlah garis besar/kerangka hasil baca/belajar! ini dapat membuat peta pikiran atau Mindjet software.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Buat catatan terkait hasil membaca, menonton video, dll.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Gunakan warna-kode. Garis bawahi kata-kata kunci dengan bolpen warna.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Buat diagram bila memungkinkan (diagram venn, diagram kalimat).') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Gunakan flashcards (kartu warna atau penanda).') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Gunakan berbagai jenis bagan (pai, bar, garis).') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li x-show="selectedTab === '2'">
                                        <div class="px-5 py-6">
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Auditori') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <p>
                                                        {{ __('Siswa bergaya belajar auditori memantapkan pemahaman ketika mereka mendengar informasi. Mereka biasanya mengikuti arah dengan baik, berkonsentrasi lebih baik dengan musik atau gerakan di latar belakang dan mengulangi semuanya kembali untuk memastikan mereka mendapatkan informasi dengan pemahaman baik.') }}
                                                    </p>

                                                    <p class="mt-4">
                                                        {{ __('Gaya belajar auditori, berarti siswa belajar dengan mendengar dan menyimak secara intensif.') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Siswa pada umumnya:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Menikmati diskusi dan membicarakan hal-hal melalui dan mendengarkan orang lain.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Mendapatkan pengetahuan dengan membaca keras.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Bergumam atau berbicara kepada diri sendiri.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Memberikan komentar seperti, "Aku mendengarmu dengan jelas", "Saya ingin Anda mendengarkan", "Ini terdengar bagus".') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900 mb-4">
                                                    {{ __('Saran memaksimalkan pembelajaran untuk Guru:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Para siswa ini akan mengajukan banyak pertanyaan, biasanya meminta lebih banyak penjelasan atau berharap guru dapat menjelaskannya dengan cara yang berbeda.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Mereka mungkin akan membaca sedikit lebih lambat dan lebih suka membaca dalam suasana tenang.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Mereka dapat belajar lebih baik dengan orang-orang yang dapat memunculkan ide-ide dan akan lebih baik jika mereka menggunakan audiobook, selain buku teks.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Penugasan yang baik meliputi: wawancara, laporan lisan, parafrase konten. Hindari tes yang membutuhkan banyak tulisan, terutama tes yang berjangka waktu lama.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Para pembelajar ini lebih cocok untuk menunjukkan penguasaan hasil belajar dengan presentasi lisan, seperti dengan ujian lisan atau penulisan bebas (free writing) begitu mereka mendengar teks yang disampaikan, atau menggunakan alat-alat speech-to-text tools (fasilitas yang ada pada telpon genggam android).') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Saran memaksimalkan pembelajaran untuk Siswa:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Gunakan asosiasi kata untuk fakta/tanggal.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Dengarkan podcast/rekaman ceramah.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Gunakan video jika waktunya tepat.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Bahas materi pelajaran dengan menyuarakannya.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Dengarkan buku audio.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Baca catatan dengan suara keras dan rekam.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Ulangi semua materi belajar dengan menyuarakannya bila memungkinkan.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Belajar dalam kelompok dengan cara diskusi.') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li x-show="selectedTab === '3'">
                                        <div class="px-5 py-6">
                                            <div>
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Kinestetik') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <p>
                                                        {{ __('Siswa bergaya belajar kinestetik dapat belajar paling baik dengan berinteraksi atau mengalami hal-hal di sekitarnya. Mereka mendapat manfaat dari keterlibatan langsung, daripada mendengarkan ceramah atau membaca dari sebuah buku. Mereka suka melakukan hal-hal dan menggunakan tubuh mereka untuk mengingat fakta, seperti "memanggil" (dialing) nomor telepon pada telepon genggam mereka.') }}
                                                    </p>

                                                    <p class="mt-4">
                                                        {{ __('Gaya belajar kinestetik, berarti siswa belajar dengan menyentuh dan melakukan.') }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Siswa pada umumnya:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Perlu banyak istirahat dan ingin banyak bergerak.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Berbicara dengan menggunakan tangan dan gerakan/gestur.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Ingat apa yang telah dilakukan, tetapi mengalami kesulitan dengan apa yang dikatakan atau dilihat.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Belajar dengan melakukan aktivitas.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Memberikan komentar seperti, "Bagaimana perasaanmu tentang hal ini?", "Mari maju bersama", "Apakah Anda paham dengan apa yang saya katakan?".') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900 mb-4">
                                                    {{ __('Saran memaksimalkan pembelajaran untuk Guru:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Siswa bergaya belajar kinestetik ini akan menikmati permainan peran, membangun model materi ajar, berkespresimen langsung, melakukan tarian atau aktivitas fisik, dan beragam olahraga.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Menggunakan kecenderungan fisik ini akan memungkinkan mereka untuk mengingat dan memproses lebih baik, daripada duduk di meja atau sesi belajar yang panjang.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Hindari tes yang membutuhkan banyak tulisan, terutama esai.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Para pembelajar ini lebih cocok untuk menunjukkan penguasaan dalam bentuk pemecahan masalah secara cepat, misalnya pilihan ganda, tes dengan isian pendek, atau definisi singkat.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Jika memungkinkan, evaluasi melalui ekspresi fisik akan lebih efektif, seperti dalam menulis bebas dan melakukan permainan.') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="mt-8 border-t border-gray-200 pt-8">
                                                <h2 class="text-sm font-medium text-gray-900">
                                                    {{ __('Saran memaksimalkan pembelajaran untuk Siswa:') }}
                                                </h2>

                                                <div class="prose prose-sm mt-4 text-gray-500">
                                                    <ul role="list">
                                                        <li>
                                                            {{ __('Sering-seringlah (jeda) istirahat.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Melakukan kegiatan yang dilakukan secara langsung, seperti eksperimen dan peragaan sejarah.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Membuat model suatu topik pembelajaran.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Mengikuti berbagai kelas, seperti menari, kickboxing, atau ragam olahraga lainnya.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Menggunakan buku-buku petualangan/tindakan.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Melibatkan bermain peran dan praktikan kegiatan belajar.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Studi dalam kelompok dengan sering istirahat.') }}
                                                        </li>

                                                        <li>
                                                            {{ __('Menggunakan kartu flash untuk memori.') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
