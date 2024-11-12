<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Kategori <i class="fas fa-clipboard-list"></i></h5>
                <div>
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createSupplierModal"><i class="fas fa-plus"></i> Tambah Kategori</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Kategori <i class="fas fa-file-signature"></i></th>
                                <th>Aksi <i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href="{{ route('category.edit',$item->id) }}" class="btn btn-info btn-sm ">Edit</a>
                                    <button 
                                    class="btn btn-danger btn-sm" 
                                    wire:click="delete({{ $item->id }})"
                                    onclick="confirm('Apakah kamu yakin ingin menghapus data ini?') || event.stopImmediatePropagation();"
                                >
                                    Hapus
                                </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <div class="modal fade" id="createSupplierModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <livewire:category.category-create />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
