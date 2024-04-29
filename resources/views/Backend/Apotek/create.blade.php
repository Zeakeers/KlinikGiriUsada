@extends('backend/layouts.utama')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Tambah Data Barang Obat</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                <li class="breadcrumb-item"><a href="#">Data Barang Obat</a></li>
                <li class="breadcrumb-item active">Tambah Data Barang Obat</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Data Barang Obat</h2>
            </div>
        </div>
    </div>

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

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
        </script>
    @endif 
    <form action="{{ route('barang_obat.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_obat">Kode Obat:</label>
            <input type="text" class="form-control" id="kode_obat" name="kode_obat" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama Obat:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="harga">Harga:</label>
            <input type="number" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
            <label for="jumlah_stock">Jumlah Stock:</label>
            <input type="number" class="form-control" id="jumlah_stock" name="jumlah_stock" required>
        </div>
        <br>
       
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a class="btn btn-secondary" href="{{ route('apotek.tampil') }}">Kembali</a>
    </form>
</main>
@endsection
