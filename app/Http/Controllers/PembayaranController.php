<?php

namespace App\Http\Controllers;

use App\Models\JenisPembayaran;
use App\Models\Pembayaran;
use App\Models\Santri;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $search = $request->search;

        $pembayarans = Pembayaran::with([
            'santri.kelas',
            'jenisPembayaran'
        ])
            ->when($search, function ($query) use ($search) {

                $query->whereHas('santri', function ($q) use ($search) {

                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('nis', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view(
            'pages.keuangan.pembayaran.index',
            compact(
                'pembayarans',
                'search'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $santris = Santri::with('kelas')
            ->orderBy('name')
            ->get();

        $jenisPembayarans = JenisPembayaran::where(
            'status',
            true
        )->get();

        return view(
            'pages.keuangan.pembayaran.create',
            compact(
                'santris',
                'jenisPembayarans'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'santri_id' => 'required',
            'jenis_pembayaran_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'metode_bayar' => 'required'

        ]);

        Pembayaran::create([

            'santri_id' => $request->santri_id,
            'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'keterangan' => $request->keterangan

        ]);

        return redirect()
            ->route(
                'transaksi-pembayaran.index'
            )
            ->with(
                'success',
                'Pembayaran berhasil ditambahkan'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function kwitansi($id)
    {
        $pembayaran = Pembayaran::with([
            'santri',
            'jenisPembayaran'
        ])->findOrFail($id);

        return view(
            'pages.keuangan.pembayaran.kwitansi',
            compact('pembayaran')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $santris = Santri::orderBy('name')->get();

        $jenisPembayarans = JenisPembayaran::where(
            'status',
            true
        )->get();

        return view(
            'pages.keuangan.pembayaran.edit',
            compact(
                'pembayaran',
                'santris',
                'jenisPembayarans'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'santri_id' => 'required',
            'jenis_pembayaran_id' => 'required',
            'tanggal_bayar' => 'required',
            'jumlah_bayar' => 'required|numeric',
            'metode_bayar' => 'required'

        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([

            'santri_id' => $request->santri_id,
            'jenis_pembayaran_id' => $request->jenis_pembayaran_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'keterangan' => $request->keterangan

        ]);

        return redirect()
            ->route('transaksi-pembayaran.index')
            ->with(
                'success',
                'Data pembayaran berhasil diperbarui'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->delete();

        return redirect()
            ->route('transaksi-pembayaran.index')
            ->with(
                'success',
                'Data pembayaran berhasil dihapus'
            );
    }
}
