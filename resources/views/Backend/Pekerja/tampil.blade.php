@extends('backend.layouts.utama')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Data Pekerja</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a>Beranda</a></li>
                <li class="breadcrumb-item active">Data Pekerja</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Pekerja</h2>
            </div>

            <!-- FORM PENCARIAN -->
            <div class="pb-3">
                <form class="d-flex" action="{{ route('pekerja.search') }}" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}" placeholder="Masukkan Nama Pekerja" aria-label="Search">
                    <button class="btn btn-secondary" type="submit">Cari</button>
                </form>
            </div>

            <div class="pull-right">
                <a href="{{ route('pekerja.create') }}" class="btn btn-success">+ Tambah Pekerja</a>
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
            <tr class="text-center">
                <th>No.</th>
                <th>Nama</th>
                <th>Nomor Whatsapp</th>
                <th>Alamat</th>
                <th>Foto</th>
                <th>Kategori Pekerja</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pekerja as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->pekerja_nama }}</td>
                <td class="text-center">{{ $item->pekerja_nowa }}</td>
                <td>{{ $item->pekerja_alamat }}</td>
                <td><img src="{{ asset('storage/pekerja/' . $item->pekerja_foto) }}" alt="" style="max-height: 100px;"></td>
                <td class="text-center">{{ $item->kategori->katekerja_nama }}</td>
                <td class="text-center">
                    <form action="{{ route('pekerja.destroy', $item->pekerja_id) }}" method="POST">
                        <a href="{{ route('pekerja.edit', $item->pekerja_id) }}" class="btn btn-primary">Ubah</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
