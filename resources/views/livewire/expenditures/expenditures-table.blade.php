<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pengeluaran <i class="fas fa-file-invoice-dollar"></i></h5>
                <div class="table-responsive">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createSupplierModal"><i class="fas fa-plus"></i> Tambah Pengeluaran</button>
                    <table id="example" class="table table-striped mt-2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal <i class="fas fa-calendar-alt"></i></th>
                                <th>Deskripsi Pengeluaran <i class="fas fa-paragraph"></i></th>
                                <th>Nominal Pengeluaran <i class="fas fa-dollar-sign"></i></th>
                                <th>Aksi <i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expenditures as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>Rp. {{number_format($item->nominal)  }}</td>
                                    <td>
                                        <a href="{{ route('expenditures.edit',$item->id) }}"
                                            class="btn btn-info btn-sm ">Edit</a>
                                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $item->id }})"
                                            onclick="confirm('Apakah kamu yakin ingin menghapus data ini?') || event.stopImmediatePropagation();">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tr>
                            @php
                                $total = $expenditures->sum('nominal')
                            @endphp
                            <td>Total Pengeluaran</td>
                            <td colspan="2"></td>
                            <td colspan="2">Rp. {{ number_format($total)  }}</td>
                        </tr>
                    </table>

                     <!-- Modal Create Supplier -->
                     <div class="modal fade" id="createSupplierModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <livewire:expenditures.expenditures-create/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
