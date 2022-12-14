<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STRUK</title>
</head>
<body>
------------ STRUK PEMBELIAN ---------------
<p>Nama : {{$nama}}</p>
<p>Tanggal Pesan : {{$waktupesan}}</p>
--------------------------------------------
<table>
    <thead>
        <tr>
            <th>Nama Pemesan</th>
            <th>Nama Makanan</th>
            <th>Jumlah</th>
            <th>Harga</th>
        </tr>
    </thead>
    <tbody>
    @foreach($riwayat as $key => $value)
        <tr>
            <td>{{$value->nama_pemesan}}</td>
            <td>{{$value->nama_menu}}</td>
            <td>{{$value->jumlah_menu}}</td>
            <td>{{$value->harga}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<p>Total : {{$total}}</p>
<p>Uang Dibayar : {{$uang_dibayar}}</p>
<p>Kembalian : {{$uang_kembalian}}</p>
------------ TERIMAKASIH -------------------
</body>
</html>
