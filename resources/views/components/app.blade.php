{{-- app itu hanya sebagai template aja --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MovieApp</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-900 text-white">
    {{-- menampilkan content dari file header --}}
   <x-partials.header></x-partials.header>

    <div class="min-h-screen flex">
        <asside class="w-64 bg-gray-800 p-6 text-white">
            {{ $sidebar }}
        </asside>

        <main class="flex-1 p-6 bg-gray-900">
            {{ $main }}
        </main>
    </div>
</body>
</html>
