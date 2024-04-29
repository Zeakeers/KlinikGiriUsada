@extends('backend/layouts.utama')

@section('content')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Detail Transaksi Beli Obat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active">Detail Transaksi Beli Obat</li>
      </ol>
    </nav>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">{{ __('Detail Transaksi Beli Obat') }}</div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <td><strong>ID Transaksi</strong></td>
                  <td>: {{ $transaksiBeli->id }}</td>
                </tr>
                <tr>
                  <td><strong>Nama Obat</strong></td>
                  <td>: {{ $transaksiBeli->nama_obat }}</td>
                </tr>
                <tr>
                  <td><strong>Kode Obat</strong></td>
                  <td>: {{ $transaksiBeli->kode_obat }}</td>
                </tr>
                <tr>
                  <td><strong>Tanggal Transaksi</strong></td>
                  <td>: {{ $transaksiBeli->tanggal_trans }}</td>
                </tr>
                <tr>
                  <td><strong>Harga</strong></td>
                  <td>: Rp {{ number_format($transaksiBeli->harga, 2, ',','.') }}</td>
                </tr>
                <tr>
                  <td><strong>Jumlah</strong></td>
                  <td>: {{ $transaksiBeli->jumlah_stock }}</td>
                </tr>
                <tr>
                  <td><strong>Sub Toltal</strong></td>
                  <td> 
                      <span id="subtotal_{{ $transaksiBeli->id }}">
                                : Rp {{ number_format($transaksiBeli->harga * $transaksiBeli->jumlah_stock, 2, ',', '.') }}
                      </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('daftar.transaksiBeli') }}">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- <script>
    function printTransaksi(transaksiId) {
        window.open('/cetak_transaksi/' + transaksiId, '_blank');
    }
</script> -->
@endsection