@extends('backend/layouts.utama')

@section('content15')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Transaksi Obat-obatan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item active">Transaksi Obat-obatan</li>
            </ol>
        </nav>
    </div>
    <h2>Daftar Barang Obat</h2>
    <div class="mb-3">
        <form class="d-flex" action="{{ route('search_obat') }}" method="get">
            <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}" placeholder="Masukkan Nama Obat Atau Kode Obat" aria-label="Search">
            <button class="btn btn-secondary" type="submit">Cari</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif 

    <div class="row">
        <div class="col-lg-6">
            <div class="mb-3">
                <a href="{{ route('apotek.create') }}" class="btn btn-primary">Tambah Barang</a>
                <a href="{{ route('daftar.transaksiBeli') }}"class="btn btn-secondary">Riwayat Pembelian</a>
                <a href="{{ route('daftar.transaksi') }}" class="btn btn-secondary">Riwayat Penjualan</a>
            </div>
            <div class="mb-3">
                <form action="{{ route('transaksi_obat.store') }}" method="post">
                    @csrf
                    <label for="patient_name" class="form-label">Nama Pasien:</label>
                    <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" required placeholder="Masukkan Nama Pasien">
                    <!-- ... (tambahkan input lainnya sesuai kebutuhan) -->
                </form>
            </div>
            <table class="table table-bordered">
                <thead class="table-success text-center">
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Harga</th>
                        <th>Jumlah Stock</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangObat as $barang)
                        @if ($barang->status == 1)
                            <tr data-name="{{ $barang->nama }}" data-price="{{ $barang->harga }}">
                                <td>{{ $barang->kode_obat }}</td>
                                <td>{{ $barang->nama }}</td>
                                <td>Rp {{ number_format($barang->harga, 2, ',', '.') }}</td>
                                <td>{{ $barang->jumlah_stock }}</td>
                                <td class="d-flex justify-content-center">
                                    <button class="btn btn-success btn-sm mx-2" onclick="addToCart('{{ $barang->nama }}', {{ $barang->harga }}, {{ $barang->id }})">Tambah ke Keranjang</button>
                                    <form action="{{ route('apotek.destroy', ['id' => $barang->id, 'status' => 'nonaktif','jumlah_stock' => 'nonaktif']) }}" method="POST">
                                        <button type="submit" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" name="status" value="nonaktif">Hapus</button>
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('apotek.editObat', $barang->id) }}" class="btn btn-warning btn-sm ml-2">Edit</a>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="5">Tidak ada data BarangObat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <h2>Keranjang</h2>
            <form action="{{ route('transaksi_obat.store') }}" method="POST" onsubmit="return validateForm()">
                @csrf
                <input type="hidden" name="nama_pasien" id="nama_pasien" required placeholder="Masukkan Nama Pasien">
                <input type="hidden" name="tanggal_trans" value="{{ now() }}">
                <table class="table table-bordered" id="table-keranjang">
                    <thead class="table-primary">
                        <tr>
                            <th>Nama Obat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                            <th>ID</th>
                        </tr>
                    </thead>
                    <tbody id="cart-body">
                        <!-- Isi tabel keranjang akan ditambahkan melalui JavaScript -->
                    </tbody>
                </table>
                <div id="total">Total: Rp 0</div>
                <button type="submit" class="btn btn-primary">Proses Transaksi</button>
            </form>
        </div>
    </div>
</main>

<script>
    function addToCart(name, price, idBarang) {
        var cartBody = document.getElementById('cart-body');
        var totalDiv = document.getElementById('total');

        var existingRow = findRowByName(cartBody, name);

        if (existingRow) {
            var quantityInput = existingRow.cells[2].getElementsByTagName('input')[0];
            quantityInput.value = parseInt(quantityInput.value) + 1;
        } else {
            var newRow = cartBody.insertRow();
            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            cell1.innerHTML = name;
            cell2.innerHTML = price;
            cell3.innerHTML = '<input type="number" name="jumlah[]" value="1" min="1" required>';
            cell4.innerHTML = '<button class="btn btn-danger btn-sm" onclick="removeFromCart(this)">Hapus</button>';
            cell5.innerHTML = '<input type="text" name="id_barang[]" value="' + idBarang + '" min="1" required>';
        }

        var total = calculateTotal(cartBody);
        totalDiv.innerHTML = 'Total: Rp ' + total;

        // Update nilai input tersembunyi 'keranjang' saat barang ditambahkan
        updateHiddenInput(cartBody);
    }

    function removeFromCart(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        var cartBody = document.getElementById('cart-body');
        var totalDiv = document.getElementById('total');
        var total = calculateTotal(cartBody);
        totalDiv.innerHTML = 'Total: Rp ' + total;

        // Update nilai input tersembunyi 'keranjang' saat barang dihapus
        updateHiddenInput(cartBody);
    }

    function findRowByName(table, name) {
        for (var i = 0; i < table.rows.length; i++) {
            if (table.rows[i].cells[0].innerHTML === name) {
                return table.rows[i];
            }
        }
        return null;
    }

    function calculateTotal(table) {
        var total = 0;
        for (var i = 0; i < table.rows.length; i++) {
            total += parseInt(table.rows[i].cells[1].innerHTML) * parseInt(table.rows[i].cells[2].getElementsByTagName('input')[0].value);
        }
        return total;
    }

    // Fungsi untuk memperbarui nilai input tersembunyi 'keranjang'
    function updateHiddenInput(cartBody) {
        var items = [];

        for (var i = 0; i < cartBody.rows.length; i++) {
            var name = cartBody.rows[i].cells[0].innerHTML;
            var price = cartBody.rows[i].cells[1].innerHTML;
            var quantity = cartBody.rows[i].cells[2].getElementsByTagName('input')[0].value;

            items.push({
                name: name,
                price: price,
                quantity: quantity
            });
        }

        var hiddenInput = document.getElementById('keranjang');
        hiddenInput.value = JSON.stringify(items);
    }

    // Fungsi untuk validasi formulir sebelum pengiriman
    function validateForm() {
        var cartBody = document.getElementById('cart-body');
        if (cartBody.rows.length === 0) {
            alert('Keranjang masih kosong. Silakan tambahkan barang ke keranjang.');
            return false; // Menghentikan pengiriman formulir jika keranjang kosong
        }
        return true; // Lanjutkan pengiriman formulir jika keranjang tidak kosong
    }
</script>

@endsection
