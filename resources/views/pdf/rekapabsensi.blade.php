<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <style>
        body {
            font-family: DejaVu Sans;
            font-size: 11px;
        }

        h2 {
            text-align: center;
            margin-bottom: 5px;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
        }

        th {
            background: #f0f0f0;
        }
    </style>

</head>

<body>

    <h2>
        REKAP ABSENSI SANTRI
    </h2>

    <p>

        Kelas
        {{ $kelas->tingkat }}
        {{ $kelas->nama_kelas }}

        <br>

        Periode :
        {{ \Carbon\Carbon::parse($bulanInput . '-01')->translatedFormat('F Y') }}

    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Hadir</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alpha</th>
                <th>%</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($rekap as $santri)
                @php

                    $hadir = $santri->absensi->where('status', 'Hadir')->count();

                    $sakit = $santri->absensi->where('status', 'Sakit')->count();

                    $izin = $santri->absensi->where('status', 'Izin')->count();

                    $alpha = $santri->absensi->where('status', 'Alpha')->count();

                    $total = $santri->absensi->count();

                    $persen = $total > 0 ? round(($hadir / $total) * 100) : 0;

                @endphp

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $santri->nis }}</td>

                    <td style="text-align:left">
                        {{ $santri->name }}
                    </td>

                    <td>{{ $hadir }}</td>

                    <td>{{ $sakit }}</td>

                    <td>{{ $izin }}</td>

                    <td>{{ $alpha }}</td>

                    <td>{{ $persen }}%</td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <br><br>

    <table style="border:none; width:100%;">

        <tr>

            <td style="border:none; width:50%;"></td>

            <td style="border:none; text-align:center;">
                Muntok,
                {{ \Carbon\Carbon::now()->locale('id')->translatedFormat('d F Y') }}

            </td>

        </tr>

    </table>

    <br><br>

    <table style="border:none; width:100%;">

        <tr>

            <td style="border:none; text-align:center; width:50%;">

                Wali Kelas

                <br><br><br><br><br>

                (__________________)

            </td>

            <td style="border:none; text-align:center; width:50%;">

                Pimpinan Pesantren

                <br><br><br><br><br>

                (__________________)

            </td>

        </tr>

    </table>

</body>

</html>
