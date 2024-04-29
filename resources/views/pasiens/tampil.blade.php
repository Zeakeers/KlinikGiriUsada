@extends('backend/layouts.utama')  
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Daftar Pasien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Beranda</a></li>
                <li class="breadcrumb-item active">Daftar Pasien</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Pasien</h2>
            </div>

            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="{{ route('pasiens.cari') }}" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}" placeholder="Masukkan NIK atau Nama Pasien" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            </div>

            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pasiens.create') }}">+ Tambah Pasien Baru</a>
            </div>
        </div>
    </div>
    <br>
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
    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>ID Pasien</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasiens as $pasien)
                <tr>
                    <td>{{ $pasien->pasien_id }}</td>
                    <td>{{ $pasien->pasien_nik }}</td>
                    <td>{{ $pasien->pasien_nama }}</td>
                    <td>{{ $pasien->tanggal_lahir }}</td>
                    <td>
                        @php
                            // Menghitung umur berdasarkan tanggal lahir
                            $umur = now()->diff($pasien->tanggal_lahir)->y;
                            echo $umur;
                        @endphp
                    </td>
                    <td>{{ $pasien->pasien_alamat }}</td>
                    <td>{{ $pasien->pasien_gender }}</td>
                    <td>
                        <form action="{{ route('pasiens.destroy',$pasien->pasien_id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('pasiens.show',$pasien->pasien_id) }}">Detail</a>
                            <a class="btn btn-primary" href="{{ route('pasiens.edit',$pasien->pasien_id) }}">Ubah</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
