<!DOCTYPE html>

<html>

<head>

```
<meta charset="utf-8">

<title>
    Kwitansi Pembayaran
</title>

<style>

    body {

        font-family: Arial, sans-serif;
        margin: 40px;

    }

    .title {

        text-align: center;
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 30px;

    }

    table {

        width: 100%;
        border-collapse: collapse;

    }

    td {

        padding: 10px;

    }

    .nominal {

        font-size: 22px;
        font-weight: bold;
        color: green;

    }

    .ttd {

        margin-top: 70px;
        text-align: right;

    }

</style>
```

</head>

<body>

```
<div class="title">

    KWITANSI PEMBAYARAN

</div>

<table>

    <tr>

        <td width="200">
            Nomor
        </td>

        <td>

            :
            INV-{{ str_pad($pembayaran->id,5,'0',STR_PAD_LEFT) }}

        </td>

    </tr>

    <tr>

        <td>
            Nama Santri
        </td>

        <td>

            :
            {{ $pembayaran->santri->name }}

        </td>

    </tr>

    <tr>

        <td>
            Jenis Pembayaran
        </td>

        <td>

            :
            {{ $pembayaran->jenisPembayaran->nama_pembayaran }}

        </td>

    </tr>

    <tr>

        <td>
            Tanggal Bayar
        </td>

        <td>

            :
            {{ \Carbon\Carbon::parse($pembayaran->tanggal_bayar)->translatedFormat('d F Y') }}

        </td>

    </tr>

    <tr>

        <td>
            Metode Bayar
        </td>

        <td>

            :
            {{ $pembayaran->metode_bayar }}

        </td>

    </tr>

    <tr>

        <td>
            Jumlah
        </td>

        <td class="nominal">

            :
            Rp {{ number_format($pembayaran->jumlah_bayar,0,',','.') }}

        </td>

    </tr>

</table>

<div class="ttd">

    <p>

        Bendahara

    </p>

    <br><br><br>

    <strong>

        ____________________

    </strong>

</div>

<script>

    window.print();

</script>
```

</body>

</html>
