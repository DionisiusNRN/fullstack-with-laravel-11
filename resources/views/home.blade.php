{{-- app adalah master layoutnya --}}
@extends('app')

{{-- section harus sesuai nama yield yang ingin dituju (lokasinya) --}}
@section('content')
    <div class="border-t border-b border-gray-200 text-white">
        <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-center">Welcome to Laravel 11</h1>
            <p class="text-xl text-center mt-6">This is a simple example of Laravel 11.</p>
        </div>
    </div>
@endsection
