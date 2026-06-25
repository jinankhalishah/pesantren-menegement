<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->search;

        $data = Prestasi::when(
            $search,
            function ($query) use ($search) {

                $query->where(
                    'judul',
                    'like',
                    "%$search%"
                );
            }
        )->latest()->get();

        return view(
            'pages.informasi.prestasi.index',
            compact('data')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pages.informasi.prestasi.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'judul' => 'required',

            'tingkat' => 'required',

            'tahun' => 'required'

        ]);

        Prestasi::create($request->all());

        return redirect()
            ->route('prestasi.index')
            ->with(
                'success',
                'Prestasi berhasil ditambahkan'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestasi $prestasi)
    {
        return view(
            'pages.informasi.prestasi.edit',
            compact('prestasi')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestasi $prestasi)
    {
        $prestasi->update(
            $request->all()
        );

        return redirect()
            ->route('prestasi.index')
            ->with(
                'success',
                'Prestasi berhasil diperbarui'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasi)
    {
        return redirect()
            ->route('prestasi.index')
            ->with(
                'success',
                'Prestasi berhasil dihapus'
            );
    }
}
