<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Pelatihan</title>
    <!-- Link Google Font: Roboto untuk tampilan modern -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Global Reset & Body Styling */
        body {
            font-family: 'Roboto', sans-serif; /* Menggunakan font Roboto */
            margin: 0;
            padding: 0;
            background-color: #f7f8fa; /* Warna latar belakang body, sesuai dengan nuansa border gambar */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Menggunakan min-height agar konten bisa memanjang */
            box-sizing: border-box; /* Memastikan padding dan border dihitung dalam lebar/tinggi elemen */
        }

        /* Certificate Container Styling */
        .certificate-container {
            background-color: #fff; /* Latar belakang putih untuk sertifikat */
            border: 15px solid #e1e6f0; /* Border biru muda seperti di gambar */
            border-radius: 15px; /* Sudut membulat */
            padding: 40px 60px; /* Padding dalam, lebih besar di sisi horizontal */
            width: 90%; /* Lebar relatif */
            max-width: 900px; /* Lebar maksimum agar tidak terlalu lebar di layar besar */
            box-shadow: 0 0 25px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
            text-align: center; /* Teks rata tengah */
            box-sizing: border-box;
        }

        /* Top Company Name */
        .company-name-top {
            font-size: 1.1em; /* Ukuran teks 'Ennovative Elearning' di atas */
            color: #333;
            margin-bottom: 30px; /* Jarak bawah */
            font-weight: 500; /* Ketebalan sedang */
        }

        /* Main Title (SERTIFIKAT PELATIHAN) */
        h1 {
            font-size: 2.8em; /* Ukuran lebih besar */
            color: #003366; /* Warna biru gelap */
            margin-bottom: 20px;
            text-transform: uppercase; /* Huruf besar semua */
            font-weight: 700; /* Tebal */
            letter-spacing: 1px; /* Jarak antar huruf */
        }

        /* Subtitles (Dengan bangga diberikan kepada, Atas keberhasilan menyelesaikan pelatihan:) */
        .subtitle {
            font-size: 1.1em;
            color: #666;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        /* Recipient Name */
        h2 {
            font-size: 2.2em; /* Ukuran besar untuk nama */
            color: #333;
            font-weight: 700; /* Tebal */
            margin-top: 0;
            margin-bottom: 0; /* Tidak ada margin bawah agar dekat dengan subtitle berikutnya */
        }

        /* Course Title */
        .course-title {
            font-size: 1.4em; /* Ukuran judul kursus */
            color: #333;
            font-weight: 700; /* Tebal */
            margin-top: 20px;
            margin-bottom: 30px; /* Jarak sebelum garis pembatas */
        }

        /* Divider Line */
        .divider {
            margin: 40px auto; /* Margin vertikal dan rata tengah otomatis */
            border-bottom: 2px solid #003366; /* Garis biru gelap */
            width: 70%; /* Lebar garis */
        }

        /* Certificate Details (Date and Code) */
        .certificate-details {
            margin-top: 30px;
            font-size: 1em;
            color: #555;
            line-height: 1.8; /* Jarak baris untuk keterbacaan */
        }

        .certificate-details p {
            margin: 5px 0; /* Sedikit margin antar baris detail */
        }

        .date, .certificate-code {
            font-style: normal; /* Menghilangkan italic */
            font-weight: 500; /* Sedikit lebih tebal untuk nilai */
            color: #333; /* Warna lebih gelap untuk nilai */
        }

        /* Bottom Company Name */
        .company-name-bottom {
            font-size: 1em;
            color: #555;
            margin-top: 20px; /* Jarak setelah garis pembatas bawah */
            font-weight: 500;
        }

        /* Menghapus atau menyembunyikan kelas yang tidak digunakan sesuai gambar referensi */
        .signature, .logo, .btn {
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .certificate-container {
                width: 95%;
                padding: 25px; /* Mengurangi padding pada layar kecil */
            }

            .company-name-top {
                font-size: 1em;
                margin-bottom: 20px;
            }

            h1 {
                font-size: 2.2em;
            }

            .subtitle {
                font-size: 0.9em;
                margin-top: 15px;
            }

            h2 {
                font-size: 1.8em;
            }

            .course-title {
                font-size: 1.2em;
                margin-top: 15px;
                margin-bottom: 20px;
            }

            .divider {
                margin: 25px auto;
                width: 80%;
            }

            .certificate-details, .company-name-bottom {
                font-size: 0.9em;
            }
        }

        @media (max-width: 480px) {
            .certificate-container {
                padding: 15px;
                border-width: 10px; /* Border lebih tipis pada layar sangat kecil */
            }

            h1 {
                font-size: 1.8em;
            }

            h2 {
                font-size: 1.6em;
            }

            .course-title {
                font-size: 1em;
            }

            .divider {
                width: 90%;
            }
        }
    </style>
</head>
<body>

    <div class="certificate-container">
        <!-- Elemen untuk "Ennovative Elearning" di bagian atas -->
        <p class="company-name-top">Ennovative Elearning</p>

        <!-- Judul Utama Sertifikat -->
        <h1>SERTIFIKAT PELATIHAN</h1>

        <!-- Kalimat pengantar penerima -->
        <p class="subtitle">Dengan bangga diberikan kepada</p>

        <!-- Nama Penerima Sertifikat -->
        <h2>{{ $name }}</h2>

        <!-- Kalimat penyelesaian pelatihan -->
        <p class="subtitle">Atas keberhasilan menyelesaikan pelatihan:</p>

        <!-- Judul Kursus yang diselesaikan -->
        <h3 class="course-title">{{ $course }}</h3>

        <!-- Garis pembatas pertama -->
        <div class="divider"></div>

        <!-- Detail Sertifikat (Tanggal dan Kode) -->
        <div class="certificate-details">
            <p>Tanggal Diterbitkan: <span class="date">{{ $date }}</span></p>
            <p>Kode Sertifikat: <span class="certificate-code">{{ $certificate_code }}</span></p>
        </div>

        <!-- Garis pembatas kedua -->
        <div class="divider"></div>

        <!-- Elemen untuk "Ennovative Elearning" di bagian bawah -->
        <p class="company-name-bottom">Ennovative Elearning</p>

    </div>

</body>
</html>