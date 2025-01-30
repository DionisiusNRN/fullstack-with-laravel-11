<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class MovieController extends Controller implements HasMiddleware
{
    private $movies = [];

    public function __construct() {
        $this->movies =
        [
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
    }

    public static function middleware() {
        // return [
        //     'isAuth',
        //     new Middleware('isMember', only: ['show']), // hanya
        //     // new Middleware('isMember', except: ['show']), // kecuali
        // ];
    }

    // setiap method yang ada di Controller akan dideklarasikan di web.php atau di root
    public function index() {
        $movies = $this->movies;
        // bisa juga kedua dan ketiga di gabung
        return view('movies.index', compact('movies'))->with([
            'titlePage'=> 'Movie List' // terus di deklarasi di viewnya
        ]);

        // // memanggil file index di dalam folder movies pada folder views movies.index
        // return view('movies.index', ['movies' => $movies]); // (cara pertama) panggil key nya di file view nya
        // return view('movies.index', compact('movies')); // (cara kedua) panggil key nya di file view nya
        // return view('movies.index')->with('movies', $movies); // (cara ketiga) atau bisa juga isi dari with dijadikan array


        // return response()->json($this->movies); // bisa langsung begini
        // return response()->json([ // jika mau mengirimkan beberapa data sekaligus
        //     'movies' => $this->movies,
        //     'message' => 'List of Movies',
        // ], 200);
    }

    public function show($id) {
        // jika kita memanggil movies tanpa this akan di anggap sebagai variabel movies yang berbeda
        $movie = $this->movies[$id];
        // memanggil file show di dalam folder movies pada folder views
        return view('movies.show', ['movie' => $movie, 'movieId' => $id]); // parsing data
    }

    public function create() {
        return view('movies.create');
    }

    public function store(StoreMovieRequest $request) {
        $newMovie = [
            // ['title'] disesuaikan namanya dgn name di create.blade.php
            'title' => $request['title'],
            'description'=> $request['description'],
            'release_date'=> $request['release_date'],
            'cast'=> explode(',', $request['cast']), // explode: string ke array
            'genres' => explode(',', $request['genres']),
            'image' => $request['image'],
        ];

        $this->movies[] = $newMovie;

        // store() cuma buat nambah data, index() yang refresh terus nampilin seluruh data (termasuk update)
        return $this->index();
    }

    public function edit($id) { // mirip show()
        $movie = $this->movies[$id];
        $movie['cast'] = implode(',', $movie['cast']); // implode: array ke string
        $movie['genres'] = implode(',', $movie['genres']);
        return view('movies.edit', ['movie' => $movie, 'movieId' => $id]); // parsing data
    }

    public function update(Request $request, $id) {
        $this->movies[$id]['title'] = $request['title'];
        $this->movies[$id]['description'] = $request['description'];
        $this->movies[$id]['release_date'] = $request['release_date'];
        $this->movies[$id]['cast'] = explode(',', $request['cast']); // explode: string ke array
        $this->movies[$id]['genres'] = explode(',', $request['genres']);
        $this->movies[$id]['image'] = $request['image'];

        // return $this->movies;

        // setelah update supaya tetap di halaman detail movie (biar gampang ngeliat perubahanya)
        //  kalau langsung ke index, jadinya malah nampilih seluruh film
        return $this->show($id);
    }

    public function destroy($id) {
        unset($this->movies[$id]);
        // supaya langsung keliatan beneran ada yang ke hapus nggak, jadi return ke halaman utama  yaitu index()
        return $this->index();
    }
}
