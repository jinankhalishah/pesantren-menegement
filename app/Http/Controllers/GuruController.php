<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $gurus = Guru::with('mapel')
            ->when($search, function ($query) use ($search) {

                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            })
            ->latest()
            ->get();

        return view('pages.dataguru', compact('gurus', 'search'));
    }

    /**
     * Form tambah guru
     */
    public function create()
    {
        $mapels = Mapel::where('status', 'Aktif')->get();
        return view('pages.tambahguru', compact('mapels'));
    }

    /**
     * Simpan guru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip'     => 'required|unique:guru,nip',
            'name'    => 'required',
            'mapel_id' => 'required|exists:mapel,id',
            'phone'   => 'required|min:10|max:15',
            'status'  => 'required',
        ]);


        Guru::create([
            'nip'     => $request->nip,
            'name'    => $request->name,
            'mapel_id' => $request->mapel_id,
            'phone'   => $request->phone,
            'status'  => $request->status,
        ]);


        return redirect()
            ->route('guru.index')
            ->with('success', 'Data pengajar berhasil ditambahkan');
    }

    /**
     * Form edit guru
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapels = Mapel::where('status', 'Aktif')->get();

        return view('pages.editguru', compact('guru', 'mapels'));
    }

    /**
     * Update guru
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nip'     => 'required|unique:guru,nip,' . $id,
            'name'    => 'required',
            'mapel_id' => 'required|exists:mapel,id',
            'phone'   => 'required',
            'status'  => 'required',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update([
            'nip'     => $request->nip,
            'name'    => $request->name,
            'mapel_id' => $request->mapel_id,
            'phone'   => $request->phone,
            'status'  => $request->status,
        ]);

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data pengajar berhasil diperbarui');
    }

    /**
     * Hapus guru
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        $guru->delete();

        return redirect()
            ->route('guru.index')
            ->with('success', 'Data pengajar berhasil dihapus');
    }
}
