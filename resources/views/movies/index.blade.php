@extends('app')

@section('content')
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
        @foreach ($movies as $movie)
            <div class="bg-gray-800 p-4 rounded-lg relative group">
                {{-- $loop->index: agar bisa mendapatkan data berdasarkan index --}}
                <a href="{{ route('movie.show', $loop->index) }}">
                    <img src="{{ $movie['image'] }}" alt="{{ $movie['title'] }}" class="w-full rounded-md">
                    <h3 class="text-lg mt-2">{{ $movie['title'] }}</h3>
                    <p class="text-sm text-gray-400">{{ $movie['release_date'] }}</p>

                    <div class="absolute top-2 right-2 space-x-2 opacity-0 group-hover:opacity-100 transition">
                        <a href="{{ route('movie.edit', $loop->index) }}"
                            class="bg-green-600 p-1 rounded hover:bg-green-500">
                            ✏️
                        </a>
                        {{-- di <a> ada getElementById, karena eksekusinya adalah delete, dia nyari element atau form yang id nya delete-form-{{ $loop->index }} baru akan di delete --}}
                        {{-- proses ini gaakan terdelete dengan baik kalau nggak pakai database --}}
                        {{-- karena ini hanya contoh dan nggak pakai database, jadi proses deletenya belum sempurna --}}
                        <form id="delete-form-{{ $loop->index }}" action="{{ route('movie.destroy', $loop->index) }}"
                            method="POST" style="display: none;" >
                            {{-- @csrf: Token keamanan untuk melindungi form dari serangan CSRF (Cross-Site Request Forgery) --}}
                            @csrf
                            {{-- karena form hanya bisa menggunakan method GET dan POST, kita perlu tambahkan di bawah ini agar routernya otomatis menjadi Delete --}}
                            @method('DELETE')
                        </form>
                        <a href="{{ route('movie.destroy', $loop->index) }}" onclick="event.preventDefault(); confirm('Are You Sure?'); document.getElementById('delete-form-{{ $loop->index }}').submit();" class="bg-red-600 p-1 rounded hover:bg-red-500">🗑️</a>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
