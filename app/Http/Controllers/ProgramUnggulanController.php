<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramUnggulan;

class ProgramUnggulanController extends Controller
{

    public function index()
    {
        $data = ProgramUnggulan::latest()->get();

        return view(
            'pages.informasi.programunggulan.index',
            compact('data')
        );
    }

    public function create()
    {
        return view(
            'pages.informasi.programunggulan.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_program' => 'required',
            'level' => 'required',
            'deskripsi' => 'required'
        ]);

        ProgramUnggulan::create([
            'nama_program' => $request->nama_program,
            'level' => $request->level,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 1
        ]);

        return redirect()
            ->route('program-unggulan.index')
            ->with('success', 'Data berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $program = ProgramUnggulan::findOrFail($id);

        return view(
            'pages.informasi.programunggulan.edit',
            compact('program')
        );
    }


    public function update(Request $request, string $id)
    {
        $program = ProgramUnggulan::findOrFail($id);

        $program->update([
            'nama_program' => $request->nama_program,
            'level' => $request->level,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status ?? 1
        ]);

        return redirect()
            ->route('program-unggulan.index')
            ->with('success', 'Data berhasil diperbarui');
    }


    public function destroy(string $id)
    {
        ProgramUnggulan::findOrFail($id)->delete();

        return redirect()
            ->route('program-unggulan.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
