@extends('layouts.app')

@section('title', 'Daftar Materi')

@section('content')

    <div class="w-full overflow-x-hidden pb-20 lg:pb-0">

        {{-- /* ------------------------------- SEARCH BAR ------------------------------- */ --}}
        <div class="mx-auto flex max-w-6xl justify-center px-4 py-6">
            <label class="input w-full rounded-full border border-gray-300">
                <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2.5" fill="none" stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </g>
                </svg>
                <input type="search" id="searchInput" name="search" required placeholder="Cari judul materi..."
                    class="" />
            </label>
        </div>

        {{-- /* ------------------------------ MATERI CARDS ------------------------------ */ --}}
        <div class="mx-auto max-w-6xl px-4" id="materiGrid">
            @include('includes.materials', ['materi' => $materi])
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const materiGrid = document.getElementById('materiGrid');

        let debounceTimeout;

        searchInput.addEventListener('input', function() {
            clearTimeout(debounceTimeout);

            debounceTimeout = setTimeout(() => {
                const query = this.value.trim();

                fetch(`{{ route('materi.search') }}?query=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        materiGrid.innerHTML = data.html;
                    })
                    .catch(error => {
                        console.error("Gagal mengambil data:", error);
                    });
            }, 300); // delay 300 ms setelah berhenti ketik
        });
    </script>

@endsection
