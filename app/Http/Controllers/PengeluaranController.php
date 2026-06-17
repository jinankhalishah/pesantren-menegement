<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;

use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $search = $request->search;

        $pengeluarans = Pengeluaran::when($search, function ($query) use ($search) {

            $query->where('kategori', 'like', "%{$search}%")
                ->orWhere('keterangan', 'like', "%{$search}%");
        })->latest()->get();

        return view(
            'pages.keuangan.pengeluaran.index',
            compact('pengeluarans', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'pages.keuangan.pengeluaran.create'
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'tanggal' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required|numeric|min:1'

        ]);

        Pengeluaran::create($request->all());

        return redirect()
            ->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        return view(
            'pages.keuangan.pengeluaran.edit',
            compact('pengeluaran')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'tanggal' => 'required',
            'kategori' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required|numeric|min:1'

        ]);

        $pengeluaran = Pengeluaran::findOrFail($id);

        $pengeluaran->update($request->all());

        return redirect()
            ->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengeluaran::findOrFail($id)->delete();

        return redirect()
            ->route('pengeluaran.index')
            ->with('success', 'Data pengeluaran berhasil dihapus');
    }
}
