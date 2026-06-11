<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::latest()->get();

        return view('pages.datakelas', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.tambahkelas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'tingkat' => 'required',
            'status' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan');
    }

    public function jadwal($id)
    {
        $kelas = Kelas::findOrFail($id);

        $jadwals = Jadwal::with([
            'guru',
            'mapel'
        ])
            ->where('kelas_id', $id)
            ->get();

        return view(
            'pages.jadwalkelas',
            compact('kelas', 'jadwals')
        );
    }

    public function cetakJadwal($id)
    {
        $kelas = Kelas::findOrFail($id);

        $jadwals = Jadwal::with([
            'guru',
            'mapel'
        ])
            ->where('kelas_id', $id)
            ->get();

        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu'
        ];

        $timeSlots = $jadwals
            ->sortBy('jam_mulai')
            ->map(function ($item) {

                return $item->jam_mulai . '-' . $item->jam_selesai;
            })
            ->unique()
            ->values();

        $pdf = Pdf::loadView(
            'pdf.jadwalkelas',
            compact(
                'kelas',
                'jadwals',
                'days',
                'timeSlots'
            )
        );

        $pdf->setPaper('A4', 'landscape');

        return $pdf->stream(
            'jadwal-' . $kelas->nama_kelas . '.pdf'
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        return view('pages.editkelas', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::findOrFail($id);

        $kelas->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus');
    }
}
