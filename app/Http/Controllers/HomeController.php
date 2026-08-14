<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\VisiMisi;
use App\Models\ProgramUnggulan;
use App\Models\Prestasi;
use App\Models\Berita;

class HomeController extends Controller
{
    public function index()
    {

        $jumlahSantriAktif = Santri::where('status', 'Aktif')->count();
        $visiMisi = VisiMisi::first();
        $prestasis = Prestasi::latest()
            ->take(3)
            ->get();
        $beritas = Berita::latest()
            ->take(3)
            ->get();

        $facilities = [
            [
                'icon' => 'bi-building',
                'title' => 'Asrama Nyaman',
                'desc' => 'Fasilitas asrama yang bersih dan nyaman untuk santri.',
            ],
            [
                'icon' => 'bi-journal-bookmark',
                'title' => 'Perpustakaan Lengkap',
                'desc' => 'Koleksi buku dan referensi yang mendukung pembelajaran.',
            ],
            [
                'icon' => 'bi-laptop',
                'title' => 'Laboratorium Komputer',
                'desc' => 'Fasilitas komputer untuk mendukung pembelajaran teknologi.',
            ],
            [
                'icon' => 'bi-basket3',
                'title' => 'Lapangan Olahraga',
                'desc' => 'Area olahraga untuk kegiatan fisik santri.',
            ],
        ];

        $programs = ProgramUnggulan::where(
            'status',
            1
        )->latest()->get();

        $achievements = [
            ['title' => 'Juara 1 Lomba Tahfidz Nasional', 'year' => 2023],
            ['title' => 'Juara 2 Cerdas Cermat Al-Quran', 'year' => 2022],
            ['title' => 'Juara 3 Karya Tulis Ilmiah', 'year' => 2021],
        ];

        return view('pages.home', compact(
            'jumlahSantriAktif',
            'visiMisi',
            'prestasis',
            'beritas',
            'facilities',
            'programs',
            'achievements'
        ));
    }
}
