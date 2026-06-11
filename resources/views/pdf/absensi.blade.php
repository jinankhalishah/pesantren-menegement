<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>
        Absensi Santri
    </title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size:12px;
        }

        h2{
            text-align:center;
            margin-bottom:5px;
        }

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        th,td{
            border:1px solid #000;
            padding:8px;
        }

        th{
            background:#f2f2f2;
        }

    </style>

</head>

<body>

    <h2>
        ABSENSI SANTRI
    </h2>

    <p>

        Kelas :
        {{ $kelas->tingkat }}
        {{ $kelas->nama_kelas }}

    </p>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Status</th>

            </tr>

        </thead>

        <tbody>

            @foreach($absensi as $item)

            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $item->santri->nis }}
                </td>

                <td>
                    {{ $item->santri->name }}
                </td>

                <td>
                    {{ $item->status }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>
