<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="fas fa-plus"></i> Tambah
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Data Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('members.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Nama Member</label>
                        <input type="text" name="name" id="" class="form-control" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="">Nomor Handphone</label>
                        <input type="number" name="phone" id="" class="form-control" required>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
