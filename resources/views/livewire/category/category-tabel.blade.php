<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Kategori <i class="fas fa-clipboard-list"></i></h5>
                <div>
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createSupplierModal"><i
                            class="fas fa-plus"></i> Tambah Kategori</button>
                    <table id="example" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori <i class="fas fa-file-signature"></i></th>
                                <th>Aksi <i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $no => $item)
                                <tr>
                                    <td>{{ ++$no }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('category.edit', $item->id) }}"
                                                class="btn btn-info btn-sm me-2">Edit</a>
                                            <form id="deleteForm{{ $item->id }}" class="d-inline"
                                                action="{{ route('category.delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="confirmDelete({{ $item->id }})">Hapus</button>
                                            </form>
                                        </div>
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
