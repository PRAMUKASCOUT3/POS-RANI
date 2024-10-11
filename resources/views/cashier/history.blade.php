@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-4">Data Riwayat Transaksi <i class="fas fa-history"></i></h5>
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Kode Transaksi <i class="fas fa-code"></i></th>
                            <th>Tanggal <i class="fas fa-calendar-alt"></i></th>
                            <th>Nama Produk <i class="fas fa-file-signature"></i></th>
                            <th>Jumlah Produk <i class="fas fa-cubes"></i></th>
                            <th>Subtotal <i class="fas fa-dollar-sign"></i></th>
                            <th>Bayar <i class="fas fa-hand-holding-usd"></i></th>
                            <th>Status <i class="fas fa-stream"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Mengelompokkan transaksi berdasarkan kode transaksi
                            $groupedCashier = $cashier->groupBy('code');
                        @endphp
    
                        @forelse ($groupedCashier as $code => $items)
                            <tr>
                                <!-- Mengambil data dari transaksi pertama dalam grup -->
                                <td rowspan="{{ $items->count() }}">{{ $code }}</td>
                                <td rowspan="{{ $items->count() }}">{{ $items->first()->date }}</td>
                                
                                <!-- Menampilkan produk pertama di baris pertama -->
                                <td>{{ $items->first()->product->name }}</td>
                                <td>{{ $items->first()->total_item }}</td>
                                <td rowspan="{{ $items->count() }}">Rp. {{ number_format($items->sum('subtotal'), 0, ',', '.') }}</td>
                                <td rowspan="{{ $items->count() }}">Rp. {{ number_format($items->first()->amount_paid, 0, ',', '.') }}</td>
                                <td rowspan="{{ $items->count() }}"><span class="btn bedge bg-success text-white">{{ ucfirst($items->first()->status) }}</span></td>
                            </tr>
    
                            <!-- Menampilkan produk lainnya dalam baris baru, jika ada -->
                            @foreach ($items->slice(1) as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->total_item }}</td>
                                </tr>
                            @endforeach
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Belum ada transaksi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                    <p class="block  text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        Page {{ $cashier->currentPage() }} of {{ $cashier->lastPage() }}
                    </p>
                    <div class="flex gap-2">
                        @if ($cashier->onFirstPage())
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle  text-xs font-bold uppercase text-gray-900 transition-all opacity-50 cursor-not-allowed"
                                type="button" disabled>
                                Previous
                            </button>
                        @else
                            <a href="{{ $cashier->previousPageUrl() }}">
                                <button
                                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle  text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                    type="button">
                                    Previous
                                </button>
                            </a>
                        @endif
                        @if ($cashier->hasMorePages())
                            <a href="{{ $cashier->nextPageUrl() }}">
                                <button
                                    class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle  text-xs font-bold uppercase text-gray-900 transition-all hover:opacity-75 focus:ring focus:ring-gray-300 active:opacity-[0.85]"
                                    type="button">
                                    Next
                                </button>
                            </a>
                        @else
                            <button
                                class="select-none rounded-lg border border-gray-900 py-2 px-4 text-center align-middle  text-xs font-bold uppercase text-gray-900 transition-all opacity-50 cursor-not-allowed"
                                type="button" disabled>
                                Next
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection