<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pengeluaran;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPemasukan = Pembayaran::sum('jumlah_bayar');

        $totalPengeluaran = Pengeluaran::sum('nominal');

        $saldo =
            $totalPemasukan -
            $totalPengeluaran;

        $pemasukanBulanIni = Pembayaran::whereMonth(
            'tanggal_bayar',
            now()->month
        )->sum('jumlah_bayar');

        $pengeluaranBulanIni = Pengeluaran::whereMonth(
            'tanggal',
            now()->month
        )->sum('nominal');

        $transaksiHariIni = Pembayaran::whereDate(
            'tanggal_bayar',
            today()
        )->count();

        $transaksiTerbaru = Pembayaran::with([
            'santri',
            'jenisPembayaran'
        ])
            ->latest()
            ->take(5)
            ->get();

        $pengeluaranTerbaru = Pengeluaran::latest()
            ->take(5)
            ->get();

        return view(
            'pages.keuangan.dashboard',
            compact(
                'totalPemasukan',
                'totalPengeluaran',
                'saldo',
                'pemasukanBulanIni',
                'pengeluaranBulanIni',
                'transaksiHariIni',
                'transaksiTerbaru',
                'pengeluaranTerbaru'
            )
        );
    }

    public function pdf(Request $request)
{
    $tanggalAwal = $request->tanggal_awal;
    $tanggalAkhir = $request->tanggal_akhir;

    $pembayaran = Pembayaran::query();
    $pengeluaran = Pengeluaran::query();

    if ($tanggalAwal && $tanggalAkhir) {

        $pembayaran->whereBetween(
            'tanggal_bayar',
            [$tanggalAwal, $tanggalAkhir]
        );

        $pengeluaran->whereBetween(
            'tanggal',
            [$tanggalAwal, $tanggalAkhir]
        );
    }

    $data = [
        'tanggalAwal' => $tanggalAwal,
        'tanggalAkhir' => $tanggalAkhir,

        'totalPemasukan' =>
            $pembayaran->sum('jumlah_bayar'),

        'totalPengeluaran' =>
            $pengeluaran->sum('nominal'),

        'transaksi' =>
            $pembayaran->with([
                'santri',
                'jenisPembayaran'
            ])->get(),

        'pengeluarans' =>
            $pengeluaran->get(),
    ];

    $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView(
        'pages.keuangan.laporanpdf',
        $data
    );

    return $pdf->stream(
        'laporan-keuangan.pdf'
    );
}

}








