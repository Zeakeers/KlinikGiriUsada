<!DOCTYPE html>
<html>
<head>
    <title>Cetak Rekam Medis</title>
    <style>
        table {
        width: 100%;
        border-collapse: collapse;
            }

        th, td {
        padding: 8px;
        border: 1px solid black;
        }
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 800px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 100px;
            height: auto;
            margin-right: 20px;
        }

        .header h1 {
            font-size: 16px;
            margin-bottom: 5px;
        }

        .header p {
            font-size: 14px;
            margin: 0;
        }

        .address {
            margin-bottom: 20px;
        }

        .address p {
            margin: 0;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: inline-block;
            width: 120px;
            font-weight: bold;
        }

        .form-group .value {
            display: inline-block;
            width: calc(100% - 150px);
            vertical-align: top;
        }

        .separator {
            margin-bottom: 10px;
            border-top: 2px solid #000;
        }

        .signature {
            margin-top: 40px;
            text-align: right;
        }

        .signature p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo-container">
            <img class="logo" src="{{ asset('frontend/assets/img/klinik.png') }}" alt="Logo Rumah Sakit">
            <div>
                <h1>Klinik Giri Usada</h1>
                <p>Ds. Girirejo, Kec. Bagor, Kab. Nganjuk, Jawa Timur</p>
            </div>
        </div>
        <h1>Rekam Medis ID {{ $rekammedis1->rekam_id }}</h1>
        <p>Nama     : {{ $rekammedis1->pasien_nama}}</p>
        <p>NIK      : {{ $rekammedis1->pasien_nik}}</p>
        <p>Alamat   : {{ $rekammedis1->pasien_alamat}}</p>
    </div>

    <div class="separator"></div>
    <div class ="signature">
        <p>{{ $rekammedis1->rekam_tanggal}}</p>
    </div>

    <table>
       
        <tr>
            <td><strong>Jenis Kelamin:</strong></td>
            <td>{{ $rekammedis1->pasien_gender}}</td>
        </tr>
        <tr>
            <td><strong>Terapi Non Obat:</strong></td>
            <td>{{ $rekammedis1->rekam_terapinonobat}}</td>
        </tr>
        <tr>
            <td><strong>Anamnesa:</strong></td>
            <td>{{ $rekammedis1->rekam_anamnesa }}</td>
        </tr>
        <tr>
            <td><strong>Alergi:</strong></td>
            <td>{{ $rekammedis1->rekam_alergi }}</td>
        </tr>
        <tr>
            <td><strong>prognosa:</strong></td>
            <td>{{ $rekammedis1->rekam_prognosa }}</td>
        </tr>
        <tr>
            <td><strong>Terapi Obat:</strong></td>
            <td>{{ $rekammedis1->rekam_terapiobat }}</td>
        </tr>
        <tr>
            <td><strong>bmhp:</strong></td>
            <td>{{ $rekammedis1->rekam_bmhp }}</td>
        </tr>
        <tr>
            <td><strong>Diagnosa:</strong></td>
            <td>{{ $rekammedis1->rekam_diagnosa }}</td>
        </tr>
        <tr>
            <td><strong>Kesadaran:</strong></td>
            <td>{{ $rekammedis1->rekam_kesadaran }}</td>
        </tr>
        <tr>
            <td><strong>Suhu:</strong></td>
            <td>{{ $rekammedis1->rekam_suhu }}</td>
        </tr>
        <tr>
            <td><strong>sistole:</strong></td>
            <td>{{ $rekammedis1->rekam_sistole }}</td>
        </tr>
        <tr>
            <td><strong>Respiratorydate:</strong></td>
            <td>{{ $rekammedis1->rekam_respiratorydate }}</td>
        </tr>
        <tr>
            <td><strong>Diastole:</strong></td>
            <td>{{ $rekammedis1->rekam_diastole }}</td>
        </tr>
        <tr>
            <td><strong>heartrate:</strong></td>
            <td>{{ $rekammedis1->rekam_heartrate }}</td>
        </tr>
        <tr>
            <td><strong>Tinggi Badan:</strong></td>
            <td>{{ $rekammedis1->rekam_tinggibadan}}</td>
        </tr>
        <tr>
            <td><strong>Berat Badan:</strong></td>
            <td>{{ $rekammedis1->rekam_beratbadan }}</td>
        </tr>
        <tr>
            <td><strong>Lingkar Perut:</strong></td>
            <td>{{ $rekammedis1->rekam_lingkarperut }}</td>
        </tr>
        <tr>
            <td><strong>Imt:</strong></td>
            <td>{{ $rekammedis1->rekam_imt }}</td>
        </tr>
        <tr>
            <td><strong>Kecelakaan:</strong></td>
            <td>{{ $rekammedis1->rekam_kecelakaan }}</td>
        </tr>
        <tr>
            <td><strong>Tenaga Medis:</strong></td>
            <td>{{ $rekammedis1->rekam_tenagamedis }}</td>
        </tr>
        <tr>
            <td><strong>Status Pulang:</strong></td>
            <td>{{ $rekammedis1->rekam_statuspulang}}</td>
        </tr>
    </table>

   

    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</div>
</body>
</html>
