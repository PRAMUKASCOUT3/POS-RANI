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
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 40px;
        }

        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: white;
            color: black;
            padding: 1.5rem;
            border-bottom: 1px solid #dee2e6;
            text-align: center;
        }

        .card-header h2 {
            font-size: 1.8rem;
            font-weight: bold;
            margin: 0;
        }

        .table {
            width: 100%;
            margin-top: 1rem;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
            color: black;
            text-align: center;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: rgba(0, 123, 255, 0.1);
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .text-center {
            text-align: center;
        }

        .signature {
            margin-top: 2rem;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h2 class="mb-4">Laporan Pengguna/Kasir</h2>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>No</th>
                            <th>Kode Kasir</th>
                            <th>Nama Pengguna / Kasir</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $index => $user)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $user->code }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="signature">
                    @php
                        $tanggal = \Carbon\Carbon::now()->format('Y-m-d');
                    @endphp
                    <span>{{ $tanggal }}</span>, <span>Jambi</span>
                    <br><br><br><br><br>
                    <span><u>{{ $user->name }}</u></span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
