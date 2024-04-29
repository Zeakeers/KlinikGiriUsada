@extends('Backend.layouts.utama')
        <!-- START DATA -->
        @section('konten')


        <main id="main" class="main">
<div class="pagetitle">
  <h1>Data Admin</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a>Beranda</a></li>
      <li class="breadcrumb-item">Data Admin</li>
     
    </ol>
  </nav>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Admin</h2>
            </div>
            
        </div>
    </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('dataadmin') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-primary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('dataadmin/create')}}' class="btn btn-success">+ Tambah Data</a>
                </div>
                @include('Backend.dataadmin.komponen.pesan')
                <table class="table table-bordered">
                    <thead class="table-success">
                        <tr class="">
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">ID Admin</th>
                            <th class="col-md-4">Nomor Whatsapp</th>
                            <th class="col-md-2">Nama Kategori</th>
                            {{-- <th class="col-md-2">Password</th> --}}
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->user_id}}</td>
                            <td>{{ $item->user_nowa}}</td>
                            <td>Admin</td>
                            {{-- <td>{{ $item->password}}</td> --}}
                            <td>
                           
                               
                                <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('dataadmin/'.$item->user_id) }}" method="post">
                                <a href='{{ url('dataadmin/'.$item->user_id.'/edit')}}' class="btn btn-primary btn-sm">Ubah</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                                </form>
                            </td>
                        </tr>
                        <?php $i++ ?>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->withQueryString()->links() }}
          </div>
          <!-- AKHIR DATA -->
          @endsection