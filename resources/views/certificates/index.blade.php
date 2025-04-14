<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Pelatihan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f8fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('https://www.transparenttextures.com/patterns/azur-lane.png');
            background-size: cover;
        }

        .certificate-container {
            background-color: #fff;
            border: 15px solid #e1e6f0;
            border-radius: 15px;
            padding: 40px;
            width: 80%;
            max-width: 900px;
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 36px;
            color: #003366;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 30px;
            color: #333;
            font-weight: bold;
            margin-top: 0;
        }

        .subtitle {
            font-size: 18px;
            color: #666;
        }

        .certificate-body {
            margin-top: 30px;
            font-size: 18px;
            line-height: 1.6;
            color: #333;
        }

        .certificate-details {
            margin-top: 30px;
            font-size: 16px;
            color: #555;
        }

        .signature {
            margin-top: 80px;
            display: flex;
            justify-content: space-between; /* To align left and right */
            padding: 0 60px;
            font-size: 18px;
            color: #333;
            margin-top: 100px;
        }

        .signature p {
            width: 45%; /* Give each p a width of 45% */
            border-top: 2px solid #003366;
            padding-top: 10px;
            text-align: center;
        }

        .logo {
            max-width: 150px;
            margin-bottom: 30px;
        }

        .divider {
            margin: 40px 0;
            border-bottom: 2px solid #003366;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }

        .date, .certificate-code {
            font-style: italic;
            font-size: 16px;
            color: #555;
        }

        .btn {
            padding: 10px 30px;
            background-color: #003366;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #005099;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .certificate-container {
                width: 95%;
                padding: 20px;
            }

            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 24px;
            }

            .certificate-body {
                font-size: 16px;
            }

            .certificate-details {
                font-size: 14px;
            }

            .signature {
                font-size: 14px;
                flex-direction: column;
                align-items: center;
                padding: 0;
                margin-top: 40px;
            }

            .signature p {
                padding-top: 5px;
                border-top: 1px solid #003366;
                width: auto;
                text-align: center;
            }
        }
    </style>
</head>
<body>

    <div class="certificate-container">
        <img class="logo" src="https://www.transparenttextures.com/patterns/azur-lane.png" alt="Inovative Learning">
        <h1>SERTIFIKAT PELATIHAN</h1>
        <p class="subtitle">Dengan bangga diberikan kepada</p>
        <h2>{{ $name }}</h2>
        <p class="subtitle">Atas keberhasilan menyelesaikan pelatihan:</p>
        <h3>{{ $course }}</h3>

        <div class="divider"></div>

        <div class="certificate-body">
            <p><strong>Deskripsi Pelatihan:</strong>{!! $description !!}
            </p>
        </div>

        <div class="certificate-details">
            <p>Tanggal Diterbitkan: <span class="date">{{ $date }}</span></p>
            <p>Kode Sertifikat: <span class="certificate-code">{{ $certificate_code }}</span></p>
        </div>

        <div class="signature">
            <p>Inovative Learning</p>
           
        </div>

    </div>

</body>
</html>
