<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $santris = Santri::with('kelas')
            ->when($search, function ($query) use ($search) {

                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nis', 'like', '%' . $search . '%');
            })->latest()->get();

        return view('pages.datasantri', compact('santris', 'search'));
    }

    /**
     * Menampilkan form tambah santri
     */
    public function create()
    {
        $kelas = Kelas::where('status', 'Aktif')->get();

        return view('pages.tambahsantri', compact('kelas'));
    }

    /**
     * Menyimpan data santri
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis'      => 'required|unique:santri,nis',
            'name'     => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'gender'   => 'required',
            'status'   => 'required',
        ]);

        Santri::create([
            'nis'      => $request->nis,
            'name'     => $request->name,
            'kelas_id' => $request->kelas_id,
            'gender'   => $request->gender,
            'status'   => $request->status,
        ]);

        return redirect()
            ->route('santri.index')
            ->with('success', 'Data santri berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        $santri = Santri::findOrFail($id);
        $kelas = Kelas::where('status', 'Aktif')->get();

        return view('pages.editsantri', compact('santri', 'kelas'));
    }

    /**
     * Update data santri
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis'      => 'required|unique:santri,nis,' . $id,
            'name'     => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'gender'   => 'required',
            'status'   => 'required',
        ]);

        $santri = Santri::findOrFail($id);

        $santri->update([
            'nis'      => $request->nis,
            'name'     => $request->name,
            'kelas_id' => $request->kelas_id,
            'gender'   => $request->gender,
            'status'   => $request->status,
        ]);

        return redirect()
            ->route('santri.index')
            ->with('success', 'Data santri berhasil diupdate');
    }

    /**
     * Hapus data santri
     */
    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);

        $santri->delete();

        return redirect()
            ->route('santri.index')
            ->with('success', 'Data santri berhasil dihapus');
    }
    //
}
