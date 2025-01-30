<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $movies = [
        [
            'title' => 'Oppenheimer',
            'description' => 'A historical drama following the life of J. Robert Oppenheimer, the physicist who helped develop the atomic bomb during World War II.',
            'release_date' => '2023-07-21',
            'cast' => ['Cillian Murphy', 'Emily Blunt', 'Matt Damon', 'Robert Downey Jr.', 'Florence Pugh'],
            'genres' => ['Drama', 'History', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/8Gxv8gSFCU0XGDykEGv7zR1n2ua.jpg',
        ],
        [
            'title' => 'Barbie',
            'description' => 'Barbie suffers a crisis that leads her to question her world and her existence, taking her on a journey to the real world.',
            'release_date' => '2023-07-21',
            'cast' => ['Margot Robbie', 'Ryan Gosling', 'Simu Liu', 'America Ferrera', 'Kate McKinnon'],
            'genres' => ['Comedy', 'Fantasy'],
            'image' => 'https://image.tmdb.org/t/p/w500/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg',
        ],
        [
            'title' => 'Mission: Impossible - Dead Reckoning Part One',
            'description' => 'Ethan Hunt and his IMF team must track down a terrifying new weapon that threatens all of humanity if it falls into the wrong hands.',
            'release_date' => '2023-07-12',
            'cast' => ['Tom Cruise', 'Hayley Atwell', 'Ving Rhames', 'Simon Pegg', 'Rebecca Ferguson'],
            'genres' => ['Action', 'Adventure', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/NNxYkU70HPurnNCSiCjYAmacwm.jpg',
        ],
        [
            'title' => 'Spider-Man: Across the Spider-Verse',
            'description' => 'Miles Morales catapults across the Multiverse, where he encounters a team of Spider-People charged with protecting its existence.',
            'release_date' => '2023-06-02',
            'cast' => ['Shameik Moore', 'Hailee Steinfeld', 'Oscar Isaac', 'Jake Johnson', 'Issa Rae'],
            'genres' => ['Animation', 'Action', 'Adventure'],
            'image' => 'https://image.tmdb.org/t/p/w500/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg',
        ],
        [
            'title' => 'John Wick: Chapter 4',
            'description' => 'With the price on his head ever increasing, John Wick uncovers a path to defeating The High Table.',
            'release_date' => '2023-03-24',
            'cast' => ['Keanu Reeves', 'Donnie Yen', 'Bill Skarsgård', 'Laurence Fishburne', 'Ian McShane'],
            'genres' => ['Action', 'Crime', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/vZloFAK7NmvMGKE7VkF5UHaz0I.jpg',
        ],
        [
            'title' => 'Guardians of the Galaxy Vol. 3',
            'description' => 'The Guardians embark on a mission to protect one of their own and face new challenges as they unravel the mysteries of the universe.',
            'release_date' => '2023-05-05',
            'cast' => ['Chris Pratt', 'Zoe Saldana', 'Dave Bautista', 'Bradley Cooper', 'Karen Gillan'],
            'genres' => ['Action', 'Adventure', 'Comedy'],
            'image' => 'https://image.tmdb.org/t/p/w500/r2J02Z2OpNTctfOSN1Ydgii51I3.jpg',
        ],
        [
            'title' => 'The Flash',
            'description' => 'Barry Allen uses his super speed to change the past, but his attempt to save his family creates a world without superheroes.',
            'release_date' => '2023-06-16',
            'cast' => ['Ezra Miller', 'Michael Keaton', 'Sasha Calle', 'Ben Affleck', 'Ron Livingston'],
            'genres' => ['Action', 'Adventure', 'Fantasy'],
            'image' => 'https://image.tmdb.org/t/p/w500/3GrRgt6CiLIUXUtoktcv1g2iwT5.jpg',
        ],
        [
            'title' => 'Fast X',
            'description' => 'Dom Toretto and his family are targeted by the vengeful son of drug kingpin Hernan Reyes, Dante, who seeks to destroy everything Dom loves.',
            'release_date' => '2023-05-19',
            'cast' => ['Vin Diesel', 'Michelle Rodriguez', 'Jason Momoa', 'Tyrese Gibson', 'Ludacris'],
            'genres' => ['Action', 'Crime', 'Thriller'],
            'image' => 'https://image.tmdb.org/t/p/w500/1E5baAaEse26fej7uHcjOgEE2t2.jpg',
        ],
        [
            'title' => 'Indiana Jones and the Dial of Destiny',
            'description' => 'Archaeologist Indiana Jones races against time to retrieve a legendary artifact that can change the course of history.',
            'release_date' => '2023-06-30',
            'cast' => ['Harrison Ford', 'Phoebe Waller-Bridge', 'Mads Mikkelsen', 'Boyd Holbrook', 'Antonio Banderas'],
            'genres' => ['Adventure', 'Action'],
            'image' => 'https://image.tmdb.org/t/p/w500/Af4bXE63pVsb2FtbW8uYIyPBadD.jpg',
        ],
        [
            'title' => 'Transformers: Rise of the Beasts',
            'description' => 'During the 1990s, the Autobots encounter a new faction of Transformers known as the Maximals, who join them as allies in the battle for Earth.',
            'release_date' => '2023-06-09',
            'cast' => ['Anthony Ramos', 'Dominique Fishback', 'Peter Cullen', 'Ron Perlman', 'Peter Dinklage'],
            'genres' => ['Action', 'Science Fiction', 'Adventure'],
            'image' => 'https://image.tmdb.org/t/p/w500/gPbM0MK8CP8A174rmUwGsADNYKD.jpg',
        ]
    ];
    return view('welcome', ['movies' => $movies]);
});

Route::get('/homee', function () {
    return view('home'); // compact: memparsing data dari router ke view
});

// Kalau pakai Thunder Client - Body - Form
// HTML hanya kenal GET dan POST, tapi supaya laravel bisa kenal dengan PUT, PATCH dan lainnya kita perlu input field _method dan isi value dgn method yang ingin digunakan
// Nonaktifkan bagian header Content-Type dan value application/json


// Kalau pakai Thunder Client - Body - JSON
// methodnya diganti sesuai yang kita pingin (yg disebelah url)
// Aktifkan bagian header Content-Type dan value application/json


// di Thunder Client kita tetap pakai POST tapi dibagian field name kita kasih _method dan valuenya PUT
// jika kita mau mengubah data yang secara spesifik bisa ditambahkan parameter seperti id


$movies = [];


Route::group(
    [
        'prefix' => 'movie',
        'as' => 'movie.'
    ], function () use ($movies) {

        // mengambil data dari MovieController [classNameController, methodNameThatReturnTheValueFromController]
        Route::get('/', [MovieController::class, 'index'])->name('index'); // route('movie.index')
        Route::get('/create', [MovieController::class,'create'])->name('create'); // ditaruh di atas show supaya /create tidak dianggap sebgai id
        Route::get('/{id}', [MovieController::class, 'show'])->name('show');
        Route::post('/', [MovieController::class,'store'])->name('store');
        Route::get('/{id}/edit', [MovieController::class, 'edit'])->name('edit');
        Route::put('/{id}', [MovieController::class,'update'])->name('update');
         // di Thunder Client kita tetap pakai POST tapi dibagian field name kita kasih _method dan valuenya PATCH atau DELETE
        // Route::patch('/{id}', [MovieController::class,'update']);
        Route::delete('/{id}', [MovieController::class,'destroy'])->name('destroy');

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


// Batas Start Request
Route::post('/request', function(Request $request) {
    // // kondisi AND
    // if($request->has(['email', 'password'])) { // mengecek data
    //     return 'login berhasil';
    // };

    // // kondisi OR
    // if($request->hasAny(['email', 'password'])) { // mengecek data
    //     return 'login berhasil';
    // };


    $request->merge(['email' => 'a@b.com']); // merge: menambahkan objek data
    if($request->missing('email')) { // mengecek kondisi apakah emailnya tidak ada?
        return 'Emailnya tidak ada';
    } else { // meskipun di dalam form tidak ada dta email, tapi karena menggunakan merge maka datanya jadi ada
        return 'Datanya ada';
    }

    // return 'Gagal';
});

/*
// DIBAWAH INI DIGUNAKAN UNTUK MENGELOLA DATA
Route::post('/request', function(Request $request) {
    // method khusus untuk mengelola tanggal dan waktu
    $data = $request->date('schedule', 'Y-m-d', 'Asia/Jakarta'); // bisa ditmbah ->addDays(2)->addMinutes(30)->addHours(2)
    return $data->diffForHumans(); // diffForHumans() agar lebih mudah dibaca manusia (manusiawi)

    // // input digunakan hanya untuk body form
    // // method input hanya bisa digunakan pada saat menggunakan method post
    // $input = $request->input('colors.*'); // input('key.index') atau input('key.*') untuk memilih semua
    // return $input;

    // // query digunakan untuk mendapatkan data querynya saja tapi penggunaannya sama seperti input
    // $query = $request->query(); // hanya bisa digunakan di Query Parameters saja
    // return $query;
});


// DIBAWAH INI HANYA CATATAN KEGUNAAN REQUEST COLLECTION
// // objek request memiliki banyak informasi request data seperti user, headers, cookies, file upload, dll


// // dd($request); dd : dump and die
Route::get('/request', function(Request $request) {
    // MEWNGOLAH data array dari request itu menggunakan collect, bukan all

    // hanya mengambil data yang diinginkan saja
    $filtered = $request->collect()->only(['name', 'age']);


    // // has: untuk mengecek apakah suatu data ada atau tidak
    // $filtered = $request->collect()->has('status');


    // // semua string akan di uppercase
    // $filtered = $request->collect()->map(function($value) {
    //     return strtoupper($value);
    // });


    // // collection data yang di request akan difilter satu persatu menggunakan anonymus function
    // $filtered = $request->collect()->filter(function($value, $key) {
    //     return is_numeric($value); // pengkondisian: jika $value bertipe angka maka akan dikembalikan ke $filtered
    // });

    return $filtered;
});
*/
// Batas End Request


Route::get('/response', function() {
    return response('OK')->header('Content-Type','text/plain');
});

Route::get('/cache-control', function() {
    return Response::make('page allow to cache', 200)
        ->header('Cache-Control','public, max-age=86400'); // mengirimkan data cookie ke header
});

Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // saat berada di level Response, harus berhati-hati ketika menggunakan data di dalam cookie
    Route::get('/dashboard', function() {
        $user = 'admin';
        return response('login successfully', 200)->cookie('user', $user); // mengirimkan data cookie ke client
    });

    Route::get('/logout', function() {
        // return response('logout successfully', 200)->withoutCookie('user'); // menghapus data cookie

        // // pada saat redirect beserta mengirimkan data query
        // return redirect()->route('home', ['sourceUrl' => 'logout'])->withoutCookie('user'); // ketika logout akan di redirect ke halaman home tapi tetap bisa menghapus cookie

        return redirect()->action([HomeController::class, 'index'], ['authenticated'=> 'false']);
    });

    Route::get('/privacy', function () {
        return 'Privacy page';
    });

    Route::get('/terms', function () {
        return 'Terms page';
    });
});

Route::get('/external', function () {
    // return redirect()->away('https://laravel.com'); // away: untuk redirect ke halaman luar atau diluar dari halaman project kita
    // return redirect('https://laravel.com'); // ke halaman external langsung seperti ini juga bisa
    return redirect('/'); // bisa langsung ke halaman internal seperti ini juga bisa
});

Route::get('/session', function (Request $request) {
    // session(['days' => ['Friday','Saturday', 'Sunday']]); // menyimpan data dengan menggunakan array ['key', 'value']
    // session()->push('days', 'Monday'); // menambahkan nilai baru di dalam array session 'days'
    // session()->put('days', array_diff(session('days'), ['Monday'])); // menghapus data tapi dgn cara me-replace data lama dgn data baru
    // session()->put('is_membership', true);
    // session()->forget('days'); // menghapus semua data berdasarkan keynya
    session()->forget('is_membership'); // menghapus semua data berdasarkan keynya
    return $request->session()->all();

    // // cara 2 (boolean)
    // $request->session()->put('is_membership', 'yes'); // menyimpan data dengan menggunakan method put ['key', 'value']
    // $request->session()->get('is_membership'); // session(): untuk mengambil atau mendapatkan nilainya dengan menthod get beserta key nya

    // // cara 1 (boolean)
    // session(['is_membership' => 'yes']); // menyimpan data dengan menggunakan parameter array ['key', 'value']
    // session('is_membership'); // session(): untuk mengambil atau mendapatkan nilainya dan panggil menggunakan key nya
});
