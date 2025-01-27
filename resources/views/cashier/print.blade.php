<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body onload="window.print()">
    <div class="container d-flex justify-content-center mt-3">
        <div class="card " style="width: 30rem">
            <div class="card-body">
                <h4 class="text-center">Struk Pembayaran</h4>
                <p class="text-center">Tanggal: {{ \Carbon\Carbon::now('Asia/Jakarta')->translatedFormat('d F Y H:i:s') }}</p>
                <p class="text-center">Kasir: {{ Auth::user()->name }}</p>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($cashier['items']) && is_array($cashier['items']))
                            @foreach ($cashier['items'] as $item)
                                <tr>
                                    <td>{{ $item['name'] }}</td>
                                    @if (isset($item['unit']) && $item['unit'] == 'Pcs')
                                    <td>{{ $item['stock'] }} Pcs</td>
                                    @else
                                    <td>{{ $item['stock'] }} Kg</td>
                                    @endif
                                    @if (isset($item['unit']) && $item['unit'] == 'Pcs')
                                        <td>Rp. {{ number_format($item['price_sell'] ?? 0, 0, ',', '.') }}</td>
                                        <td>Rp.
                                            {{ number_format(($item['price_sell'] ?? 0) * $item['stock'], 0, ',', '.') }}
                                        </td>
                                    @else
                                        <td>Rp. {{ number_format($item['price_kg'] ?? 0, 0, ',', '.') }}</td>
                                        <td>Rp.
                                            {{ number_format(($item['price_kg'] ?? 0) * $item['stock'], 0, ',', '.') }}
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4">No items in the transaction</td>
                            </tr>
                        @endif

                        <tr>
                            <td colspan="3" class="text-right">Total</td>
                            <td>Rp. {{ number_format($cashier['subtotal'] ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Bayar</td>
                            <td>Rp. {{ number_format($cashier['amount_paid'] ?? 0, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-right">Kembalian</td>
                            <td>Rp. {{ number_format($cashier['change'] ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>

                </table>

                <p class="text-center">Terima kasih telah berbelanja!</p>
            </div>
        </div>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>

</html>
