@extends('backend/layouts.utama')  

@section('content8')
<main id="main" class="main">
<div class="pagetitle">
  <h1>Edit Data Pasien</h1>
  <nav>
    <ol class="breadcrumb">
      <l i class="breadcrumb-item"><a href="index.html">Home  /</a></li>
      
    </ol>
  </nav>
</div>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Data Rekam Medis Pasien</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('rekam_medis.show', $rekammedis->rekam_id) }}"> Kembali</a>
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

    <form action="{{ route('rekam_medis.update',$rekammedis->rekam_id) }}" method="POST">
        @csrf
        @method('PUT')

       
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal:</strong>
                    <input type="date" name="rekam_tanggal" class="form-control" value="{{ $rekammedis->rekam_tanggal }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Terapi Non Obat:</strong>
                    
                    <input type="text" name="rekam_terapinonobat" value="{{ $rekammedis->rekam_terapinonobat}}" class="form-control" placeholder="terapinonobat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Anamnesa:</strong>
                    
                    <input type="text" name="rekam_anamnesa" value="{{ $rekammedis->rekam_anamnesa }}" class="form-control" placeholder="Anamnesa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Alergi:</strong>
                    
                    <input type="text" name="rekam_alergi" value="{{ $rekammedis->rekam_alergi }}" class="form-control" placeholder="Alergi">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prognosa:</strong>
                    
                    <input type="text" name="rekam_prognosa" value="{{ $rekammedis->rekam_prognosa}}" class="form-control" placeholder="Prognosa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Terapi Obat:</strong>
                    
                    <input type="text" name="rekam_terapiobat" value="{{ $rekammedis->rekam_terapiobat }}" class="form-control" placeholder="Terapi Obat">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>BMHP:</strong>
                    
                    <input type="text" name="rekam_bmhp" value="{{ $rekammedis->rekam_bmhp }}" class="form-control" placeholder="BMHP">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diagnosa:</strong>
                    
                    <input type="text" name="rekam_diagnosa" value="{{ $rekammedis->rekam_diagnosa }}" class="form-control" placeholder="Diagnosa">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kesadaran:</strong>
                    
                    <input type="text" name="rekam_kesadaran" value="{{ $rekammedis->rekam_kesadaran }}" class="form-control" placeholder="Kesadaran">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Suhu:</strong>
                    
                    <input type="number" name="rekam_suhu" value="{{ $rekammedis->rekam_suhu }}" class="form-control" placeholder="Suhu">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sistole:</strong>
                    
                    <input type="number" name="rekam_sistole" value="{{ $rekammedis->rekam_sistole }}" class="form-control" placeholder="Sistole">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Respiratorydate:</strong>
                    
                    <input type="number" name="rekam_respiratorydate" value="{{ $rekammedis->rekam_respiratorydate }}" class="form-control" placeholder="Respiratorydate">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Diastole:</strong>
                    
                    <input type="number" name="rekam_diastole" value="{{ $rekammedis->rekam_diastole }}" class="form-control" placeholder="DIastole">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Heartrate:</strong>
                    
                    <input type="number" name="rekam_heartrate" value="{{ $rekammedis->rekam_heartrate }}" class="form-control" placeholder="Heartrate">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tinggi Badan:</strong>
                    
                    <input type="number" name="rekam_tinggibadan" value="{{ $rekammedis->rekam_tinggibadan }}" class="form-control" placeholder="Tinggi Badan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Berat Badan:</strong>
                    
                    <input type="number" name="rekam_beratbadan" value="{{ $rekammedis->rekam_beratbadan }}" class="form-control" placeholder="Berat Badan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lingkar Perut:</strong>
                    
                    <input type="number" name="rekam_lingkarperut" value="{{ $rekammedis->rekam_lingkarperut }}" class="form-control" placeholder="Lingkar Perut">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>imt:</strong>
                    
                    <input type="number" name="rekam_imt" value="{{ $rekammedis->rekam_imt }}" class="form-control" placeholder="IMT">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kecelakaan:</strong>
                    
                    <input type="text" name="rekam_kecelakaan" value="{{ $rekammedis->rekam_kecelakaan }}" class="form-control" placeholder="Kecelakaan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tenaga Medis:</strong>
                    
                    <input type="text" name="rekam_tenagamedis" value="{{ $rekammedis->rekam_tenagamedis }}" class="form-control" placeholder="Tenaga Medis">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Statuspulang:</strong>
                    
                    <input type="text" name="rekam_statuspulang" value="{{ $rekammedis->rekam_statuspulang }}" class="form-control" placeholder="Status Pulang">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Id Layanan:</strong>
                    
                    <input type="text" name="rekam_idlayanan" value="{{ $rekammedis->rekam_idlayanan }}" class="form-control" placeholder="ID Layanan">
                </div>
            </div>
            
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
