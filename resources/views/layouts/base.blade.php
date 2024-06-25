<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @hasSection('title')
        <title>@yield('title') - {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        .fi-btn {
            background-color: #09090b;
            color: #fff;
        }

        .fi-btn:hover {
            background-color: #fefefe;
            color: #09090b;
        }
    </style>
</head>

<body class="overflow-hidden font-sans ">
    <div x-data="{
        bannerVisible: false,
        bannerVisibleAfter: 300,
    }" x-show="bannerVisible" x-transition:enter="transition ease-out duration-500"
        x-transition:enter-start="-translate-y-10" x-transition:enter-end="translate-y-0"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-y-0"
        x-transition:leave-end="-translate-y-10" x-init="setTimeout(() => { bannerVisible = true }, bannerVisibleAfter);"
        class="fixed top-0 left-0 w-full h-auto py-2 duration-300 ease-out bg-white shadow-sm sm:py-0 sm:h-10" x-cloak>
        <div class="flex items-center justify-between w-full h-full px-3 mx-auto max-w-7xl ">
            <a
                class="flex flex-col w-full h-full text-xs leading-6 text-black duration-150 ease-out sm:flex-row sm:items-center opacity-80 hover:opacity-100">
                <span class="flex items-center">

                    <strong class="font-semibold">Selamat Datang 🔥</strong><span
                        class="hidden w-px h-4 mx-3 rounded-full sm:block bg-neutral-200"></span>
                </span>
                <p class="block pt-1 pb-2 leading-none text-center sm:inline sm:pt-0 sm:pb-0">Aktifkan kode kupon
                    untuk mendapatkan discount 78%
                </p>
            </a>
            <button @click="bannerVisible=false; setTimeout(()=>{ bannerVisible = true }, 1000);"
                class="flex items-center flex-shrink-0 translate-x-1 ease-out duration-150 justify-center w-6 h-6 p-1.5 text-black rounded-full hover:bg-neutral-100">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-full h-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @yield('body')

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/667a477a9d7f358570d3092c/1i16qeehg';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
</body>

</html>
