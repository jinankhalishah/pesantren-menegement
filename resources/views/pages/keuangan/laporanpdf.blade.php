<!DOCTYPE html>

<html>

<head>


    <meta charset="utf-8">

    <title>
        Laporan Keuangan
    </title>

    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">
        <title>Laporan Keuangan</title>


        <style>
            body {
                font-family: DejaVu Sans;
                font-size: 11px;
            }

            .text-center {
                text-align: center;
            }

            .text-right {
                text-align: right;
            }

            .mb-20 {
                margin-bottom: 20px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid #000;
            }

            th {
                background: #f2f2f2;
            }

            th,
            td {
                padding: 6px;
            }

            .table-no-border,
            .table-no-border tr,
            .table-no-border td {
                border: none !important;
            }

            .summary td {
                font-weight: bold;
            }

            hr {
                margin: 10px 0;
            }
        </style>


    </head>

<body>

    <div class="text-center">

        <h2 style="margin-bottom:0;">
            PONDOK PESANTREN MA'HADUL ILMI WATTAZKIYAH
        </h2>

        <p style="margin-top:5px;">
            Laporan Keuangan
        </p>

    </div>

    <hr>

    <table class="table-no-border mb-20">

        <tr>

            <td width="50%">

                <strong>No. Laporan :</strong>

                LAP-{{ now()->format('Ym') }}

            </td>

            <td class="text-right">

                <strong>Periode :</strong>

                {{ $tanggalAwal ? \Carbon\Carbon::parse($tanggalAwal)->locale('id')->translatedFormat('d F Y') : '-' }}

                s/d

                {{ $tanggalAkhir ? \Carbon\Carbon::parse($tanggalAkhir)->locale('id')->translatedFormat('d F Y') : '-' }}

            </td>

        </tr>

    </table>

    <h4>
        Ringkasan Keuangan
    </h4>

    <table class="summary mb-20">

        <tr>

            <td width="60%">
                Total Pemasukan
            </td>

            <td class="text-right">
                Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
            </td>

        </tr>

        <tr>

            <td>
                Total Pengeluaran
            </td>

            <td class="text-right">
                Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
            </td>

        </tr>

        <tr>

            <td>
                Saldo Akhir
            </td>

            <td class="text-right">
                Rp {{ number_format($totalPemasukan - $totalPengeluaran, 0, ',', '.') }}
            </td>

        </tr>

    </table>

    <h4>
        Detail Pemasukan
    </h4>

    <table class="mb-20">

        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="15%">
                    Tanggal
                </th>

                <th>
                    Santri
                </th>

                <th>
                    Jenis Pembayaran
                </th>

                <th width="20%">
                    Nominal
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($transaksi as $item)
                <tr>

                    <td class="text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse($item->tanggal_bayar)->locale('id')->translatedFormat('d M Y') }}

                    </td>

                    <td>

                        {{ $item->santri->name }}

                    </td>

                    <td>

                        {{ $item->jenisPembayaran->nama_pembayaran }}

                    </td>

                    <td class="text-right">

                        Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Tidak ada data pemasukan

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    <h4>
        Detail Pengeluaran
    </h4>

    <table>

        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="15%">
                    Tanggal
                </th>

                <th width="20%">
                    Kategori
                </th>

                <th>
                    Keterangan
                </th>

                <th width="20%">
                    Nominal
                </th>

            </tr>

        </thead>

        <tbody>

            @forelse($pengeluarans as $item)
                <tr>

                    <td class="text-center">

                        {{ $loop->iteration }}

                    </td>

                    <td>

                        {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->translatedFormat('d M Y') }}

                    </td>

                    <td>

                        {{ $item->kategori }}

                    </td>

                    <td>

                        {{ $item->keterangan }}

                    </td>

                    <td class="text-right">

                        Rp {{ number_format($item->nominal, 0, ',', '.') }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Tidak ada data pengeluaran

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    <br><br><br>

    <table class="table-no-border">

        <tr>

            <td width="60%"></td>

            <td class="text-center">

                Muntok,
                {{ now()->locale('id')->translatedFormat('d F Y') }}

                <br><br><br><br><br>

                <strong>
                    Ust. Syamsu Nandar
                </strong>

                <br>

                Pimpinan Pondok

            </td>

        </tr>

    </table>


</body>

</html>
