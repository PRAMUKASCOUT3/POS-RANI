<div>
    <div class="container mt-4">
        <div class="row">
            <!-- Kolom Cari Member -->
            <div class="col-6 col-sm-4">
                <!-- Cari Produk -->
                <div class="card mb-3 p-3 shadow-sm">
                    <h5 class="text-primary text-base font-semibold">🔍 Cari Produk</h5>
                    <input type="text" class="form-control text-sm" wire:model.live="search_product"
                        placeholder="Masukkan nama produk">
                    <div class="mt-2 max-h-60 overflow-y-auto">
                        @if ($product->isNotEmpty())
                            <ul class="list-group">
                                @foreach ($product as $item)
                                    @if ($item->stock > 0)
                                        <li class="list-group-item d-flex justify-content-between align-items-center text-sm">
                                            <span>{{ $item->name }} - Rp.
                                                {{ number_format($item->price_sell, 0, ',', '.') }} | Stok:
                                                {{ $item->stock }}</span>
                                            <button class="btn btn-primary btn-sm"
                                                wire:click="addItem({{ $item->id }})">Tambah</button>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="flex items-center justify-between p-4 border-t border-blue-gray-50">
                                <p class="block text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                    Page {{ $product->currentPage() }} of {{ $product->lastPage() }}
                                </p>
                                <div class="flex gap-2">
                                    @if ($product->onFirstPage())
                                        <button
                                            class="btn btn-sm btn-outline-dark opacity-50 cursor-not-allowed"
                                            type="button" disabled>
                                            Previous
                                        </button>
                                    @else
                                        <a href="{{ $product->previousPageUrl() }}">
                                            <button
                                                class="btn btn-sm btn-outline-dark">
                                                Previous
                                            </button>
                                        </a>
                                    @endif
                                    @if ($product->hasMorePages())
                                        <a href="{{ $product->nextPageUrl() }}">
                                            <button
                                                class="btn btn-sm btn-outline-dark">
                                                Next
                                            </button>
                                        </a>
                                    @else
                                        <button
                                            class="btn btn-sm btn-outline-dark opacity-50 cursor-not-allowed"
                                            type="button" disabled>
                                            Next
                                        </button>
                                    @endif
                                </div>
                            </div>
                        @else
                            <p class="text-muted text-sm">Tidak ada produk ditemukan.</p>
                        @endif
                    </div>
                </div>
                

               
            </div>


            <!-- Kolom Cari Produk -->
            <div class="col-6 col-sm-8">
                <div class="card mb-3 p-3 shadow-sm">
                    <h5 class="text-success">🛒 Keranjang Belanja</h5>
                    <div class="table-responsive" style="max-height: 300px; overflow-y: auto;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $index => $item)
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td><input type="number" min="1" class="form-control"
                                                wire:model.defer="items.{{ $index }}.stock"
                                                wire:change="updateQuantity({{ $index }}, $event.target.value)">
                                        </td>
                                        <td>Rp. {{ number_format($item['price_sell'] ?? 0, 0, ',', '.') }}</td>
                                        <td>Rp.
                                            {{ number_format(($item['price_sell'] ?? 0) * $item['stock'], 0, ',', '.') }}
                                        </td>
                                        <td><button class="btn btn-danger btn-sm"
                                                wire:click="removeItem({{ $index }})">Hapus</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
<div class="row">
    <div class="col-sm-6">
         <!-- Cari Member -->
         <div class="card p-3 shadow-sm">
            <h5 class="text-primary text-base font-semibold">🔍 Cari Member</h5>
            <input type="text" id="search-member" class="form-control mb-2 text-sm"
                placeholder="Cari nama/kode/telp" wire:model.live="search_member">
            <div class="max-h-60 overflow-y-auto">
                @if ($members->isNotEmpty())
                    <ul class="list-group">
                        @foreach ($members as $member)
                            <li
                                class="list-group-item d-flex justify-content-between align-items-center text-sm">
                                <span>{{ $member->code }} | {{ $member->name }} | Poin:
                                    {{ $member->points }}</span>
                                <button class="btn btn-success btn-sm"
                                    wire:click="selectMember({{ $member->id }})">Pilih</button>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted text-sm">Tidak ada data.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card p-3 shadow-sm">
            <h5 class="text-warning">💰 Total & Pembayaran</h5>
            <div class="d-flex justify-content-between align-items-between">
                <div class="mb-2">Member:
                    <strong>{{ $selected_member ? $selected_member->name : 'Member Kosong' }}</strong></div>
                    <div class="">

                        <input class="form-check-input" type="checkbox" id="usePoints" wire:model="use_points"
                        >
                        <label class="form-check-label" for="usePoints">
                            Gunakan Poin
                        </label>
                    </div>
            </div>

            <div class="mb-2">Total Belanja: <strong>Rp. {{ number_format($subtotal, 0, ',', '.') }}</strong>
            </div>
            <input type="text" class="form-control mb-2" wire:model.live="amount_paid"
                placeholder="Masukkan nominal">
            <div class="mb-2">Kembalian: <strong>Rp. {{ number_format($change, 0, ',', '.') }}</strong></div>
            <div class="d-flex justify-content-end">
                <button class="btn btn-success me-2" wire:click="saveTransaction">Bayar ✅</button>
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Via Bank 🏧
                </button>
            </div>
        </div>
    </div>
</div>
                
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Pembayaran via Bank 🏧</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <!-- Modal Body -->
                <div class="modal-body">
                    <form>
                        <!-- Nama Bank -->
                        <div class="mb-4">
                            <label for="bankName" class="form-label fw-semibold">Nama Bank <i class="fab fa-cc-mastercard"></i></label>
                            <select wire:model="bank" id="bankName" class="form-select" required>
                                <option value="" disabled>== Pilih Bank ==</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BCA">BCA</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="BANK 9">BANK 9</option>
                            </select>
                            @error('bank')
                            <span class="text-danger mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <!-- Nomor Kartu Rekening -->
                        <div class="mb-4">
                            <label for="bankAccount" class="form-label fw-semibold">Nomor Rekening <i class="far fa-credit-card"></i></label>
                            <input type="number" wire:model="number_card" class="form-control" id="bankAccount"
                                placeholder="Masukkan nomor rekening" required>
                            @error('number_card')
                            <span class="text-danger mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>
    
                        <!-- Total dan Pembayaran -->
                        <div class="row g-3 align-items-center">
                            <!-- Total Semua -->
                            <div class="col-md-6">
                                <label for="totalSemua" class="form-label fw-semibold">Total Semua</label>
                                <input id="totalSemua" value="Rp. {{ number_format($subtotal, 0, ',', '.') }}" class="form-control" readonly>
                            </div>
    
                            <!-- Bayar -->
                            <div class="col-md-6">
                                <label for="amountPaid" class="form-label fw-semibold">Bayar</label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" class="form-control" oninput="formatRupiah(this)"
                                        onblur="removeRupiahFormat(this)" wire:model.lazy="amount_paid" required>
                                </div>
                                @error('amount_paid')
                                <span class="text-danger mt-1 d-block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
    
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success" wire:click="ViaBank">
                        Bayar <i class="fas fa-vote-yea"></i>
                    </button>
                </div>
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
