@extends('backend/layouts.utama')

@section('content')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Detail Transaksi Jual Obat</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
        <li class="breadcrumb-item active">Detail Transaksi Jual Obat</li>
      </ol>
    </nav>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">{{ __('Detail Transaksi Jual Obat') }}</div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <td><strong>ID Transaksi:</strong></td>
                  <td>{{ $transaksiObat->id }}</td>
                </tr>
                <tr>
                  <td><strong>Nama Pasien:</strong></td>
                  <td>{{ $transaksiObat->nama_pasien }}</td>
                </tr>
                <tr>
                  <td><strong>Tanggal Transaksi:</strong></td>
                  <td>{{ $transaksiObat->tanggal_trans }}</td>
                </tr>
                <tr>
                  <td><strong>Jumlah:</strong></td>
                  <td>{{ $transaksiObat->jumlah }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('daftar.transaksi') }}">Kembali</a>
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