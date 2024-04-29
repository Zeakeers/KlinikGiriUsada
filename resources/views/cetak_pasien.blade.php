<!DOCTYPE html>
<html>
<head>
    <title>Kartu Berobat</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .card {
            width: 300px;
            height: 200px;
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        th, td {
            padding: 2px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            font-size: 9px;
        }

        th {
            font-weight: bold;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 7px;
        }
        .separator {
            margin-bottom: 10px;
            border-top: 2px solid #000;
        }

        .logo {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
        }

        .header p {
            font-size: 9px;
            margin: 0;
        }

        .card-header {
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-body {
            font-size: 9px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="logo-container">
            <img class="logo" src="{{ asset('frontend/assets/img/klinik.png') }}" alt="Logo Rumah Sakit">
            <div class="header">
                <h1>Klinik Giri Usada</h1>
                <p>Ds. Girirejo, Kec. Bagor, Kab. Nganjuk, Jawa Timur</p>
            </div>
        </div>
        <div class="separator"></div>
        <div class="card-header">Detail Pasien</div>
        <div class="card-body">
            <p><strong>Id Pasien</strong>:       {{ $pasien->pasien_id }}</p>
        </div>
        <table>
        <tr>
            <td><strong>Nama:</strong></td>
            <td>{{ $pasien->pasien_nama }}</td>
        </tr>
        <tr>
            <td><strong>NIK:</strong></td>
            <td>{{ $pasien->pasien_nik }}</td>
        </tr>
        <tr>
            <td><strong>Tanggal Lahir:</strong></td>
            <td>{{ $pasien->tanggal_lahir }}</td>
        </tr>
        <tr>
            <td><strong>Jenis Kelamin:</strong></td>
            <td>{{ $pasien->pasien_gender }}</td>
        </tr>
        <tr>
            <td><strong>Alamat:</strong></td>
            <td>{{ $pasien->pasien_alamat }}</td>
        </tr>
        
       
    </table>
    </div>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</div>
</body>
</html>
