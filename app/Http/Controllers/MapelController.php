<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $mapels = Mapel::when($search, function ($query) use ($search) {

            $query->where('kode', 'like', '%' . $search . '%')
                ->orWhere('nama_mapel', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('pages.datamapel', compact('mapels', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tambahmapel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode'       => 'required|unique:mapel,kode',
            'nama_mapel' => 'required',
            'status'     => 'required',
        ]);

        Mapel::create([
            'kode'       => $request->kode,
            'nama_mapel' => $request->nama_mapel,
            'status'     => $request->status,
        ]);

        return redirect()
            ->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        return view('pages.editmapel', compact('mapel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode'       => 'required|unique:mapel,kode,' . $id,
            'nama_mapel' => 'required',
            'status'     => 'required',
        ]);

        $mapel = Mapel::findOrFail($id);

        $mapel->update([
            'kode'       => $request->kode,
            'nama_mapel' => $request->nama_mapel,
            'status'     => $request->status,
        ]);

        return redirect()
            ->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();

        return redirect()
            ->route('mapel.index')
            ->with('success', 'Data mata pelajaran berhasil dihapus');
    }
}
