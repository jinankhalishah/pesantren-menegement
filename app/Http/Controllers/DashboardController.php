<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Pembayaran;
use App\Models\Pengeluaran;
use Carbon\Carbon;


use App\Models\Santri as ModelsSantri;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSantri = Santri::count();
        $totalGuru = Guru::count();
        $totalMapel = Mapel::count();
        $totalAbsenHariIni = Absensi::whereDate(
            'tanggal',
            now()->toDateString()
        )->count();

        $totalHadirHariIni = Absensi::whereDate(
            'tanggal',
            now()->toDateString()
        )
            ->where('status', 'Hadir')
            ->count();

        $persentaseKehadiran = $totalAbsenHariIni > 0
            ? round(($totalHadirHariIni / $totalAbsenHariIni) * 100)
            : 0;

        $santriTerbaru = Santri::latest()
            ->take(3)
            ->get();

        $aktivitas = collect();


        foreach ($santriTerbaru as $santri) {

            $aktivitas->push([

                'judul' => $santri->name,

                'keterangan' => 'Santri Baru',

                'waktu' => $santri->created_at,

                'icon' => 'success'

            ]);
        }


        $pembayaranTerbaru = \App\Models\Pembayaran::latest()
            ->take(3)
            ->get();

        foreach ($pembayaranTerbaru as $item) {

            $aktivitas->push([

                'judul' => 'Pembayaran Rp ' .
                    number_format($item->jumlah_bayar, 0, ',', '.'),

                'keterangan' => 'Transaksi Pembayaran',

                'waktu' => $item->created_at,

                'icon' => 'primary'

            ]);
        }


        $pengeluaranTerbaru = \App\Models\Pengeluaran::latest()
            ->take(3)
            ->get();

        foreach ($pengeluaranTerbaru as $item) {

            $aktivitas->push([

                'judul' => $item->kategori,

                'keterangan' => 'Pengeluaran',

                'waktu' => $item->created_at,

                'icon' => 'danger'

            ]);
        }


        $aktivitasTerbaru = $aktivitas
            ->sortByDesc('waktu')
            ->values()
            ->take(5);

        return view('pages.dashboard', compact(
            'totalSantri',
            'totalGuru',
            'totalMapel',
            'totalAbsenHariIni',
            'totalHadirHariIni',
            'persentaseKehadiran',
            'aktivitasTerbaru'
        ));
    }
}
