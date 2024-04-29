@extends('backend/layouts.utama')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Edit Transaksi Beli Obat</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('apotek.tampil') }}">Daftar Transaksi Jual Obat</a></li>
                    <li class="breadcrumb-item active">Edit Transaksi</li>
                </ol>
            </nav>
        </div>

        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Transaksi</h2>
                </div>
            </div>
        </div>
        <br>

        <!-- Formulir Edit Transaksi di sini -->
        <form action="{{ route('transaksibeli.update', $transaksiBeli->id) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Tambahkan input dan field lain yang diperlukan untuk edit -->

            <!-- Ganti nama form-group dengan yang sesuai -->
            <div class="form-group">
                <label for="nama_obat">Nama Obat:</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ $transaksiBeli->nama_obat }}" required>
            </div>
            <div class="form-group">
                <label for="kode_obat">Kode Obat:</label>
                <input type="text" class="form-control" id="kode_obat" name="kode_obat" value="{{ $transaksiBeli->kode_obat }}" required>
            </div>

            <div class="form-group">
                <label for="tanggal_trans">Tanggal Transaksi:</label>
                <input type="date" class="form-control" id="tanggal_trans" name="tanggal_trans" value="{{ $transaksiBeli->tanggal_trans }}" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $transaksiBeli->harga }}" required>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah_stock" name="jumlah_stock" value="{{ $transaksiBeli->jumlah_stock }}" required>
            </div>

            <!-- <div class="form-group">
                <label for="subtotal">Sub Total:</label>
                <input type="number" class="form-control" id="" name="jumlah" value="{{ $transaksiBeli->jumlah }}" required>
            </div> -->
            <br>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a class="btn btn-secondary" href="{{ route('daftar.transaksiBeli') }}">Batal</a>
        </form>
    </main>
@endsection