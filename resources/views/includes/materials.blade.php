@if ($materi->isEmpty())
    <div class="col-span-full py-12 text-center text-gray-500">
        Materi tidak ditemukan.
    </div>
@else
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 md:grid-cols-3">
        @foreach ($materi as $mtr)
            {{-- @livewire('materi-card', ['materi' => $mtr], key($mtr->id)) --}}
            @include('includes.materi-card', ['materi' => $mtr])
        @endforeach
    </div>
@endif
