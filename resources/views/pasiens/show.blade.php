@extends('backend/layouts.utama')

@section('content')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>Detail Pasien</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Detail Pasien</li>
      </ol>
    </nav>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">{{ __('Detail Pasien') }}</div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <td><strong>Nama:</strong></td>
                  <td>{{ $pasiens->pasien_nama }}</td>
                </tr>
                <tr>
                  <td><strong>NIK:</strong></td>
                  <td>{{ $pasiens->pasien_nik }}</td>
                </tr>
                <tr>
                  <td><strong>Tanggal Lahir:</strong></td>
                  <td>{{ $pasiens->tanggal_lahir }}</td>
                <tr>
                  <td><strong>Umur:</strong></td>
                  <td>
                        @php
                            // Menghitung umur berdasarkan tanggal lahir
                            $umur = now()->diff($pasiens->tanggal_lahir)->y;
                            echo $umur;
                        @endphp
                  </td>
                </tr>
                <tr>
                  <td><strong>Alamat:</strong></td>
                  <td>{{ $pasiens->pasien_alamat }}</td>
                </tr>
                <tr>
                  <td><strong>Jenis Kelamin:</strong></td>
                  <td>{{ $pasiens->pasien_gender }}</td>
                </tr>
                
                  
                </tr>
              </tbody>
            </table>
          </div>
          <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('pasiens.tampil') }}">Kembali</a>
            <button onclick="printPasien({{ $pasiens->pasien_id }})" class="btn btn-success">Cetak Kartu Berobat</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
    function printPasien(pasien_Id) {
        window.open('/cetak_pasien/' + pasien_Id, '_blank');
    }
</script>
@endsection