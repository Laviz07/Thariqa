<!DOCTYPE html>
<html lang="en" data-theme="{{ session('theme', 'light') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css"> --}}

    {{-- <link rel="stylesheet" href="{{ mix('css/style.css') }}" type="text/css"> --}}
    @vite([
        'resources/css/app.css',
        // 'resources/css/filament/admin/theme.css',
        'resources/js/app.js',
    ])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('title') </title>
    {{-- @livewireScripts --}}

    @livewireStyles
</head>

<body>
    <div class="w-full">
        @include('includes.topNavbar')

        @yield('content')

        @livewireScripts

        @include('includes.bottomNavbar')

        @include('partials.alert')

        @include('includes.footer')
    </div>

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme');
            const checkbox = document.querySelector('.theme-controller');

            if (savedTheme === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
                if (checkbox) checkbox.checked = true; // 👈 Set checkbox ON
            } else {
                document.documentElement.setAttribute('data-theme', 'light');
                if (checkbox) checkbox.checked = false; // 👈 Set checkbox OFF
            }

            if (checkbox) {
                checkbox.addEventListener('change', () => {
                    const newTheme = checkbox.checked ? 'dark' : 'light';
                    document.documentElement.setAttribute('data-theme', newTheme);
                    localStorage.setItem('theme', newTheme);
                });
            }
        });

        document.addEventListener('alpine:init', () => {
            window.addEventListener('password-changed-logout', () => {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = '{{ route('logout') }}';

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_token';
                input.value = token;

                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            });
        });

        // Cek apakah di-redirect ke ?force=1, jika ya reload ulang agar state logout benar-benar ter-update
        if (window.location.search.includes('force=1')) {
            window.location.href = window.location.origin + window.location.pathname;
        }
    </script>

</body>

</html>
