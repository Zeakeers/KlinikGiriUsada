@extends('backend.layouts.utama')

@section('content9')

<main id="main" class="main">
<div class="pagetitle">
  <h1>Tambah Daftar Layanan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Daftar Layanan</li>
      <li class="breadcrumb-item active">Tambah Daftar Layanan</li>
    </ol>
  </nav>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Daftar Layanan</h2>
            </div>
            
        </div>
    </div>
    <!-- ... kode sebelumnya ... -->
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                

                    <div class="card-body">
                        <form id="formDaftarLayanan" action="{{ route('daftar_layanan.store') }}" method="POST">
                            @csrf
   
                            
                            <strong><label for="katakunci">Cari ID Pasien:</label></strong>
                        <div class="input-group mb-3">
                            
                            <input type="search" name="daftar_idpasien" id="katakunci" class="form-control" placeholder="Cari ID Pasien yang Ingin Didaftarkan"
                            value="{{ Request::get('katakunci') }}">
                            <button id="btnCari" class="input-group-text btn btn-primary" type="button"> Cari</button>
                        </div>

                            <div class="form-group">
                            <strong><label for="daftar_id">Nomor Layanan:</label></strong>
                                <input name="daftar_id" id="daftar_id" rows="2" class="form-control"
                                    value="{{ old('daftar_layanan', $next_nomor_layanan) }}" readonly>
                            </div>

                            <div class="form-group">
                            <strong> <label for="nama_pasien">Nama Pasien:</label><strong>
                                <input name="nama_pasien" id="nama_pasien" rows="3" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="daftar_idjenis">Jenis Layanan:</label>
                                </br>
                                <select name="daftar_idjenis" id="daftar_idjenis">
                                    <option value="">Pilih Jenis Layanan</option>
                                    @foreach ($list_jenis_layanan as $data)
                                    <option value="{{ $data->jenis_id }}">{{ $data->jenis_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="daftar_tanggal">Tanggal Daftar:</label>
                                <input type="datetime-local" name="daftar_tanggal" id="daftar_tanggal" class="form-control" 
                                value="{{ date('Y-m-d H:i:s') }}">
                            </div>

                            <div class="form-group">
                                <label for="daftar_status">Status:</label>
                                </br>
                                <select name="daftar_status" id="stts">
                                    <option value="pilih">Pilih Status</option>                      
                                    <option value="BERLANGSUNG">BERLANGSUNG</option>
                                    
                                </select>
                            </div>
                        
                        </br>
                        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Terjadi kesalahan saat input data.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
                            <!-- ... form-group dan input lainnya ... -->
                            <form id="formDaftarLayanan" action="{{ route('daftar_layanan.store') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                {{ __('Simpan') }}
                            </button>
                            <a href="{{ route('layanan.index') }}" class="btn btn-secondary">{{ __('Kembali') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#btnCari').on('click', function() {
            var idPasien = $('#katakunci').val();

            $.ajax({
                url: '{{ route('daftar_layanan.cari_pasien', ['pasien_id' => '']) }}' + '/' + idPasien,
                type: 'GET',
                success: function(response) {
                    if (response.success) {
                        $('#nama_pasien').val(response.pasien.pasien_nama);
                    } else {
                        $('#nama_pasien').val(''); 
                        alert('Pasien tidak ditemukan');
                    }
                },
                error: function(xhr, status, error) {
                console.log(xhr.responseText);
                alert('Terjadi kesalahan dalam memproses permintaan');
            }
        });
    });
});
</script>
@endsection