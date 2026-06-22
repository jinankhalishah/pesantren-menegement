<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
     public function index()
    {
        $data = VisiMisi::first();

        return view(
            'pages.informasi.visimisi.index',
            compact('data')
        );
    }

    public function edit()
    {
        $data = VisiMisi::first();

        if (!$data) {

            $data = VisiMisi::create([
                'visi' => '',
                'misi' => ''
            ]);
        }

        return view(
            'pages.informasi.visimisi.edit',
            compact('data')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $data = VisiMisi::first();

        if (!$data) {

            VisiMisi::create([
                'visi' => $request->visi,
                'misi' => $request->misi
            ]);

        } else {

            $data->update([
                'visi' => $request->visi,
                'misi' => $request->misi
            ]);
        }

        return redirect()
            ->route('visi-misi.index')
            ->with(
                'success',
                'Data visi dan misi berhasil diperbarui.'
            );
    }
}
