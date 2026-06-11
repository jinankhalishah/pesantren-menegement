<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Jadwal Kelas</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #198754;
            font-size: 20px;
        }

        .header p {
            margin-top: 5px;
            color: #666;
            font-size: 12px;
        }

        .info {
            margin-bottom: 15px;
            font-size: 12px;
        }

        .info strong {
            color: #198754;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #198754;
            color: white;
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }

        td {
            border: 1px solid #dee2e6;
            padding: 8px;
            vertical-align: middle;
            text-align: center;
        }

        .jam {
            background: #f8f9fa;
            font-weight: bold;
            width: 90px;
        }

        .jadwal-box {
            padding: 4px;
        }

        .mapel {
            font-weight: bold;
            color: #198754;
            margin-bottom: 4px;
        }

        .guru {
            font-size: 10px;
            color: #6c757d;
        }

        .kosong {
            color: #adb5bd;
        }

        .footer {
            margin-top: 15px;
            text-align: right;
            font-size: 10px;
            color: #777;
        }
    </style>

</head>

<body>

    <div class="header">

        <h2>JADWAL PELAJARAN</h2>

        <p>
            Kelas {{ $kelas->tingkat }}
            {{ $kelas->nama_kelas }}
        </p>

    </div>

    <div class="info">

        <strong>Total Jadwal :</strong>
        {{ $jadwals->count() }}

    </div>

    <table>

        <thead>

            <tr>

                <th>Waktu</th>

                @foreach ($days as $day)
                    <th>{{ $day }}</th>
                @endforeach

            </tr>

        </thead>

        <tbody>

            @foreach ($timeSlots as $slot)
                @php

                    [$start, $end] = explode('-', $slot);

                @endphp

                <tr>

                    <td class="jam">

                        {{ \Carbon\Carbon::parse($start)->format('H:i') }}

                        <br>

                        -

                        <br>

                        {{ \Carbon\Carbon::parse($end)->format('H:i') }}

                    </td>

                    @foreach ($days as $day)
                        @php

                            $jadwal = $jadwals->first(function ($item) use ($day, $start, $end) {
                                return $item->hari == $day && $item->jam_mulai == $start && $item->jam_selesai == $end;
                            });

                        @endphp

                        <td>

                            @if ($jadwal)
                                <div class="jadwal-box">

                                    <div class="mapel">

                                        {{ $jadwal->mapel?->nama_mapel }}

                                    </div>

                                    <div class="guru">

                                        {{ $jadwal->guru?->name }}

                                    </div>

                                </div>
                            @else
                                <span class="kosong">-</span>
                            @endif

                        </td>
                    @endforeach

                </tr>
            @endforeach

        </tbody>

    </table>

    <div class="footer">

        Dicetak pada:
        {{ now()->format('d-m-Y') }}

    </div>

</body>

</html>
