@extends('backend/layouts.utama')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Daftar Transaksi Beli Obat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active">Daftar Transaksi Beli Obat</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Data Transaksi Beli Obat</h2>
                </div>
            </div>
        </div>
        <br>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <script>
                setTimeout(function() {
                    $(".alert").alert('close');
                }, 3000);
            </script>
        @endif

        <!-- Formulir Pencarian -->
        <form class="mb-3" action="{{ route('transaksiBeli.cari') }}" method="get">
            <div class="row">
                <div class="col-md-3">
                    <label for="cari_nama" class="form-label">Nama Obat:</label>
                    <input class="form-control" type="text" name="cari_nama" value="{{ request('cari_nama') }}" placeholder="Masukkan Nama Obat Atau Kode Obat">
                </div>

                <div class="col-md-3">
                    <label for="cari_tanggal" class="form-label">Tanggal Transaksi:</label>
                    <div class="d-flex">
                        <select class="form-control me-2" name="cari_tanggal" id="cari_tanggal">
                            <option value="">Pilih Tanggal</option>
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}" {{ request('cari_tanggal') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>

                        <select class="form-control me-2" name="cari_bulan" id="cari_bulan">
                            <option value="">Pilih Bulan</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ request('cari_bulan') == $i ? 'selected' : '' }}>{{ date("F", mktime(0, 0, 0, $i, 1)) }}</option>
                            @endfor
                        </select>

                        <select class="form-control me-2" name="cari_tahun" id="cari_tahun">
                            <option value="">Pilih Tahun</option>
                            @for ($i = 2015; $i <= 2100; $i++)
                                <option value="{{ $i }}" {{ request('cari_tahun') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        
                    </div>
                </div>


                <div class="col-md-3">
                    <label for="cari_mulai" class="form-label">Mulai:</label>
                    <input type="date" class="form-control" name="cari_mulai" value="{{ request('cari_mulai') }}">
                </div>
                <div class="col-md-3">
                    <label for="cari_selesai" class="form-label">Selesai:</label>
                    <input type="date" class="form-control" name="cari_selesai" value="{{ request('cari_selesai') }}">
                </div>
            </div>
            <div class="mb-3">
                <br>
                <button type="submit" class="btn btn-primary">Cari</button>
                <a class="btn btn-success" href="{{ route('daftar.transaksiBeli') }}">Refresh</a>
                <a class="btn btn-secondary" href="{{ route('apotek.tampil') }}">Kembali</a>
            </div>
        </form>

        <table class="table table-bordered">
            <thead class="table-success">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Tanggal Transaksi</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Sub Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $grandTotal = 0;
                @endphp
                @foreach ($transaksiBeli as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->kode_obat }}</td>
                        <td>{{ $transaksi->nama_obat }}</td>
                        <td>{{ $transaksi->tanggal_trans }}</td>
                        <td>Rp {{ number_format($transaksi->harga, 2, ',', '.') }}</td>
                        <td>{{ $transaksi->jumlah_stock }}</td>
                        <td>
                            <span id="subtotal_{{ $transaksi->id }}">
                                Rp {{ number_format($transaksi->harga * $transaksi->jumlah_stock, 2, ',', '.') }}
                            </span>
                            @php
                                $grandTotal += $transaksi->harga * $transaksi->jumlah_stock;
                            @endphp
                        </td>
                        <td>
                            <a href="{{ route('transaksiBeli.detail', $transaksi->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('transaksiBeli.edit', $transaksi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- <form action="{{ route('transaksiBeli.hapus', $transaksi->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                            </form> -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6" class="text-end"><strong>Total Keseluruhan:</strong></td>
                    <td><strong>Rp {{ number_format($grandTotal, 2, ',', '.') }}</strong></td>
                    <td></td> <!-- Kolom Aksi -->
                </tr>
            </tfoot>
        </table>
    </main>
@endsection
