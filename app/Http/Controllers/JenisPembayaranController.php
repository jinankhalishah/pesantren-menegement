<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;

use Illuminate\Http\Request;

class JenisPembayaranController extends Controller
{
    public function index()
    {
        $data = JenisPembayaran::latest()->get();

        return view(
            'pages.keuangan.jenispembayaran.index',
            compact('data')
        );
    }

    public function create()
    {
        return view(
            'pages.keuangan.jenispembayaran.create'
        );
    }

    public function edit(JenisPembayaran $jenispembayaran)
    {
        return view(
            'pages.keuangan.jenispembayaran.edit',
            compact('jenispembayaran')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'nama_pembayaran' => 'required|string|max:255',
            'nominal'         => 'required|numeric|min:0',
            'kategori'        => 'required'

        ]);

        JenisPembayaran::create([

            'nama_pembayaran' => $request->nama_pembayaran,
            'nominal'         => $request->nominal,
            'kategori'        => $request->kategori,
            'status'          => true

        ]);

        return redirect()
            ->route('jenis-pembayaran.index')
            ->with(
                'success',
                'Jenis pembayaran berhasil ditambahkan.'
            );
    }

    public function update(
        Request $request,
        JenisPembayaran $jenispembayaran
    ) {
        $request->validate([

            'nama_pembayaran' => 'required|string|max:255',
            'nominal'         => 'required|numeric|min:0',
            'kategori'        => 'required'

        ]);

        $jenispembayaran->update([

            'nama_pembayaran' => $request->nama_pembayaran,
            'nominal'         => $request->nominal,
            'kategori'        => $request->kategori

        ]);

        return redirect()
            ->route('jenis-pembayaran.index')
            ->with(
                'success',
                'Jenis pembayaran berhasil diperbarui.'
            );
    }

    public function destroy(
        JenisPembayaran $jenispembayaran
    ) {
        $jenispembayaran->delete();

        return redirect()
            ->route('jenis-pembayaran.index')
            ->with(
                'success',
                'Jenis pembayaran berhasil dihapus.'
            );
    }
}
