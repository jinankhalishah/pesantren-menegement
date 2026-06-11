<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\Mapel;


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

        return view('pages.dashboard', compact(
            'totalSantri',
            'totalGuru',
            'totalMapel',
            'totalAbsenHariIni',
            'totalHadirHariIni',
            'persentaseKehadiran'
        ));
    }
}
