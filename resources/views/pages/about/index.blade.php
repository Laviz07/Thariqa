@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')

    <div class="w-full overflow-x-hidden pb-20 lg:pb-0">

        <div class="relative mx-auto max-w-6xl px-4 py-6">

            <div class="flex flex-col items-center justify-center">
                <h1 class="mb-1 inline-block text-3xl font-bold">Dosen Kami</h1>

                <div class="hero justify-center">
                    <div class="hero-content flex-col items-center justify-center gap-8 lg:flex-row">
                        <!-- Gambar -->
                        <div class="h-82 w-64 overflow-hidden rounded-lg shadow-2xl">
                            <img src="{{ asset('images/herta.jpeg') }}"
                                class="h-full w-full rounded-lg object-cover object-center" />
                        </div>

                        <!-- Deskripsi -->
                        <div class="lg:w-3/5">
                            <h1 class="text-3xl font-bold">Khalid Ramdhani S.Pd.I., M.Pd.I</h1>
                            <h1 class="py-3 text-xl font-bold md:text-2xl">Dosen Pendidikan Agama Islam</h1>
                            <p class="py-6">
                                Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
                                quasi. In deleniti eaque aut repudiandae et a id nisi.
                            </p>
                            <button
                                class="btn md:text-md flex w-32 items-center gap-2 rounded-full bg-gradient-to-br from-[#f9ce34] via-[#ee2a7b] to-[#6228d7] px-5 py-2 text-white">
                                Follow
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-instagram text-white" viewBox="0 0 16 16">
                                    <path
                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mx-auto max-w-6xl px-4 py-6" data-aos="fade-up">

            <div class="flex justify-center py-6">
                <h1 class="mb-1 inline-block text-3xl font-bold">Team Kami</h1>
            </div>
            <div class="flex flex-wrap justify-center gap-5">
                @foreach ($member as $mbr)
                    <div class="flex w-[45%] flex-col items-center sm:w-[45%] md:w-[30%] lg:w-[25%] xl:w-[18%]">
                        <div class="mb-2">
                            <div class="relative min-w-full">
                                <div
                                    class="md:w-50 flex h-60 w-40 items-center justify-center overflow-hidden shadow md:h-80">
                                    <img src="{{ asset('storage/' . $mbr->avatar) }}"
                                        class="h-full w-full rounded-xl object-cover" />
                                    <div
                                        class="absolute bottom-0 left-0 w-full rounded-b-xl bg-gradient-to-t from-black/80 via-black/70 to-transparent px-2 py-4 text-white">
                                        <h1 class="lg:text-md text-center text-xs font-bold uppercase md:text-sm">
                                            {{ $mbr->full_name }}</h1>
                                        <h2 class="lg:text-md mt-1 text-center text-xs font-semibold capitalize">
                                            {{ $mbr->npm }}</h2>
                                        <h2 class="lg:text-md mt-2 text-center text-xs font-semibold capitalize">
                                            {{ $mbr->tugas }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

        <div class="mx-auto max-w-6xl px-4 py-6">
            <div class="hero">
                <div class="hero-content flex-col p-5 lg:flex-row-reverse" data-aos="fade-right"
                    style="will-change: transform;" data-aos-easing="ease-in-sine">
                    <img src="{{ asset('images/logo.png/') }}" class="max-w-xs rounded-lg shadow-2xl md:max-w-md" />
                    <div class="">
                        <h1 class="py-6 text-center text-3xl font-bold lg:text-start">Tentang Thariqa</h1>
                        <p class="py-3 text-justify">
                            Thariqa adalah aplikasi pembelajaran agama Islam yang dirancang sebagai sarana edukatif
                            modern untuk memperdalam pemahaman terhadap ajaran Islam secara bertahap dan terstruktur.
                        </p>
                        <p class="py-3 text-justify">
                            Kata Thariqa berasal dari bahasa Arab yang berarti "jalan" atau "metode". Nama ini
                            merepresentasikan tujuan utama aplikasi ini menjadi jalan yang memudahkan siapa saja untuk
                            belajar dan mengenal Islam lebih dekat, dengan pendekatan yang sederhana namun tetap bermakna.
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-6xl px-4 py-6">
            <div class="hero">
                <div class="hero-content flex-col p-5 lg:flex-row" {{-- <div class="hero-content p-5 flex-col lg:flex-row rounded-xl shadow-2xl
                bg-gradient-to-br from-green-100 via-slate-50 to-green-50"  --}} data-aos="fade-left"
                    style="will-change: transform;" data-aos-easing="ease-in-sine">
                    <img src="{{ asset('images/logo.png/') }}" class="max-w-xs rounded-lg shadow-2xl md:max-w-md" />
                    <div class="">
                        <h1 class="py-6 text-center text-3xl font-bold lg:text-end">Tujuan Thariqa</h1>
                        <p class="py-3 text-justify">
                            Aplikasi ini dikembangkan oleh Kelompok 3, Program Studi Informatika, sebagai bagian dari proyek
                            mata kuliah Pendidikan Agama. Dengan semangat integrasi antara ilmu pengetahuan dan nilai-nilai
                            keislaman, kami menghadirkan materi-materi pembelajaran yang dirancang ringkas, jelas, dan mudah
                            dipahami oleh berbagai kalangan.
                        </p>
                        <p class="py-3 text-justify">
                            Melalui Thariqa, kami berharap setiap pengguna dapat menapaki jalan pembelajaran agama dengan
                            lebih nyaman, mendalam, dan penuh keikhlasan. Semoga aplikasi ini menjadi langkah kecil yang
                            membawa manfaat besar.
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
