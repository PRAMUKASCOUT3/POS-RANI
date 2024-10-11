<div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Data Pengguna / Kasir <i class="fas fa-users"></i>
                </h5>
                <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createSupplierModal"><i class="fas fa-plus"></i> Tambah Pengguna</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Kasir <i class="fas fa-code"></i></th>
                                <th>Nama Pengguna / Kasir <i class="fas fa-users"></i></th>
                                <th>Email <i class="fas fa-envelope"></i></th>
                                <th>Aksi <i class="fas fa-cogs"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                                <tr>
                                    <td class="text-bold-500">{{ $index + 1 }}</td>
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('pengguna.edit',$user->id) }}"
                                            class="btn btn-info btn-sm ">Edit</a>
                                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $user->id }})"
                                            onclick="confirm('Apakah kamu yakin ingin menghapus data ini?') || event.stopImmediatePropagation();">
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
                                <livewire:user.user-create />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>