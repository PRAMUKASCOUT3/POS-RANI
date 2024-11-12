@extends('layouts.master')

@section('content')



@if (Auth()->user()->isAdmin == 1)
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        @php
                            $user = Auth::user();
                        @endphp
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hallo, {{ $user->name }}! 🎉</h5>
                            <p class="mb-4 animation">
                                <b>semoga hari Anda lancar. Saya ingin melaporkan terkait sistem kasir di web ini yang memerlukan perhatian Anda 😊</b>
                            </p>    
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="/assets/img/illustrations/man-with-laptop-light.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <h4><li class="fas fa-boxes fa-lg" style="color: rgb(3, 255, 3)"></li></h4>
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Produk</span>
                            <h4 class="card-title mb-2">Jumlah : {{ $product }}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div
                                class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <h4><li class="fas fa-users fa-lg" style="color: blue"></li></h4>
                                </div>
                            </div>
                            <span>Pengguna</span>
                            @php
                                $user = \App\Models\User::where('isAdmin',0)->count();
                            @endphp
                            <h4 class="card-title text-nowrap mb-1">Jumlah : {{ $user }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
      
    </div>
</div>
@else
<div class="container-fluid container-p-y">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        @php
                            $user = Auth::user();
                        @endphp
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hallo, {{ $user->name }}! 🎉</h5>
                            <p class="mb-4 animation">
                                <b>semoga hari Anda lancar. Saya ingin melaporkan terkait sistem kasir di web ini yang memerlukan perhatian Anda 😊</b>
                            </p>    
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="/assets/img/illustrations/man-with-laptop-light.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="card-body">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endif
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