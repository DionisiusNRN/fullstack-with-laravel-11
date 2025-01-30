@extends('app')

@section('content')
    <div class="flex flex-col md:flex-row items-start">
        <div class="w-full md:w-1/3">
            <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="rounded-lg shadow-lg">
        </div>
        <div class="md:ml-10 mt-5 md:mt-0 w-full md:w-2/3">
            <h2 class="text-4xl font-bold mb-4">{{ $movie['title'] }}</h2>
            <p class="text-gray-400 text-lg mb-4">
                Release Date: <span class="text-white">{{ $movie['release_date'] }}</span>
            </p>
            <p class="text-lg mb-4">{{ $movie['description'] }}</p>

            <h3 class="text-xl font-semibold mb-2">Cast</h3>
            <p class="text-gray-300 mb-4">
                @foreach ($movie['cast'] as $cast)
                    {{ $cast }},
                @endforeach
            </p>

            <h3 class="text-xl font-semibold mb-2">Genres</h3>
            <p class="text-gray-300 mb-4">
                @foreach ($movie['genres'] as $genre)
                    {{ $genre }},
                @endforeach
            </p>

            <div class="flex space-x-4 mt-5">
                <a href="{{ route('movie.edit', $movieId) }}" class="bg-green-600 p-1 rounded hover:bg-green-500">✏️</a>
                {{-- di <a> ada getElementById, karena eksekusinya adalah delete, dia nyari element atau form yang id nya delete-form-{{ $loop->index }} baru akan di delete --}}
                        {{-- proses ini gaakan terdelete dengan baik kalau nggak pakai database --}}
                        {{-- karena ini hanya contoh dan nggak pakai database, jadi proses deletenya belum sempurna --}}
                        <form id="delete-form-{{ $movieId }}" action="{{ route('movie.destroy', $movieId) }}"
                            method="POST" style="display: none;" >
                            {{-- @csrf: Token keamanan untuk melindungi form dari serangan CSRF (Cross-Site Request Forgery) --}}
                            @csrf
                            {{-- karena form hanya bisa menggunakan method GET dan POST, kita perlu tambahkan di bawah ini agar routernya otomatis menjadi Delete --}}
                            @method('DELETE')
                        </form>
                        <a href="{{ route('movie.destroy', $movieId) }}" onclick="event.preventDefault(); confirm('Are You Sure?'); document.getElementById('delete-form-{{ $movieId }}').submit();" class="bg-red-600 p-1 rounded hover:bg-red-500">🗑️</a>
            </div>
        </div>
    </div>
@endsection
