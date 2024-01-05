<main class="relative lg:h-full" x-data="{ isSlideOverShow: true, selectedTab: '1' }">
    <div class="h-80 overflow-hidden lg:absolute lg:h-full lg:w-1/2 lg:pr-4 xl:pr-12">
        <img src="{{ asset('images/avery-evans-7rRH23jkIwo-unsplash.jpg') }}" alt="image"
            class="h-full w-full object-cover object-center">
    </div>

    <div
        class="mx-auto max-w-2xl px-4 py-16 sm:px-6 2xl:py-24 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8 xl:gap-x-24 lg:items-center lg:h-full">
        <div class="lg:col-start-2">
            <h1 class="text-sm font-medium text-primary">
                {{ __('Langkah ke 3 dari 3') }}
            </h1>

            <p class="mt-2 text-4xl font-bold tracking-tight text-gray-900 sm:text-5xl">
                {{ $title }}
            </p>

            <p class="mt-2 text-base text-gray-500">
                {{ __('Informasi dibawah ini bukan hanya sekedar hasil, tapi kunci pembuka menuju potensi luar biasa dalam pembelajaranmu.') }}
            </p>

            <dl class="mt-16 text-sm font-medium">
                <dt class="text-gray-900">
                    {{ $student->name }}
                </dt>

                <dd class="mt-2 text-primary flex items-center justify-between">
                    <p>
                        {{ $student->identification_number }}
                    </p>

                    <p class="text-gray-900">
                        {{ $student->class }}
                    </p>
                </dd>
            </dl>

            <dl class="space-y-6 border-t border-gray-200 mt-6 pt-6 text-sm font-medium text-gray-500">
                @foreach ($student->results as $result)
                    <div wire:key="{{ $result->id }}" class="flex justify-between">
                        <dt>
                            {{ $result->type->label }}
                        </dt>

                        <dd class="text-gray-900">
                            {{ __(':values_count%', [
                                'values_count' => number_format(($result->total * 100) / 30, 2),
                            ]) }}
                        </dd>
                    </div>
                @endforeach

                <div class="flex items-center justify-between border-t border-gray-200 pt-6 text-gray-900">
                    <dt class="text-sm">
                        {{ __('Tipe Gaya Belajar') }}
                    </dt>

                    <dd class="text-sm">
                        @foreach ($results->sortByDesc('total') as $result)
                            {{ $result->type->label }}
                        @endforeach
                    </dd>
                </div>
            </dl>

            <dl class="mt-6">
                <div class="rounded-md bg-indigo-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-indigo-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>

                        <div class="ml-3 flex-1 md:flex md:justify-between">
                            <p class="text-sm text-indigo-700">
                                {{ __('Yuk! lihat interpretasi gaya belajar dan saran untuk memaksimalkan pembelajaranmu') }}
                            </p>

                            <p class="mt-3 text-sm md:ml-6 md:mt-0">
                                <button type="button" x-on:click="isSlideOverShow = !isSlideOverShow"
                                    class="whitespace-nowrap font-medium text-indigo-700 hover:text-indigo-600">
                                    {{ __('Lihat detail') }}
                                    <span aria-hidden="true"> &rarr;</span>
                                </button>
                            </p>
                        </div>
                    </div>
                </div>
            </dl>

            <div class="mt-6 border-t border-gray-200 py-6 text-right">
                <x-anchor :href="route('index')" class="text-sm font-medium text-primary hover:text-opacity-80">
                    {{ __('Kembali ke halaman utama') }}
                    <span aria-hidden="true"> &rarr;</span>
                </x-anchor>
            </div>
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
                        <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
                            <div class="p-6">
                                <div class="flex items-start justify-between">
                                    <h2 class="text-base font-semibold leading-6 text-gray-900" id="slide-over-title">
                                        {{ __('Interpretasi dan Saran') }}
                                    </h2>

                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button" x-on:click="isSlideOverShow = !isSlideOverShow"
                                            class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:ring-2 focus:ring-indigo-500">
                                            <span class="absolute -inset-2.5"></span>

                                            <span class="sr-only">
                                                {{ __('Tutup panel') }}
                                            </span>

                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
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
                                            <h2 class="text-sm font-medium text-gray-900">
                                                {{ __('Saran memaksimalkan pembelajaran') }}
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
                                            <h2 class="text-sm font-medium text-gray-900">
                                                {{ __('Saran memaksimalkan pembelajaran') }}
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
                                            <h2 class="text-sm font-medium text-gray-900">
                                                {{ __('Saran memaksimalkan pembelajaran') }}
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
</main>
