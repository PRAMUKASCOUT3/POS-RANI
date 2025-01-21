<div>
    <div class="container mt-4">
        <div class="card">
            <h5 class="card-header bg-primary text-white">Data Baru</h5>
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <input type="text" wire:mode="code" hidden>
                    <div class="mt-3">
                        <label class="mb-2" for="category_id">Kategori Produk <i class="fas fa-clipboard-list"></i></label>
                        <select wire:model="category_id" id="category_id" class="form-control">
                            <option value="">==Pilih Kategori Produk==</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2" for="name">Nama Produk <i class="fas fa-file-signature"></i></label>
                        <input type="text" class="form-control" wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2" for="brand">Merk Produk <i class="fas fa-tag"></i></label>
                        <input type="text" class="form-control" wire:model="brand">
                        @error('brand')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2">Stok</label>
                        <input type="number" class="form-control" wire:model="stock">
                        @error('stock') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2">Harga Beli</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        oninput="formatRupiah(this)" 
                        onblur="removeRupiahFormat(this)" 
                        wire:model.lazy="price_buy" 
                        required
                    >
                        @error('price_buy') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2">Harga Jual</label>
                        <input 
                        type="text" 
                        class="form-control" 
                        oninput="formatRupiah(this)" 
                        onblur="removeRupiahFormat(this)" 
                        wire:model.lazy="price_sell" 
                        required
                    >
                        @error('price_sell') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2">Berat (gram)</label>
                        <input type="number" class="form-control" wire:model.live="weight">
                        @error('weight') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="mt-3">
                        <label class="mb-2">Harga Per Kilo</label>
                        <input type="number" class="form-control" wire:model="price_kg" readonly>
                    </div>
                    <div class="mt-3">
                        <label class="mb-2" for="unit">Pilih Satuan Barang <i class="fab fa-unity"></i></label>
                        <select class="form-control" id="unit" wire:model="unit">
                            <option value="">==Pilih Satuan Barang==</option>
                            <option value="Pcs (Pieces)">Pcs (Pieces)</option>
                            <option value="Kg (Kilogram)">Kg (Kilogram)</option>
                        </select>
                        @error('unit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>
            </div>
        </div>
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
