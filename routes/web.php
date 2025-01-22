<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

$movies = [];

    for ($i = 0; $i < 10; $i++) {
        $movies[] = [
            'title' => 'Movie ' . $i,
            'year' => '2022',
            'genre' => 'Action',
        ];
    }

Route::group(
    [
        'middleware' => ['isAuth'],
        'prefix' => 'movie',
        'as' => 'movie.'
    ], function () use ($movies) {

        Route::get('/', function () use ($movies) {
            return $movies;
        });

        // karena middleware sudah didefinsikan aliasnya, sehingga kita tidak perlu menggunakan use dan tinggal memanggil aliasnya saja
        Route::get('/{id}', function($id) use ($movies) {
            return $movies[$id];
        })->middleware(['isMember']);


        Route::post('/', function() use ($movies) {
            $movies[] = [
                'title' => request('title'), // request('key')
                'year' => request('year'),
                'genre' => request('genre'),
            ];

            return $movies;
        });
        // Kalau pakai Thunder Client - Body - Form
        // HTML hanya kenal GET dan POST, tapi supaya laravel bisa kenal dengan PUT, PATCH dan lainnya kita perlu input field _method dan isi value dgn method yang ingin digunakan
        // Nonaktifkan bagian header Content-Type dan value application/json


        // Kalau pakai Thunder Client - Body - JSON
        // methodnya diganti sesuai yang kita pingin (yg disebelah url)
        // Aktifkan bagian header Content-Type dan value application/json


        // di Thunder Client kita tetap pakai POST tapi dibagian field name kita kasih _method dan valuenya PUT
        // jika kit amau mengubah data yang secara spesifik bisa ditambahkan parameter seperti id

        Route::put('/{id}', function($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');

            return $movies;
        });


        // di Thunder Client kita tetap pakai POST tapi dibagian field name kita kasih _method dan valuenya PATCH
        Route::patch('/{id}', function($id) use ($movies) {
            $movies[$id]['title'] = request('title');
            $movies[$id]['year'] = request('year');
            $movies[$id]['genre'] = request('genre');

            return $movies;
        });


        // di Thunder Client kita tetap pakai POST tapi dibagian field name kita kasih _method dan valuenya DELETE
        Route::delete('/{id}', function($id) use ($movies) {
            unset($movies[$id]);

            return $movies;
        });

        // Kesimpulan:
        // 1. kalau mau ubah data pakai JSON maka tinggal pakai method yang ada di thunder client sesuai method yang kita mau pakai
        // 2. kalau mau pakai Form, kita perlu defisnisikan di field untuk _method dan value methodnya
});




Route::get('/pricing', function() {
    return 'Please, buy a membership!';
});


Route::get('/login', function() {
    return 'Login page';
})->name('login');
