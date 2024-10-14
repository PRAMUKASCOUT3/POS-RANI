<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Supplier <i class="fas fa-dolly-flatbed"></i></h5>
                <div>
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createSupplierModal"><i class="fas fa-plus"></i> Tambah Supplier</button>
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>Nama <i class="fas fa-file-signature"></i></th>
                                <th>Nomor HP <i class="fas fa-phone"></i></th>
                                <th>Alamat <i class="fas fa-map-marked-alt"></i></th>
                                <th>Aksi <i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->contact_person }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>
                                    <a href="{{ route('supplier.edit',$supplier->id) }}" class="btn btn-info btn-sm ">Edit</a>
                                    <button 
                                    class="btn btn-danger btn-sm" 
                                    wire:click="delete({{ $supplier->id }})"
                                    onclick="confirm('Apakah kamu yakin ingin menghapus data ini?') || event.stopImmediatePropagation();"
                                >
                                    Hapus
                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <!-- Modal Create Supplier -->
                    <div class="modal fade" id="createSupplierModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <livewire:supplier.supplier-create />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
