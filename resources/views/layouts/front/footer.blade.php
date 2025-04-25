<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Design</title>
  <!-- Font Awesome CDN for social media icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    footer {
      background-color: #141E61;
      color: #ffffff;
      padding: 40px;
    }

    .footer-content {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }

    .newsletter {
      flex: 1;
      padding-right: 20px;
    }

    .newsletter h2 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .newsletter input {
      width: 80%;
      padding: 10px;
      margin-right: 10px;
      color: #000000;
      background-color: #f1f1f1;
      border: 1px solid #ccc;
    }

    .newsletter button {
      padding: 10px;
      background-color: #f9a825;
      color: #ffffff;
      border: none;
      cursor: pointer;
    }

    .newsletter p {
      font-size: 12px;
      margin-top: 10px;
    }

    .social-media {
      margin-top: 15px;
    }

    .social-media a {
      margin-right: 15px;
      color: #ffffff;
      font-size: 20px;
      text-decoration: none;
      transition: color 0.3s;
    }

    .social-media a:hover {
      color: #f9a825;
    }

    .company-info {
      flex: 2;
      display: flex;
      justify-content: space-between;
    }

    .b-corp {
      flex: 1;
    }

    .b-corp img {
      width: 120px;
      margin-bottom: 10px;
    }

    .b-corp p {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .contact-info {
      flex: 1;
      text-align: right;
    }

    .contact-info p {
      font-size: 14px;
      margin-bottom: 10px;
    }

    .contact-info a {
      color: #f9a825;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <footer>
    <div class="footer-content">
      <div class="newsletter">
        <h2>Ajukan Pertanyaan Jika Masih Bingung</h2>
        <input type="email" id="emailInput" placeholder="Email Address" />
        <button onclick="sendEmail()">Sign me up</button>
        <p><a href="mailto:admin@ibereality.com">Hubungi via Email</a></p>

        <!-- Social Media Icons -->
        <div class="social-media">
          <a href="https://facebook.com/share/16MMY4vRw2/" target="_blank"><i class="fab fa-facebook-f"></i></a> 
          <a href="https://instagram.com/ibereality/" target="_blank"><i class="fab fa-instagram"></i></a>
          <a href="https://tiktok.com/@ibereality" target="_blank"><i class="fab fa-tiktok"></i></a> 
        </div>
      </div>

      <div class="company-info">
        <div class="b-corp">
          <p>Certified Chicago Community Member</p>
          <p>PT Integrasi Bisnis Eksekutif merupakan perusahaan teknologi yang fokus membangun ekosistem dengan tiga pilar model yaitu layanan teknologi, penyedia teknologi, dan pembelajaran teknologi.</p>
        </div>
        <div class="contact-info">
          <p>Selamat Datang, Hallo!</p>
          <p>Gedung PIDI4.0, Jl. Raya Kby. Lama Lantai 8, Sukabumi Sel., Kec. Kb. Jeruk, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 11560</p>
          <p>+6281236868738</p>
          <a href="https://wa.me/+6281236868738">Contact</a>
        </div>
      </div>
    </div>
  </footer>

  <script>
    function sendEmail() {
      let userEmail = document.getElementById("emailInput").value;
      if (userEmail) {
        window.location.href = `mailto:admin@ibereality.com?subject=Pertanyaan&body=Halo, saya ingin bertanya. Email saya: ${userEmail}`;
      } else {
        alert("Silakan masukkan alamat email Anda terlebih dahulu.");
      }
    }
  </script>

</body>
</html>
