<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja</title>
</head>
<body>
    <h1>Keranjang Belanja</h1>
    @if (session('keranjang') && count(session('keranjang')) > 0)
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach (session('keranjang') as $item)
                    <tr>
                        <td>{{ $item['nama'] }}</td>
                        <td>Rp{{ number_format($item['harga'], 0, ',', '.') }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>Rp{{ number_format($item['harga'] * $item['jumlah'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="#" class="btn-checkout">Checkout</a>
    @else
        <p>Keranjang Anda kosong.</p>
    @endif
</body>
</html>
