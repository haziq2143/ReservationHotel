<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @isset($title)
        <title>{{ $title }}</title>
    @else
        <title>Hotel</title>
    @endisset

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="font-sans antialiased">

    <x-navbar.nav-layout />
    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>

    <script>
        document.getElementById('payment_proof').addEventListener('change', function(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();

                // Saat file selesai dibaca
                reader.onload = function(e) {
                    imagePreview.src = e.target.result; // Tampilkan gambar
                    imagePreview.classList.remove('hidden'); // Tampilkan elemen gambar
                }

                reader.readAsDataURL(file); // Membaca file sebagai Data URL (Base64)
            }
        });
    </script>



</html>
