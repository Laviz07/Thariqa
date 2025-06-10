@extends('layouts.app')

@section('title', 'Thariqa')

@section('content')
    <div class="w-full overflow-x-hidden pb-20 lg:pb-0">

        <div class="mx-auto max-w-6xl px-4 pt-6">
            <h1
                class="bg-gradient-to-l from-blue-500 via-teal-500 to-green-500 bg-clip-text text-xl md:text-2xl lg:text-3xl font-bold text-transparent">
                THARIQA - Belajar, Memahami, Mengamalkan</h1>
        </div>

        {{-- /* --------------------------------- BANNER --------------------------------- */ --}}
        <div class="mx-auto max-w-6xl px-4 py-6">
            @include('includes.banner')
        </div>

        {{-- /* -------------------------------- TEAM KAMI ------------------------------- */ --}}
        <div class="mx-auto max-w-6xl px-4 py-6">
            <div class="flex items-center justify-between text-start">
                <h1 class="mb-1 inline-block text-2xl font-bold">Team Kami</h1>

                <a href="{{ route('about') }}" class="flex items-center space-x-3">
                    <span class="hidden items-center md:flex">Lihat selengkapnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-chevron-double-right size-6" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                        <path fill-rule="evenodd"
                            d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </a>
            </div>

            <div class="group relative mt-10">
                <!-- Wrapper scroll -->
                <div class="mx-auto flex items-center justify-center md:px-6">
                    <div id="scroll-member"
                        class="no-scrollbar flex w-full snap-x snap-mandatory space-x-5 overflow-x-auto scroll-smooth px-6 md:space-x-3">
                        @foreach ($member as $mbr)
                            <div class="flex w-1/3 shrink-0 snap-start justify-center sm:w-1/4 md:w-1/5">
                                <div class="flex flex-col items-center">
                                    <div class="aspect-square w-24 overflow-hidden rounded-full shadow lg:w-32">
                                        <img src="{{ asset('storage/' . $mbr->avatar) }}" loading="lazy"
                                            class="h-full w-full rounded-full object-cover opacity-0 transition-opacity duration-500"
                                            onload="this.classList.add('opacity-100')" />
                                    </div>
                                    <h1 class="mt-2 text-center text-sm font-semibold capitalize lg:text-lg">
                                        {{ $mbr->name }}
                                    </h1>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- /* ----------------------------- MATERI TERBARU ----------------------------- */ --}}
        <div class="mx-auto max-w-6xl overflow-x-hidden px-4 py-6">
            <div class="flex items-center justify-between text-start">
                <h1 class="mb-1 inline-block text-2xl font-bold">Materi Terbaru</h1>

                <a href="{{ route('materi') }}" class="flex items-center space-x-3">
                    <span class="hidden items-center md:flex">Lihat selengkapnya</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        class="bi bi-chevron-double-right size-6" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                        <path fill-rule="evenodd"
                            d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </a>
            </div>

            <div class="w-full overflow-x-hidden">
                <div class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
                    @foreach ($materi as $mtr)
                        {{-- @livewire('materi-card', ['materi' => $mtr], key($mtr->id)) --}}
                        @include('includes.materi-card', ['materi' => $mtr])
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
