<div class="bg-base-100 max-w-sm overflow-hidden overflow-x-hidden rounded-xl shadow-md">
    <div data-aos="fade-up" data-aos-anchor-placement="top-bottom" style="will-change: transform;">
        <a href="{{ route('materi.detail', $materi->slug) }}">
            <img src="{{ asset('storage/' . $materi->img) }}" alt="cover" loading="lazy"
                class="h-48 w-full max-w-full rounded-t-xl object-cover opacity-0 transition-opacity duration-500"
                onload="this.classList.add('opacity-100')">

            <div class="p-4">
                <h2 class="mb-2 text-lg font-semibold capitalize leading-snug">{{ $materi->judul }}</h2>

                <div class="flex items-center space-x-1 text-sm text-gray-500">
                {{-- text-gray-600 dark:text-gray-400" --}}
                
                    <div class="flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-calendar size-4"
                            viewBox="0 0 16 16">
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>

                        @php
                            $created = $materi->created_at;
                        @endphp

                        <span>
                            @if ($created->diffInDays(now()) < 7)
                                {{ $created->diffForHumans() }}
                            @else
                                {{ $created->format('d F Y') }}
                            @endif
                        </span>
                    </div>

                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-dot size-6 items-center"
                        viewBox="0 0 16 16">
                        <path d="M8 9.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                    </svg>

                    <div class="flex items-center space-x-1 truncate">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill size-4"
                            viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                        <span class="max-w-[150px] truncate">{{ $materi->user->full_name }}</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
