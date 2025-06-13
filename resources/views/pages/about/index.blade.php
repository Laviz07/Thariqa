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
                            <img src="{{ asset('images/dosen.jpg') }}"
                                class="h-full w-full rounded-lg object-cover object-center" />
                        </div>

                        <!-- Deskripsi -->
                        <div class="lg:w-3/5">
                            <h1 class="text-3xl md:text-4xl font-bold">Khalid Ramdhani S.Pd.I., M.Pd.I</h1>
                            <h1 class="py-3 text-xl font-bold md:text-2xl">Dosen Pendidikan Agama Islam</h1>
                            <p class="py-6">
                                Bapak Dr. Khalid Ramdhani, S.Pd.I., M.Pd.I merupakan salah satu tenaga pendidik di Fakultas
                                Agama Islam, Universitas Singaperbangsa Karawang (UNSIKA), dan juga mengajar pada fakultas
                                ilmu komputer khususnya pada program studi informatika UNSIKA.
                            </p>

                            <div class="flex items-center gap-3">
                                <a href="https://www.instagram.com/khalid.ramdhani/"
                                    class="group flex items-center gap-2 rounded-full border border-[#ee2a7b] px-5 py-2 text-[#ee2a7b] transition duration-300 hover:bg-gradient-to-br hover:from-[#f9ce34] hover:via-[#ee2a7b] hover:to-[#6228d7] hover:text-white"
                                    target="_blank" rel="noopener noreferrer">
                                    Follow
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                                    </svg>
                                </a>

                                <a href="https://wa.me/6285711210364" target="_blank" rel="noopener noreferrer"
                                    class="btn md:text-md flex items-center gap-2 rounded-full border border-[#25d366] text-[#25d366] transition hover:bg-[#25d366] hover:text-white">
                                    Send A Message
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                        <path
                                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                                    </svg>
                                </a>

                            </div>
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
