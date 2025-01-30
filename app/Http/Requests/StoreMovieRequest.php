<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // error required in juga harus didefinisi di create.blade.php untuk UI yang lebih baik
            'title'=> 'required',
            'description'=> 'required|min:5',
            'release_date'=> 'required',
            'cast'=> 'required',
            'genres'=> 'required',
            'image'=> 'required',
        ];
    }

    public function messages(): array { // menampilkan rules message sesuai kemauan
        return [
            'title.required'=> 'Judulnya harus diisi',
            'description.required'=> 'Sinopsis gabole kosong',
            'description.min'=> 'deskripsi minimal 5 kata',
            'release_date.required' => 'tahunnya harus diisi',
            'cast.required' => 'castnya gabole kosong',
            'genres.required' => 'genrenya apa?',
            'image.required' => 'gaada gambarnya?',
        ] ;
    }
}
