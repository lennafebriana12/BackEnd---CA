<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestimoniResource;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimoni = Testimoni::all();

        // Berguna jika sedang testing api dengan postman maka ini yang berjalan dan tampil di postman
        return TestimoniResource::collection($testimoni); // Mengembalikan data testimoni dalam bentuk resource API.

        // return view('pages.frontsite.testimoni.index', compact('testimoni'));
    }

    public function store(Request $request)
    {
        $post = Testimoni::create($request->all());

        // Berguna jika sedang testing api dengan postman maka ini yang berjalan dan tampil di postman
        return new TestimoniResource($post); // Mengembalikan data testimoni dalam bentuk resource API.
   // return redirect()->back()->with('success', 'Testimoni berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $request->validate([ // Melakukan validasi terhadap input yang diterima.
            'pekerjaan' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'angkatan' => 'required|string|max:4',
            'judul_utama' => 'required|string|max:255',
            'link_video' => 'required|url',
        ]);

        $testimoni->fill($request->only([ // Mengisi data testimoni dengan input yang sesuai dari request.
            'pekerjaan', // Mengambil input 'pekerjaan' dari request dst
            'program_studi',
            'angkatan',
            'judul_utama',
            'link_video'
        ]));

        $testimoni->save(); // Menyimpan perubahan ke database

        // Berguna jika sedang testing api dengan postman maka ini yang berjalan dan tampil di postman
        return new TestimoniResource($testimoni); // Mengembalikan data testimoni dalam bentuk resource API.
        
    }

    public function delete($id)
    {
        $testimoni = Testimoni::findOrFail($id);
        $testimoni -> delete();

        // Berguna jika sedang testing api dengan postman maka ini yang berjalan dan tampil di postman
        return new TestimoniResource($testimoni); // Mengembalikan data testimoni dalam bentuk resource API.

    }

    public function testimoniById($id)
    {
        // Cek jika data testimoni dengan id tersebut ada
        $testimoni = Testimoni::find($id);

        // Jika data tidak ditemukan
        if (!$testimoni) {
            return response()->json(['error' => 'Testimoni not found'], 404);
        }

        return response()->json($testimoni);
    }

}