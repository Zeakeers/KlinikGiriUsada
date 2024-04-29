@extends('backend/layouts.utama')

@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Menu Utama</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item active">Menu Utama</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">

        <!-- Sales Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

         

            <div class="card-body">
              <h5 class="card-title">Jumlah Pasien</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-person-lines-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlahPasienHariIni }}</h6>
                  <span class="text-primary small pt-1 fw-bold">Terdaftar</span> 
                  <!-- <span class="text-muted small pt-2 ps-1">increase</span> -->

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Revenue Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">


            <div class="card-body">
              <h5 class="card-title">Pengumuman</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-card-heading"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlahPengumuman }}</h6>
                  <span class="text-success small pt-1 fw-bold">Aktif</span>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">


            <div class="card-body">
              <h5 class="card-title">Jumlah Pekerja</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people-fill"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $jumlahPekerja }}</h6>
                  <span class="text-warning small pt-1 fw-bold">Anggota</span>

                </div>
              </div>

            </div>
          </div>

        </div><!-- End Customers Card -->


        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Pilih</h6>
                </li>

                <li><a class="dropdown-item" href="#">Perhari</a></li>
                <li><a class="dropdown-item" href="#">Perbulan</a></li>
                <li><a class="dropdown-item" href="#">Pertahun</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Laporan Kunjungan Pasien</span></h5>

              <table class="table table-bordered">
        <thead class="table-success ">
      

            <tr class="text-center" >
          
            <th scope="col">No.</th>
                <th scope="col">Nomor Layanan</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Jenis Layanan</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
        @php
    $no =1;
    @endphp
            @foreach($layanan as $layanan)
            <tr>
            <th class="text-center" scope="row">{{ $no++ }}</th>
                <th class="text-center">{{ $layanan->pasien->pasien_id }}</a></th>
                <td>{{ $layanan->pasien->pasien_nama }}</td>
                <td class="text-center">{{ $layanan->jenis_layanan->jenis_layanan }}</td>
                <td class="text-center">{{ $layanan->pasien->pasien_gender }}</td>
                <td class="text-center">{{ $layanan->daftar_tanggal }}</td>
                
                <td class="text-center">@if($layanan->daftar_status == 'BERLANGSUNG')
            <span class="badge bg-warning">BERLANGSUNG</span>
        @elseif($layanan->daftar_status == 'SELESAI')
            <span class="badge bg-success">SELESAI</span>
        @else
            <span class="badge bg-danger">BATAL</span>
        @endif
        </td>
        </td>
                
            </tr>
            @endforeach
        </tbody>
    </table>

            </div>

          </div>
        </div><!-- End Recent Sales -->



      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

<!-- News & Updates Traffic -->
<div class="card">

        <div class="card-body pb-0">
          <h5 class="card-title">Pengumuman Terbaru</h5>
              </br>
              @foreach ($pengumuman as $item)
              <div class="news">
              <div class="post-item clearfix">
              <img src="{{ asset('/storage/pengumuman/'.$item->pengumuman_gambar) }}" class="card-img-top" alt="{{ $item->pengumuman_judul }}">
              <div class="card-body">
    <h4 class="d-flex justify-content-between align-items-center">
        <a href="{{ route('pengumuman.edit', $item->id) }}" class="card-title">
            {{ $item->pengumuman_judul }}
        </a>
        @if($item->pengumuman_status == 'aktif')
            <span class="text-success small pt-1 fw-bold">Aktif</span>
        @else
            <span class="text-danger small pt-1 fw-bold">Tidak Aktif</span>
        @endif
    </h4>
    <p class="card-text">{{ $item->pengumuman_deskripsi }}</p>
</div>
<br><br>
        
    
        @endforeach
          

          </div><!-- End sidebar recent posts-->

        </div>
      </div><!-- End News & Updates -->
      

    </div><!-- End Right side columns -->

  </div>
</section>

</main><!-- End #main -->
@endsection