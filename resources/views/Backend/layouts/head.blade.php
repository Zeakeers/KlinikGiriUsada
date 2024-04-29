{{-- @extends('backend/layouts.utama')   --}}
{{-- @section('content') --}}
  
  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{  asset('frontend/assets/img/klinik.png') }}" alt="Logo" >
        <span class="d-none d-lg-block">Klinik Giri Husada</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



  </header><!-- End Header -->


    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a href="/dashboard" class="nav-link ">
      <i class="bi bi-grid"></i>
      <span>Menu Utama</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
  <a href="/pengumuman" class="nav-link ">
      <i class="bi bi-menu-button-wide"></i>
      <span>Pengumuman</span>
    </a>

    <li class="nav-item">
  <a href="/patients" class="nav-link ">
      <i class="bi bi-people"></i>
      <span>Daftar Pasien</span>
    </a>

 
  <a href="/layanan" class="nav-link ">
      <i class="bi bi-journal-text"></i>
      <span>Daftar Layanan</span>
    </a>

  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a href="/dataadmin" class="nav-link ">
      <i class="bi bi-person"></i>
      <span>Data Admin</span>
    </a>
  
    <li class="nav-item">
    <a href="/rekam_medis" class="nav-link ">
      <i class="bi bi-layout-text-window-reverse"></i>
      <span>Rekam Medis</span>
    </a>

    <li class="nav-item">
    <a href="/pekerja" class="nav-link ">
      <i class="bi bi-person-plus"></i>
      <span>Pekerja</span>
    </a>

    <li class="nav-item">
    <a href="/apotek" class="nav-link ">
      <i class="bi bi-cash-stack"></i>
      <span>Apotek</span>
    </a>

    <li class="nav-item">
    <a href="/logout"  class="nav-link" onclick="return confirm('Apakah anda yakin ingin Keluar?')">
      <i class="bi bi-box-arrow-right"></i>
      <span>Keluar</span>
    </a>

</ul>

</aside><!-- End Sidebar-->
  {{-- @endsection --}}