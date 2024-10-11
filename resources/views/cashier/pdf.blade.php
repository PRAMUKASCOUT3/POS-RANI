<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .container {
            margin-top: 10px;
        }

        .card-header {
            background-color: white;
            color: black;
            padding: 2rem;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }

        .card-header h2 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .table {
            width: 100%;
            height: 100%;
            /* border-collapse: collapse; */
            border-color: black;
        }

        .table th,
        .table td {
            padding: 0.5rem;
            vertical-align: middle;
            border: 1px solid #dee2e6;
            word-wrap: break-word;
            text-align: center;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .signature {
            margin-top: 2rem;
            text-align: right;
            padding-right: 1rem;
        }

        .signature span {
            display: inline-block;
            margin-bottom: 20px;
        }

        .signature u {
            display: inline-block;
            margin-top: 40px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2>{{ $title }}</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Kasir</th>
                            <th>Kode Transaksi</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Jumlah Produk</th>
                            <th>Subtotal</th>
                            <th>Bayar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $groupedCashier = $cashier->groupBy('code');
                        @endphp
                        @foreach ($groupedCashier as $code => $items)
                            <tr>
                                <td rowspan="{{ $items->count() }}">{{ $items->first()->user->name }}</td>
                                <td rowspan="{{ $items->count() }}">{{ $code }}</td>
                                <td rowspan="{{ $items->count() }}">{{ $items->first()->date }}</td>
                                <td>{{ $items->first()->product->name }}</td>
                                <td>{{ $items->first()->total_item }}</td>
                                <td rowspan="{{ $items->count() }}">Rp. {{ number_format($items->sum('subtotal'), 0, ',', '.') }}</td>
                                <td rowspan="{{ $items->count() }}">Rp. {{ number_format($items->first()->amount_paid, 0, ',', '.') }}</td>
                                <td rowspan="{{ $items->count() }}">
                                    <span class="badge bg-success text-white">{{ ucfirst($items->first()->status) }}</span>
                                </td>
                            </tr>
                            @foreach ($items->slice(1) as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->total_item }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>

                    @php
                        $total_pendapatan = $cashier->sum('subtotal');
                        $pengeluaran = $expenditure->sum('nominal');
                        $total_semua = $total_pendapatan - $pengeluaran;
                    @endphp
                    <tr>
                        <td>Total Pendapatan</td>
                        <td colspan="4"></td>
                        <td>Rp. {{ number_format($total_pendapatan, 2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>Pengeluaran</td>
                        <td colspan="4"></td>
                        <td>Rp. {{ number_format($pengeluaran, 2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>Total Keseluruhan</td>
                        <td colspan="4"></td>
                        <td>Rp. {{ number_format($total_semua, 2) }}</td>
                        <td colspan="3"></td>
                    </tr>
                </table>

                <div class="signature">
                    @php
                        $tanggal = \Carbon\Carbon::now()->format('Y-m-d');
                    @endphp
                    <span>{{ $tanggal }}</span>, <span>Jambi</span>
                    <br><br><br>
                    <u>{{ $user->name }}</u>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
