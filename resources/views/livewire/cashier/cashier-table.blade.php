<div>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <!-- Pencarian Barang -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-2 border border-primary">
                            <h5 class="card-header bg-primary text-white"><i class="fas fa-search"></i> Cari Member </h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" id="search-member" class="form-control mt-3"
                                        placeholder="Masukkan nama, kode, atau telepon member"
                                        wire:model.live="search_member">
                                </div>
                            </div>
                        </div>
                        <div class="card border border-primary mt-3">
                            <h5 class="card-header bg-primary text-white"><i class="fas fa-list"></i> Hasil Pencarian
                                Member</h5>
                            <div class="card-body" style="height: 400px; overflow-y: auto;">
                                @if ($members->isNotEmpty())
                                    <ul class="list-group mt-4">
                                        @foreach ($members as $member)
                                            <li
                                                class="list-group-item d-flex justify-content-between align-items-center">
                                                <span>
                                                    {{ $member->code }} | {{ $member->name }} | Poin:
                                                    {{ $member->points }}
                                                </span>
                                                <button class="btn btn-primary btn-sm"
                                                    wire:click="selectMember({{ $member->id }})">
                                                    <i class="fas fa-check"></i> Pilih
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div class="mt-3">
                                        {{ $members->links() }}
                                    </div>
                                @else
                                    <p class="mt-2">Tidak ada member ditemukan.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card mb-2 border border-primary">
                            <h5 class="card-header bg-primary text-white"><i class="fas fa-search"></i> Cari Produk
                            </h5>
                            <div class="card-body">
                                <div class="form-group">
                                    <input type="text" id="search-product" class="form-control mt-3"
                                        placeholder="Masukkan nama produk" wire:model.live="search_product">
                                </div>
                            </div>
                        </div>
                        <div class="card border border-primary">
                            <h5 class="card-header bg-primary text-white"><i class="fas fa-list"></i> Hasil Pencarian
                                Produk
                            </h5>
                            <div class="card-body" style="height: 400px; overflow-y: auto;">
                                @if ($product->isNotEmpty())
                                    <ul class="list-group mt-3">
                                        @if ($product->isNotEmpty())
                                            <ul class="list-group mt-3">
                                                @foreach ($product as $item)
                                                    @if ($item->stock > 0)
                                                        <!-- Cek apakah stok lebih dari 0 -->
                                                        <li
                                                            class="list-group-item d-flex justify-content-between align-items-center">
                                                            @if ($item->unit == 'Pcs')
                                                                <span>
                                                                    {{ $item->name }} - Rp.
                                                                    {{ number_format($item->price_sell, 0, ',', '.') }}
                                                                    |
                                                                    Stok: {{ $item->stock }}
                                                                </span>
                                                            @else
                                                                <span>
                                                                    {{ $item->name }} - Rp.
                                                                    {{ number_format($item->price_kg, 0, ',', '.') }} |
                                                                    Stok: {{ $item->stock }}
                                                                </span>
                                                            @endif
                                                            <button class="btn btn-primary btn-sm"
                                                                wire:click="addItem({{ $item->id }})">
                                                                <i class="fas fa-plus"></i> Tambah
                                                            </button>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>

                                            <!-- Pagination Links -->
                                            <div class="mt-3">
                                                {{ $product->links() }}
                                            </div>
                                        @else
                                            <p class="mt-2">Tidak ada produk ditemukan.</p>
                                        @endif

                                    </ul>
                                @else
                                    <p class="mt-2">Tidak ada produk ditemukan.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table remains fixed below -->
                <div class="row border border-primary rounded mt-4">
                    <div class="card-header bg-primary rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="text-white">KASIR <i class="fas fa-cash-register"></i></h4>
                            <button class="btn btn-danger" wire:click="clear"><i class="fas fa-sync-alt"></i> RESET
                                KERANJANG</button>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                <!-- Pilihan Member -->
                                <table class="table table-bordered mt-4">
                                    <thead>
                                        <tr>
                                            <th>Nama Produk <i class="fas fa-file-signature"></i></th>
                                            <th>Jumlah <i class="fab fa-unity"></i></th>
                                            <th>Harga <i class="fas fa-dollar-sign"></i></th>
                                            <th>Total <i class="fas fa-funnel-dollar"></i></th>
                                            <th>Aksi <i class="fas fa-cogs"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $index => $item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>
                                                    <input type="number" min="0.1" step="0.1"
                                                        wire:model.defer="items.{{ $index }}.stock"
                                                        wire:change="updateQuantity({{ $index }}, $event.target.value)"
                                                        class="form-control">
                                                </td>
                                                @if (isset($item['unit']) && $item['unit'] == 'Pcs')
                                                    <td>Rp. {{ number_format($item['price_sell'] ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td>Rp.
                                                        {{ number_format(($item['price_sell'] ?? 0) * $item['stock'], 0, ',', '.') }}
                                                    </td>
                                                @else
                                                    <td>Rp. {{ number_format($item['price_kg'] ?? 0, 0, ',', '.') }}
                                                    </td>
                                                    <td>Rp.
                                                        {{ number_format(($item['price_kg'] ?? 0) * $item['stock'], 0, ',', '.') }}
                                                    </td>
                                                @endif


                                                <td>
                                                    <button class="btn btn-danger btn-sm"
                                                        wire:click="removeItem({{ $index }})">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <!-- Informasi Total Belanja -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <!-- Dropdown Member -->
                                    @if ($selected_member)
                                        <div class="mt-3">
                                            <label for="member" class="form-label">Member</label>
                                            <input type="text" id="member" class="form-control"
                                                value="{{ $selected_member->name }}" readonly>
                                        </div>
                                    @endif

                                    <!-- Total Semua -->
                                    <div>
                                        <label for="totalSemua">Total Semua</label>
                                        <input id="totalSemua" value="Rp. {{ number_format($subtotal, 0, ',', '.') }}"
                                            class="form-control" readonly>
                                    </div>

                                    <!-- Bayar -->
                                    <div>
                                        <label for="amountPaid">Bayar</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" wire:model.live="amount_paid" class="form-control"
                                                id="amountPaid" placeholder="0">
                                        </div>
                                    </div>

                                    <!-- Kembalian -->
                                    <div>
                                        <label for="kembali">Kembalian</label>
                                        <input id="kembali" value="Rp. {{ number_format($change, 0, ',', '.') }}"
                                            class="form-control" readonly>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <!-- Tombol Poin Digunakan -->
                                    <div>
                                        <label class="form-label">Gunakan Poin</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="usePoints"
                                                wire:model="use_points">
                                            <label class="form-check-label" for="usePoints">
                                                Ya, gunakan poin untuk potongan harga
                                            </label>
                                        </div>
                                    </div>
                                </div>


                                <!-- Tombol Bayar dan Reset -->
                                <input type="text" wire:model='user_id' hidden>
                                <div class="mt-3 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Via Bank <i class="fas fa-money-check"></i>
                                    </button>
                                    <button class="btn btn-success" wire:click="saveTransaction">Bayar <i
                                            class="fas fa-vote-yea"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" wire:ignore.self>
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Pembayaran via Bank <i
                                        class="fas fa-money-check"></i></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="bankName" class="form-label">Nama Bank <i
                                                class="fab fa-cc-mastercard"></i></label>
                                        <select wire:model="bank" id="bankName" class="form-control">
                                            <option value="">==Pilih Bank==</option>
                                            <option value="MANDIRI">MANDIRI</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BANK 9">BANK 9</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="bankAccount" class="form-label">Nomor Kartu Rekening <i
                                                class="far fa-credit-card"></i></label>
                                        <input type="number" wire:model="number_card" class="form-control"
                                            id="bankAccount" placeholder="Masukkan nomor rekening">
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="me-2">
                                            <label for="totalSemua">Total Semua</label>
                                            <input id="totalSemua"
                                                value="Rp. {{ number_format($subtotal, 0, ',', '.') }}"
                                                class="form-control" readonly>
                                        </div>
                                        <div>
                                            <label for="amountPaid">Bayar</label>
                                            <div class="d-flex align-items-center me-2">
                                                <span class="input-group-text">Rp.</span>
                                                <input type="text" class="form-control"
                                                    oninput="formatRupiah(this)" onblur="removeRupiahFormat(this)"
                                                    wire:model.lazy="amount_paid" required>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Tutup</button>
                                <button class="btn btn-success" wire:click="ViaBank">Bayar <i
                                        class="fas fa-vote-yea"></i></button>
                            </div>
                        </div>
                    </div>
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
