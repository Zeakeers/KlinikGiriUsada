@extends('backend.layouts.utama')

@section('content15')

<main id="main" class="main">
<div class="pagetitle">
  <h1>Ubah Daftar Layanan</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Daftar Layanan</li>
      <li class="breadcrumb-item active">Ubah Daftar Layanan</li>
    </ol>
  </nav>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ubah Daftar Layanan</h2>
            </div>
            
        </div>
    </div>
    <!-- ... kode sebelumnya ... -->
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-8">
                <div class="card">
                 

                    <div class="card-body">
                        <form id="formUpdateLayanan" action="{{ route('daftar_layanan.update', $daftar_layanan->daftar_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                            <strong> <label for="daftar_id">Nomor Layanan:</label><strong>
                                <input name="daftar_id" id="daftar_id" rows="2" class="form-control"
                                    value="{{ $daftar_layanan->daftar_id }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama_pasien">Nama Pasien:</label>
                                <input name="nama_pasien" id="nama_pasien" rows="3" class="form-control" value="{{ $daftar_layanan->pasien->pasien_nama }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="daftar_idjenis">{{ __('Jenis Layanan:') }}</label></br>
                                <select name="daftar_idjenis" id="daftar_idjenis">
                                    <option value="">Pilih Jenis Layanan</option>
                                    @foreach ($list_jenis_layanan as $data)
                                    <option value="{{ $data->jenis_id }}" {{ $daftar_layanan->daftar_idjenis == $data->jenis_id ? 'selected' : '' }}>{{ $data->jenis_layanan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="daftar_tanggal">{{ __('Tanggal Daftar:') }}</label>
                                <input type="datetime-local" name="daftar_tanggal" id="daftar_tanggal" class="form-control" value="{{ $daftar_layanan->daftar_tanggal }}">
                            </div>

                            <div class="form-group">
                                <label for="daftar_status">{{ __('Status:') }}</label></br>
                                <select name="daftar_status" id="stts">
                                    <option value="pilih">Pilih Status</option>
                                    <option value="BERLANGSUNG" {{ $daftar_layanan->daftar_status == 'BERLANGSUNG' ? 'selected' : '' }}>BERLANGSUNG</option>
                                    
                                    <option value="BATAL" {{ $daftar_layanan->daftar_status == 'BATAL' ? 'selected' : '' }}>BATAL</option>
                                </select>
                            </div>
                        
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
                            </br>



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
@endsection
