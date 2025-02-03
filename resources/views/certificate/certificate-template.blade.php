<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat</title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            border: 10px solid #ccc;
            padding: 50px;
        }
        h1 {
            font-size: 24px;
        }
        .certificate-body {
            margin-top: 50px;
        }
        .signature {
            margin-top: 80px;
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <h1>SERTIFIKAT KELULUSAN</h1>
    <p>Dengan bangga diberikan kepada:</p>
    <h2>{{ $user }}</h2>
    <p>Atas keberhasilan menyelesaikan kursus:</p>
    <h3>{{ $course }}</h3>
    <div class="certificate-body">
        <p>Tanggal diterbitkan: {{ $date }}</p>
        <p>Kode Sertifikat: {{ $certificate_code }}</p>
    </div>
    <div class="signature">
        <p>Instruktur</p>
        <p>Direktur Kursus</p>
    </div>
</body>
</html>
