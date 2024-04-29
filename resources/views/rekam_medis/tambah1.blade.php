@extends('Backend/layouts.utama')

@section('content27')
<main id="main" class="main">
<div class="pagetitle">
<div class="pull-left">
                <h2>Tambah Rekam Medis Pasien</h2>
            </div>
  <nav>
    <ol class="breadcrumb">
      <l i class="breadcrumb-item"><a href="index.html">Home  /</a></li>
      <li class="breadcrumb-item active">Daftar Pasien</li>
    </ol>
  </nav>
</div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rekam_medis.index') }}"> Kembali</a>
            </div>
        </div>
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

   

    <form action="{{ route('rekam_medis.store') }}" method="POST">
        @csrf

        <table class='table table-bordered'>
        <thead>
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
        <tbody class="table-group-divider">
            @php
            $no = 1;
            @endphp
            @foreach ($rekammedis as $data)
            <tr>
                <th class="text-center" scope="row">{{ $no++ }}</th>
                <td class="text-center">{{ $data->pasien->pasien_id }}</td>
                <td class="status-layanan">{{ $data->daftar_id }}</td>
                <td class="nama-lengkap">{{ $data->pasien->pasien_nama }}</td>
                <td class="text-center">{{ $data->pasien->pasien_nik }}</td>
                <td class="text-center">{{ $data->pasien->pasien_gender }}</td>
                <td>{{ $data->pasien->pasien_alamat }}</td>
                <td class="text-center">{{ $data->jenis_layanan->jenis_layanan }}</td>
                <td class="text-justify">{{ $data->daftar_tanggal }}</td>
                <td class="text-center">
                    @if($data->daftar_status == 'BERLANGSUNG')
                    <span class="badge bg-warning">BERLANGSUNG</span>
                    @elseif($data->daftar_status == 'SELESAI')
                    <span class="badge bg-success">SELESAI</span>
                    @else
                    <span class="badge bg-danger">BATAL</span>
                    @endif
                </td>
                <td>
                    <form action>
                        <a class="btn btn-primary pilih-btn" data-id="{{ $data->daftar_id }}">Pilih</a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <form action="{{ route('rekam_medis.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <strong>Id Rekam Medis:</strong>
            <input id="idStatus" type="text" name="rekam_idlayanan" class="form-control" placeholder="Id Rekam Medis" readonly>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input id="idNamaLengkap" type="text" class="form-control" placeholder="Nama" readonly>
            </div>
        </div>
       
                
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal:</strong>
                    <input type="date" name="rekam_tanggal" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>terapinonobat:</strong>
                    
                    <input type="text" name="rekam_terapinonobat" class="form-control" placeholder="terapinonobat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Anamnesa:</strong>
                    
                    <input type="text" name="rekam_anamnesa" class="form-control" placeholder="Anamnesa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alergi:</strong>
                    
                    <input type="text" name="rekam_alergi" class="form-control" placeholder="Alergi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prognosa:</strong>
                    
                    <input type="text" name="rekam_prognosa" class="form-control" placeholder="Prognosa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Terapi Obat:</strong>
                    
                    <input type="text" name="rekam_terapiobat" class="form-control" placeholder="Terapi Obat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>BMHP:</strong>
                    
                    <input type="text" name="rekam_bmhp" class="form-control" placeholder="BMHP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diagnosa:</strong>
                    
                    <input type="text" name="rekam_diagnosa" class="form-control" placeholder="Diagnosa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kesadaran:</strong>
                    
                    <input type="text" name="rekam_kesadaran" class="form-control" placeholder="Kesadaran">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Suhu:</strong>
                    
                    <input type="number" name="rekam_suhu" class="form-control" placeholder="Suhu">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sistole:</strong>
                    
                    <input type="number" name="rekam_sistole" class="form-control" placeholder="Sistole">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Respiratorydate:</strong>
                    
                    <input type="number" name="rekam_respiratorydate" class="form-control" placeholder="Respiratorydate">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diastole:</strong>
                    
                    <input type="number" name="rekam_diastole" class="form-control" placeholder="DIastole">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Heartrate:</strong>
                    
                    <input type="number" name="rekam_heartrate" class="form-control" placeholder="Heartrate">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tinggi Badan:</strong>
                    
                    <input type="number" name="rekam_tinggibadan" class="form-control" placeholder="Tinggi Badan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Berat Badan:</strong>
                    
                    <input type="number" name="rekam_beratbadan" class="form-control" placeholder="Berat Badan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lingkar Perut:</strong>
                    
                    <input type="number" name="rekam_lingkarperut" class="form-control" placeholder="Lingkar Perut">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>imt:</strong>
                    
                    <input type="number" name="rekam_imt" class="form-control" placeholder="IMT">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kecelakaan:</strong>
                    
                    <input type="text" name="rekam_kecelakaan" class="form-control" placeholder="Kecelakaan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tenaga Medis:</strong>
                    
                    <input type="text" name="rekam_tenagamedis" class="form-control" placeholder="Tenaga Medis">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Statuspulang:</strong>
                    
                    <input type="text" name="rekam_statuspulang" class="form-control" placeholder="Status Pulang">
                </div>
            </div>
            
          

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
    <script>
        // Ambil elemen tombol "Pilih"
        var pilihBtns = document.getElementsByClassName('pilih-btn');

        // Ambil elemen input yang akan diisi dengan data dari tabel
        var namaInput = document.getElementById('idNamaLengkap');
        var statusLayananInput = document.getElementById('idStatus');

        // Tambahkan event listener untuk setiap tombol "Pilih"
        Array.from(pilihBtns).forEach(function (btn) {
            btn.addEventListener('click', function () {
                // Ambil data yang terkait dengan tombol "Pilih"
                var namaElement = this.parentNode.parentNode.parentNode.querySelector('.nama-lengkap');
                var statusLayananElement = this.parentNode.parentNode.parentNode.querySelector('.status-layanan');

                // Periksa jika elemen tidak null sebelum mengakses textContent
                var nama = namaElement ? namaElement.textContent : '';
                var statusLayanan = statusLayananElement ? statusLayananElement.textContent : '';

                // Masukkan data ke dalam input form
                namaInput.value = nama;
                statusLayananInput.value = statusLayanan;
            });
        });
    </script>
</main>
@endsection















