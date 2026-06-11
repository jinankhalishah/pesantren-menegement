<?php

namespace App\Http\Controllers;
use App\Models\Absensi;
use App\Models\Santri;
use App\Models\Kelas;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $kelas = Kelas::where('status', 'Aktif')->get();

        $tanggal = $request->tanggal ?? date('Y-m-d');

        $santris = collect();
        $absensiData = [];

        if ($request->kelas_id) {

            $santris = Santri::where('kelas_id', $request->kelas_id)
                ->orderBy('name')
                ->get();

            $absensi = Absensi::whereDate('tanggal', $tanggal)
                ->get();

            foreach ($absensi as $item) {
                $absensiData[$item->santri_id] = $item->status;
            }
        }

        $hadir = Absensi::whereDate('tanggal', $tanggal)
            ->where('status', 'Hadir')
            ->count();

        $sakit = Absensi::whereDate('tanggal', $tanggal)
            ->where('status', 'Sakit')
            ->count();

        $izin = Absensi::whereDate('tanggal', $tanggal)
            ->where('status', 'Izin')
            ->count();

        $alpha = Absensi::whereDate('tanggal', $tanggal)
            ->where('status', 'Alpha')
            ->count();

        return view(
            'pages.absensi',
            compact(
                'kelas',
                'santris',
                'absensiData',
                'hadir',
                'sakit',
                'izin',
                'alpha'
            )
        );
    }

    public function store(Request $request)
    {
        foreach ($request->santri_id as $index => $santriId) {

            Absensi::updateOrCreate(
                [
                    'santri_id' => $santriId,
                    'tanggal' => $request->tanggal,
                ],
                [
                    'status' => $request->status[$index],
                ]
            );
        }

        return redirect()
            ->back()
            ->with(
                'success',
                'Absensi berhasil disimpan'
            );
    }

    public function pdf(Request $request)
    {
        $kelas = Kelas::findOrFail($request->kelas_id);

    $tanggal = $request->tanggal;

    $absensi = Absensi::with('santri')
        ->whereDate('tanggal', $tanggal)
        ->whereHas('santri', function ($query) use ($request) {
            $query->where('kelas_id', $request->kelas_id);
        })
        ->get();

    $pdf = Pdf::loadView(
        'pdf.absensi',
        compact(
            'absensi',
            'kelas',
            'tanggal'
        )
    );

    return $pdf->stream('absensi-harian.pdf');
    }

    public function rekap(Request $request)
    {
        $kelas = Kelas::where(
            'status',
            'Aktif'
        )->get();

        $rekap = collect();

        if (
            $request->kelas_id &&
            $request->bulan
        ) {

            $bulanInput = $request->bulan;

            $bulan = explode('-', $bulanInput);

            $tahun = $bulan[0];
            $bulanAngka = $bulan[1];

            $rekap = Santri::with([
                'absensi' => function ($query) use (
                    $bulanAngka,
                    $tahun
                ) {

                    $query->whereMonth(
                        'tanggal',
                        $bulanAngka
                    )
                        ->whereYear(
                            'tanggal',
                            $tahun
                        );
                }
            ])
                ->where(
                    'kelas_id',
                    $request->kelas_id
                )
                ->orderBy('name')
                ->get();
        }

        return view(
            'pages.rekapabsensi',
            compact(
                'kelas',
                'rekap'
            )
        );
    }

    public function rekapPdf(Request $request)
    {
        $kelas = Kelas::findOrFail(
            $request->kelas_id
        );

        $bulanInput = $request->bulan;

        $bulan = explode('-', $bulanInput);

        $tahun = $bulan[0];
        $bulanAngka = $bulan[1];

        $rekap = Santri::with([
            'absensi' => function ($query) use (
                $bulanAngka,
                $tahun
            ) {

                $query->whereMonth(
                    'tanggal',
                    $bulanAngka
                )
                    ->whereYear(
                        'tanggal',
                        $tahun
                    );
            }
        ])
            ->where(
                'kelas_id',
                $request->kelas_id
            )
            ->orderBy('name')
            ->get();

        $pdf = Pdf::loadView(
            'pdf.rekapabsensi',
            compact(
                'rekap',
                'kelas',
                'bulanInput'
            )
        );

        return $pdf->stream(
            'rekap-absensi.pdf'
        );
    }
}
