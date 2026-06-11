<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Guru;
use App\Models\Mapel;


class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $jadwals = Jadwal::with([
            'kelas',
            'guru',
            'mapel'
        ])
            ->when($search, function ($query) use ($search) {

                $query->where('hari', 'like', "%{$search}%")
                    ->orWhereHas('guru', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    })
                    ->orWhereHas('mapel', function ($q) use ($search) {
                        $q->where('nama_mapel', 'like', "%{$search}%");
                    });
            })
            ->latest()
            ->get();

        return view(
            'pages.datajadwal',
            compact('jadwals', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::where('status', 'Aktif')->get();
        $guru  = Guru::where('status', 'Aktif')->get();
        $mapel = Mapel::where('status', 'Aktif')->get();

        return view(
            'pages.tambahjadwal',
            compact('kelas', 'guru', 'mapel')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id'    => 'required|exists:kelas,id',
            'guru_id'     => 'required|exists:guru,id',
            'mapel_id'    => 'required|exists:mapel,id',
            'hari'        => 'required',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);


        // CEK BENTROK GURU
        $bentrokGuru = Jadwal::where('guru_id', $request->guru_id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {

                $query->where('jam_mulai', '<', $request->jam_selesai)
                    ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($bentrokGuru) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Guru sudah memiliki jadwal pada waktu tersebut.'
                );
        }

        // CEK BENTROK KELAS
        $bentrokKelas = Jadwal::where('kelas_id', $request->kelas_id)
            ->where('hari', $request->hari)
            ->where(function ($query) use ($request) {

                $query->where('jam_mulai', '<', $request->jam_selesai)
                    ->where('jam_selesai', '>', $request->jam_mulai);
            })
            ->exists();

        if ($bentrokKelas) {

            return back()
                ->withInput()
                ->with(
                    'error',
                    'Kelas sudah memiliki jadwal pada waktu tersebut.'
                );
        }

        // SIMPAN DATA
        Jadwal::create([
            'kelas_id'    => $request->kelas_id,
            'guru_id'     => $request->guru_id,
            'mapel_id'    => $request->mapel_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with(
                'success',
                'Jadwal berhasil ditambahkan.'
            );
    }

    public function edit(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $kelas = Kelas::where('status', 'Aktif')->get();
        $guru  = Guru::where('status', 'Aktif')->get();
        $mapel = Mapel::where('status', 'Aktif')->get();

        return view(
            'pages.editjadwal',
            compact(
                'jadwal',
                'kelas',
                'guru',
                'mapel'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kelas_id'    => 'required|exists:kelas,id',
            'guru_id'     => 'required|exists:guru,id',
            'mapel_id'    => 'required|exists:mapel,id',
            'hari'        => 'required',
            'jam_mulai'   => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = Jadwal::findOrFail($id);

        $jadwal->update([
            'kelas_id'    => $request->kelas_id,
            'guru_id'     => $request->guru_id,
            'mapel_id'    => $request->mapel_id,
            'hari'        => $request->hari,
            'jam_mulai'   => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        $jadwal->delete();

        return redirect()
            ->route('jadwal.index')
            ->with('success', 'Jadwal berhasil dihapus');
    }
}
