<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Design</title>
  <style>
    footer {
      background-color: #141E61; /* Updated background color */
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
      color: #000000; /* Black color for the text */
      background-color: #f1f1f1; /* Slightly lighter background than container */
      border: 1px solid #ccc; /* Border to define the input field */
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
    }

    .newsletter .social-media a {
      margin-right: 15px;
      color: #ffffff;
      text-decoration: none;
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
      width: 120px; /* Increased logo size */
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
    <p><a href="mailto:yusrilsaiful97@gmail.com">Hubungi via Email</a></p>
</div>

<script>
    function sendEmail() {
        let userEmail = document.getElementById("emailInput").value;
        if (userEmail) {
            window.location.href = `mailto:yusrilsaiful97@gmail.com?subject=Pertanyaan&body=Halo, saya ingin bertanya. Email saya: ${userEmail}`;
        } else {
            alert("Silakan masukkan alamat email Anda terlebih dahulu.");
        }
    }
</script>

      <div class="company-info">
        <div class="b-corp">
          <img src="assets/images/logos/logommi.png" alt="B Corporation Logo" />
          <p>Certified Chicago Community Member</p>
          <p>Kami berkomitmen untuk mendidik dan berkolaborasi dengan bisnis yang sejalan dalam upaya menciptakan perubahan yang berdampak positif secara lingkungan dan sosial. Bersama-sama, kita dapat membuat perbedaan</p>
        </div>
        <div class="contact-info">
          <p>Selamat Datang, Hallo!</p>
          <p>Surabaya, Indonesia</p>
          <p>(773) 348-4581</p>
          <a href="mailto:enovativemanagemen@gmail.com">Contact</a>
        </div>
      </div>
    </div>
  </footer>

</body>
</html>
