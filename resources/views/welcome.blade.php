{{-- <x-namaFile></x-namaFile> --}}
{{-- tetap menggunakan template dari file app --}}
<x-app>
    <x-slot name="sidebar">
        {{-- lebih baik dideklarasikan di router --}}
        {{-- :menus adalah sebagai props yang akan dikirimkan ke sidebar agar key di dalamnya bisa digunakan. : sebagai tanda suatu variabel adalah props --}}
        <x-partials.sidebar :menus="[
            ['title' => 'Dashboard', 'link' => '/dashboard'],
            ['title' => 'Profile', 'link' => '/profile'],
            ['title' => 'Settings', 'link' => '/settings'],
        ]"></x-partials.sidebar>
    </x-slot>

    <x-slot name="main">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
            @foreach ($movies as $movie)
                <x-movie.card
                {{-- : adalah variabel yg ada di component viewnya (card.blade.php), --}}
                {{--  dan setiap props ini harus didefinisikan di constructornya suapay card.blade.php bisa mendapatkan valuenya --}}
                    :index="$loop->index"
                    :title="$movie['title']"
                    :image="$movie['image']"
                    :releasedate="$movie['release_date']"></x-movie.card>
            @endforeach
        </div>
    </x-slot>
</x-app>
