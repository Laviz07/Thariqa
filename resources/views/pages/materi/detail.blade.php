@extends('layouts.app')

@section('title', 'Daftar Materi')

@section('content')
    <div class="w-full overflow-x-hidden pb-20 lg:pb-0">

        <div class="relative mx-auto max-w-6xl px-4 py-6">
            <div class="relative max-w-full overflow-hidden rounded-xl md:h-80">
                {{-- Background Blur --}}
                <div class="absolute inset-0 z-0 hidden md:block">
                    <img src="{{ asset('storage/' . $materi->img) }}" alt="Background blur"
                        class="h-full w-full scale-110 object-cover blur-md brightness-75">
                </div>

                {{-- Gambar Utama --}}
                <div class="relative z-10 flex h-full w-full items-center justify-center">
                    <img src="{{ asset('storage/' . $materi->img) }}" alt="{{ $materi->judul }}"
                        class="max-h-full max-w-full rounded-xl md:rounded-none object-contain">
                </div>
            </div>

            <div>
                <h1 class="mt-4 text-2xl capitalize font-bold md:text-3xl">{{ $materi->judul }}</h1>
                {{-- <p class="mt-2 text-sm text-gray-500">Dibuat pada {{ $materi->created_at->format('d F Y')  }}</p> --}}
                <div class="flex justify-between py-4">
                    <div class="flex w-1/2 items-center space-x-3">
                        <img src="{{ asset('storage/' . $materi->user->avatar) }}" alt="{{ $materi->user->name }}"
                            class="h-12 w-12 rounded-full object-cover">
                        <p class="mt-2 text-sm">{{ $materi->user->full_name }}</p>
                    </div>

                    <div class="flex w-1/2 items-center justify-end space-x-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar size-6"
                            viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                        <p class="text-sm">{{ $materi->created_at->format('d F Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-6xl">
            @foreach ($materi->materi_contents as $mtr)
                <div class="bg-base-100 collapse-arrow collapse">
                    <input type="checkbox" {{ $loop->first ? 'checked' : '' }} />
                    <div class="collapse-title text-xl font-semibold capitalize">{{ $mtr->subjudul }}</div>
                    <div class="collapse-content prose drop-cap max-w-none text-justify text-sm leading-relaxed">
                        {!! $mtr->isi !!}
                    </div>
                </div>
            @endforeach

            {{-- <div class="prose max-w-none"> --}}
            {{-- {!! $materi->isi !!} --}}
            {{-- </div> --}}
        </div>
    </div>
@endsection
