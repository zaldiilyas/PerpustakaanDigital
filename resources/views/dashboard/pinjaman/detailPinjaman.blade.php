<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Peminjaman</title>
    <link rel="stylesheet" href="/css/detailPinjaman.css">
    <script src="https://unpkg.com/jsbarcode@latest/dist/JsBarcode.all.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bukti Peminjaman E-Library</h1>
            <p>No. Nota: {{ $peminjaman->id }}</p>
        </div>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Peminjam</th>
                        <th>Nama Buku</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>{{ $peminjaman->user->name }}</td>
                        <td>{{ $peminjaman->book->judul }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="footer">
            <p>Tanggal Peminjaman: {{ $peminjaman->tanggal_peminjam }}</p>
            <p>Tanggal Pengembalian: {{ $peminjaman->tanggal_pengembalian }}</p>
            <center>
                <svg id="barcode"></svg>
            </center>
        </div>
    </div>

    <script>
        var element = document.getElementById("barcode");
        JsBarcode(element, "{{ $peminjaman->book->id }}");
    </script>
</body>
</html>