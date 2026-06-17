<!DOCTYPE html>

<html>

<head>


    <meta charset="utf-8">

    <!DOCTYPE html>

    <html>

    <head>
        <meta charset="utf-8">


        <title>Kwitansi Pembayaran</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 30px;
                color: #000;
            }

            .header {
                text-align: center;
                border-bottom: 2px solid #000;
                padding-bottom: 10px;
                margin-bottom: 25px;
            }

            .header h2 {
                margin: 0;
            }

            .header p {
                margin: 3px 0;
            }

            .title {
                text-align: center;
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 25px;
                text-decoration: underline;
            }

            table {
                width: 100%;
            }

            td {
                padding: 6px 0;
                vertical-align: top;
            }

            .nominal {
                font-size: 20px;
                font-weight: bold;
                color: #198754;
            }

            .status {
                display: inline-block;
                padding: 6px 15px;
                border: 1px solid #198754;
                font-weight: bold;
            }

            .footer {
                margin-top: 60px;
                text-align: right;
            }

            .ttd {
                margin-top: 70px;
                font-weight: bold;
            }

            .box {
                border: 1px solid #000;
                padding: 20px;
            }
        </style>


    </head>

<body>


    <div class="header">

        <h2>PONDOK PESANTREN MA'HADUL ILMI WATTAZKIYAH</h2>

        <p>
            Sistem Informasi Administrasi Pesantren
        </p>

    </div>

    <div class="title">

        KWITANSI PEMBAYARAN

    </div>

    <div class="box">

        <table>

            <tr>
                <td width="220">Nomor Kwitansi</td>
                <td>: KWT/{{ date('Y') }}/{{ str_pad($pembayaran->id, 5, '0', STR_PAD_LEFT) }}</td>
            </tr>

            <tr>
                <td>Nama Santri</td>
                <td>: {{ $pembayaran->santri->name }}</td>
            </tr>

            <tr>
                <td>NIS</td>
                <td>: {{ $pembayaran->santri->nis }}</td>
            </tr>

            <tr>
                <td>Kelas</td>
                <td>:
                    {{ $pembayaran->santri->kelas->nama_kelas ?? '-' }}
                </td>
            </tr>

            <tr>
                <td>Jenis Pembayaran</td>
                <td>: {{ $pembayaran->jenisPembayaran->nama_pembayaran }}</td>
            </tr>

            <tr>
                <td>Tanggal Bayar</td>
                <td>:
                    {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->locale('id')->translatedFormat('d F Y') }}
                </td>
            </tr>

            <tr>
                <td>Metode Pembayaran</td>
                <td>: {{ $pembayaran->metode_bayar }}</td>
            </tr>

            <tr>
                <td>Keterangan</td>
                <td>: {{ $pembayaran->keterangan ?? '-' }}</td>
            </tr>

            <tr>
                <td>Jumlah Pembayaran</td>
                <td class="nominal">
                    Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}
                </td>
            </tr>

            <tr>
                <td>Status</td>
                <td>
                    <span class="status">
                        LUNAS
                    </span>
                </td>
            </tr>

        </table>

    </div>

    <div class="footer">

        <p>
            {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}

        </p>

        <p>
            Bendahara
        </p>

        <div class="ttd">

            Ust. Syamsu Nandar

        </div>

    </div>

    <script>
        window.print();
    </script>


</body>

</html>
