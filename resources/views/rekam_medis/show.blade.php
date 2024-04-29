@extends('backend/layouts.utama')

@section('content7')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Detail Rekam Medis Pasien</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Rekam Medis Pasien</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Rekam Medis Pasien</h2>
            </div>
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

    <!-- ------------------------------- -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Detail Rekam Medis Pasien') }}</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Nama            </th>
                                    <td>: {{ $rekammedis->pasien_nama }}</td>
                                </tr>
                                <tr>
                                    <th>NIK            </th>
                                    <td>: {{ $rekammedis->pasien_nik }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>: {{ $rekammedis->pasien_alamat }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal         </th>
                                    <td>: {{ $rekammedis->rekam_tanggal }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin   </th>
                                    <td>: {{ $rekammedis->pasien_gender }}</td>
                                </tr>
                                <tr>
                                    <th>Terapi Non Obat </th>
                                    <td>: {{ $rekammedis->rekam_terapinonobat }}</td>
                                </tr>
                                <tr>
                                    <th>Anamnesa        </th>
                                    <td>: {{ $rekammedis->rekam_anamnesa }}</td>
                                </tr>
                                <tr>
                                    <th>Alergi          </th>
                                    <td>: {{ $rekammedis->rekam_alergi }}</td>
                                </tr>
                                <tr>
                                    <th>Prognosa        </th>
                                    <td>: {{ $rekammedis->rekam_prognosa }}</td>
                                </tr>
                                <tr>
                                    <th>Terapi Obat     </th>
                                    <td>: {{ $rekammedis->rekam_terapiobat }}</td>
                                </tr>
                                <tr>
                                    <th>BMHP            </th>
                                    <td>: {{ $rekammedis->rekam_bmhp }}</td>
                                </tr>
                                <tr>
                                    <th>Diagnosa        </th>
                                    <td>: {{ $rekammedis->rekam_diagnosa }}</td>
                                </tr>
                                <tr>
                                    <th>Kesadaran       </th>
                                    <td>: {{ $rekammedis->rekam_kesadaran }}</td>
                                </tr>
                                <tr>
                                    <th>Suhu            </th>
                                    <td>: {{ $rekammedis->rekam_suhu }}</td>
                                </tr>
                                <tr>
                                    <th>Sistole         </th>
                                    <td>: {{ $rekammedis->rekam_sistole }}</td>
                                </tr>
                                <tr>
                                    <th>Respiratorydate </th>
                                    <td>: {{ $rekammedis->rekam_respiratorydate }}</td>
                                </tr>
                                <tr>
                                    <th>Diastole        </th>
                                    <td>: {{ $rekammedis->rekam_diastole }}</td>
                                </tr>
                                <tr>
                                    <th>Heartrate       </th>
                                    <td>: {{ $rekammedis->rekam_heartrate }}</td>
                                </tr>
                                <tr>
                                    <th>Tinggi Badan    </th>
                                    <td>: {{ $rekammedis->rekam_tinggibadan }}</td>
                                </tr>
                                <tr>
                                    <th>Berat Badan     </th>
                                    <td>: {{ $rekammedis->rekam_beratbadan }}</td>
                                </tr>
                                <tr>
                                    <th>Lingkar Perut   </th>
                                    <td>: {{ $rekammedis->rekam_lingkarperut }}</td>
                                </tr>
                                <tr>
                                    <th>IMT             </th>
                                    <td>: {{ $rekammedis->rekam_imt }}</td>
                                </tr>
                                <tr>
                                    <th>Kecelakaan      </th>
                                    <td>: {{ $rekammedis->rekam_kecelakaan }}</td>
                                </tr>
                                <tr>
                                    <th>Tenaga Medis    </th>
                                    <td>: {{ $rekammedis->rekam_tenagamedis }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pulang   </th>
                                    <td>: {{ $rekammedis->rekam_statuspulang }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="{{ route('rekam_medis.index') }}">Kembali</a>
                        <a href="{{ route('rekam_medis.edit', $rekammedis->rekam_id) }}" class="btn btn-info">Edit</a>
                        <button onclick="printUser({{ $rekammedis->rekam_id }})" class="btn btn-success">Cetak Rekam Medis Pasien</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    function printUser(rekam_Id) {
        window.open('/cetak_user/' + rekam_Id, '_blank');
    }
</script>
@endsection
