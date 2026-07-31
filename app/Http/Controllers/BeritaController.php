<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Berita::when($search, function ($query) use ($search) {

            $query->where('judul', 'like', "%$search%");
        })
            ->latest()
            ->get();

        return view(
            'pages.informasi.berita.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.informasi.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'ringkasan' => 'required',

            'isi' => 'required',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $gambar = null;

        if ($request->hasFile('gambar')) {

            $gambar = time() . '.' .
                $request->gambar->extension();

            $request->gambar->move(
                public_path('uploads/berita'),
                $gambar
            );
        }

        Berita::create([

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'ringkasan' => $request->ringkasan,

            'isi' => $request->isi,

            'gambar' => $gambar

        ]);

        return redirect()
            ->route('berita.index')
            ->with(
                'success',
                'Berita berhasil ditambahkan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {
        return view(
            'pages.informasi.berita.edit',
            compact('berita')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $request->validate([

            'judul' => 'required',

            'ringkasan' => 'required',

            'isi' => 'required',

            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $gambar = $berita->gambar;

        if ($request->hasFile('gambar')) {

            if ($gambar && File::exists(public_path('uploads/berita/' . $gambar))) {

                File::delete(public_path('uploads/berita/' . $gambar));
            }

            $gambar = time() . '.' .
                $request->gambar->extension();

            $request->gambar->move(
                public_path('uploads/berita'),
                $gambar
            );
        }

        $berita->update([

            'judul' => $request->judul,

            'slug' => Str::slug($request->judul),

            'ringkasan' => $request->ringkasan,

            'isi' => $request->isi,

            'gambar' => $gambar

        ]);

        return redirect()
            ->route('berita.index')
            ->with(
                'success',
                'Berita berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        if (
            $berita->gambar &&
            File::exists(public_path('uploads/berita/' . $berita->gambar))
        ) {

            File::delete(
                public_path('uploads/berita/' . $berita->gambar)
            );
        }

        $berita->delete();

        return redirect()
            ->route('berita.index')
            ->with(
                'success',
                'Berita berhasil dihapus.'
            );
    }
}
