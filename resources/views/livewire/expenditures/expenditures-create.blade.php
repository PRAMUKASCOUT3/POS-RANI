<div>
    <div class="modal-header bg-primary">
        <h4 class="modal-title text-white">Data Baru</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
    </div>

    <div class="modal-body">
        <form wire:submit.prevent="save">
            <div class="mb-3">
                <label>Tanggal <i class="fas fa-calendar-alt"></i></label>
                <input type="date" class="form-control" wire:model="date" required>
                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Deskripsi Pengeluaran <i class="fas fa-paragraph"></i></label>
                <textarea wire:model='description' class="form-control" cols="10"></textarea>
                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Nominal Pengeluaran <i class="fas fa-dollar-sign"></i></label>
                <input 
                type="text" 
                class="form-control" 
                oninput="formatRupiah(this)" 
                onblur="removeRupiahFormat(this)" 
                wire:model.lazy="nominal" 
                required
            >
                @error('nominal') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-2">Simpan</button>
        </form>
    </div>
    <script>
        // Format input to Rupiah format
        function formatRupiah(input) {
            let value = input.value.replace(/[^,\d]/g, ''); // Remove non-numeric characters
            let formatted = new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 0,
            }).format(value.replace(/,/g, '')); // Add thousands separator
            input.value = formatted;
        }
    
        // Remove Rupiah format before submitting
        function removeRupiahFormat(input) {
            input.value = input.value.replace(/\./g, ''); // Remove dots
        }
    </script>
</div>
