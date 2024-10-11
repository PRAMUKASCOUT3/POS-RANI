@extends('layouts.master')

@section('content')


<div class="page-heading">
    <h3>Dashboard <i class="fas fa-home"></i></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Profile Visit <i class="fas fa-chart-bar"></i></h4>
                        </div>
                        <div class="card-body">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/faces/1.jpg" alt="Face 1">
                        </div>
                        @php
                            $user = Auth::user();
                        @endphp
                        <div class="ms-3 name">
                            <h5 class="font-bold">Hallo, {{ $user->name }}</h5>
                            <h6 class="text-muted mb-0">{{ $user->email }}</h6>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary mt-2">Logout <i class="fas fa-sign-out-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    var options = {
        chart: {
            type: 'bar',
        },
        series: [{
            name: 'Jumlah Transaksi',
            data: [{{ implode(',', $completedPercentages) }}]
        }],
        xaxis: {
            categories: [
                '{{ now()->subMonths(11)->format("M") }}', 
                '{{ now()->subMonths(10)->format("M") }}', 
                '{{ now()->subMonths(9)->format("M") }}', 
                '{{ now()->subMonths(8)->format("M") }}', 
                '{{ now()->subMonths(7)->format("M") }}', 
                '{{ now()->subMonths(6)->format("M") }}', 
                '{{ now()->subMonths(5)->format("M") }}', 
                '{{ now()->subMonths(4)->format("M") }}', 
                '{{ now()->subMonths(3)->format("M") }}', 
                '{{ now()->subMonths(2)->format("M") }}', 
                '{{ now()->subMonths(1)->format("M") }}', 
                '{{ now()->format("M") }}'
            ]
        },
        title: {
            text: 'Persentase Penyelesaian Transaksi (12 Bulan Terakhir)',
            align: 'left'
        }
    }

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
@endsection