
@extends('backend/layouts.utama')  
@section('content6')
<main id="main" class="main">
<div class="pagetitle">
<div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Rekam Medis Pasien</h2>
            </div>
  <nav>
    <ol class="breadcrumb">
      <l i class="breadcrumb-item"><a href="index.html">Home  /</a></li>
      <li class="breadcrumb-item active">Rekam medis</li>
    </ol>
  </nav>
</div>

 <!-- FORM PENCARIAN -->
 <div class="pb-3">
                  <form class="d-flex" action="{{ url('rekam_medis') }}" method="get">
                      <input class="form-control me-1" type="search" name="cari" value="{{ Request::get('cari') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>

</br>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('rekam_medis.create') }}"> Tambah Rekam Medis Pasien</a>
            </div>

</br>
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

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            </div>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2>Daftar Pasien</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach ($rekammedis as $rekammedis)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <h5 class="card-title"> {{ $rekammedis->pasien_nama }}</h5>
                                        <p class="card-text">{{ $rekammedis->rekam_tanggal }}</p>
                                        <p class="card-text">{{ $rekammedis->pasien_alamat }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                
                                          
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <a href="{{ route('rekam_medis.show', $rekammedis->rekam_id) }}" class="btn btn-primary btn-sm">Detail</a>
                                        
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- <table class="table table-bordered">
        <thead>
            <tr>
                <th>Pasien Id</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody> -->
       
      

 
@endsection
