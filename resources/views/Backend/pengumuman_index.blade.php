@extends('backend/layouts.utama')



@section('content2')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Pengumuman</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Beranda</a></li>
                <li class="breadcrumb-item active">Pengumuman</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <div class="pull-left">
                <h2>Data Pengumuman</h2>
            </div>
    <section class="section dashboard">
        <div class="col-lg-8">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="row">
                <div class="col-md-12">
                    @if (!$hidden_button)
                        <a href="{{ route('pengumuman.create') }}" class="btn btn-success">+ Buat Pengumuman</a>
                    @endif
                </div>
            </div>
</br>

            <div class="row row-cards">
                @if ($hidden_button && !($message = Session::get('success')))
                    <div id="notification" class="alert alert-info">
                        Anda telah mencapai batas maksimum pengumuman yang dapat dibuat.
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        document.getElementById('notification').style.display = 'none';
                    }, 3000);
                </script>

<div class="container">
    <div class="row">
        @foreach ($pengumuman as $item)
            <div class="col-lg-4 mb-4">
                <div class="card position-relative">
                    <span class="text-{{ $item->pengumuman_status == 'aktif' ? 'success' : 'danger' }} small pt-2 ps-2 pe-2 fw-bold position-absolute top-0 end-0 bg-white rounded" style="padding: 15px;">
                        {{ $item->pengumuman_status == 'aktif' ? 'Aktif' : 'Tidak Aktif' }}
                    </span>
                    <div class="card-img-top-container" >
                        <img src="{{ asset('/storage/pengumuman/'.$item->pengumuman_gambar) }}" class="card-img-top" alt="{{ $item->pengumuman_judul }}" style="width: 100%; height: 100%;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->pengumuman_judul }}</h5>
                        <p class="card-text">{{ $item->pengumuman_deskripsi }}</p>
                        <a href="{{ route('pengumuman.edit', $item->id) }}" class="btn btn-info">Lihat Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



            </div>
        </div>
    </section>
</main>

@endsection