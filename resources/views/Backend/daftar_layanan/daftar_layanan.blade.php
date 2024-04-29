@extends('backend/layouts.utama')

@section('content10')


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('backend/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Layanan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a>Beranda</a></li>
          <li class="breadcrumb-item active">Daftar Layanan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    

    <section class="section">
      
        <div class="col-lg-6-mx-4">

          <div class="card">
            <div class="card-body">
            <div class="pull-left">
                <h2>Data Layanan</h2>
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

              <a class="btn btn-success" href="{{ route('backend.createLayanan') }}" role="button" style="float: left;">+ Tambah Daftar Layanan</a>
      
            </br></br>
              <table class="table table-bordered">
  <thead class="table-success">
    <tr class="text-center">
      <th>No</th>
      <th>ID Pasien</th>
      <th>Nomor Layanan</th>
      <th>Nama Lengkap</th>
      <th>NIK</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Jenis Layanan</th>
      <th>Tanggal Daftar</th>
      <th>Status</th>
      <th>Aksi</th>
     
    </tr>
  </thead>
  <tbody class="table-group-divider table-secondary">
    @php
    $no =1;
    @endphp
  @foreach ($backend as $data)
    <tr>
    <th class="text-center" scope="row">{{ $no++ }}</th>

      <td class="text-center">{{ $data->pasien->pasien_id }}</td>
      <td class="text-center">{{ $data->daftar_id }}</td>
      <td>{{ $data->pasien->pasien_nama }}</td>
      <td class="text-center">{{ $data->pasien->pasien_nik }}</td>
      <td class="text-center">{{ $data->pasien->pasien_gender }}</td>
      <td>{{ $data->pasien->pasien_alamat}}</td>
      <td class="text-center">{{ $data->jenis_layanan->jenis_layanan}}</td>
      <td class="text-justify">{{ $data->daftar_tanggal }}</td>
      


      <td class="text-center">@if($data->daftar_status == 'BERLANGSUNG')
            <span class="badge bg-warning">BERLANGSUNG</span>
        @elseif($data->daftar_status == 'SELESAI')
            <span class="badge bg-success">SELESAI</span>
        @else
            <span class="badge bg-danger">BATAL</span>
        @endif
        </td>
       
       
     <td>
     <form action="{{ route('daftar_layanan.destroy', $data->daftar_id) }}" method="POST">
                        <a href="{{ route('daftar_layanan.edit', $data->daftar_id) }}" class="btn btn-primary">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
    </tr>
    @endforeach
  </tbody>
</table>

            </div>
          </div>

            </div>
          </div>

        
      </div>
    </section>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('backend/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('backend/assets/js/main.js') }}"></script>

</body>

</html>


