<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Footer Design</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <footer class="bg-[#141E61] text-white py-10">
    <div class="container mx-auto px-6 flex flex-col lg:flex-row justify-between items-center lg:items-start space-y-8 lg:space-y-0 lg:space-x-8">

      <!-- Newsletter Section -->
      <div class="flex-1 lg:flex-initial w-full lg:w-1/3">
        <h2 class="text-xl mb-4">Ajukan Pertanyaan Jika Masih Bingung</h2>
        <input type="email" id="emailInput" placeholder="Email Address" class="w-full p-3 mb-4 text-black bg-gray-200 border border-gray-300"/>
        <button onclick="sendEmail()" class="w-full p-3 bg-yellow-500 text-white border-none cursor-pointer mb-4">Sign me up</button>
        <p class="text-sm"><a href="mailto:yusrilsaiful97@gmail.com" class="text-white hover:underline">Hubungi via Email</a></p>
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

      <!-- Company Info Section -->
      <div class="flex-1 lg:flex-2 flex flex-col lg:flex-row justify-between items-center lg:items-start space-y-6 lg:space-y-0 lg:w-2/3">

        <!-- B-Corp Section -->
        <div class="flex-1 w-full lg:w-1/3 text-center lg:text-left">
          <img src="assets/images/logos/logommi.png" alt="B Corporation Logo" class="w-32 mb-4 mx-auto lg:mx-0"/>
          <p class="text-sm mb-4">Certified Chicago Community Member</p>
          <p class="text-sm mb-4">Kami berkomitmen untuk mendidik dan berkolaborasi dengan bisnis yang sejalan dalam upaya menciptakan perubahan yang berdampak positif secara lingkungan dan sosial. Bersama-sama, kita dapat membuat perbedaan.</p>
        </div>

        <!-- Contact Info Section -->
        <div class="flex-1 w-full lg:w-1/3 text-center lg:text-right">
          <p class="text-sm mb-4">Selamat Datang, Hallo!</p>
          <p class="text-sm mb-4">Surabaya, Indonesia</p>
          <p class="text-sm mb-4">(773) 348-4581</p>
          <a href="mailto:enovativemanagemen@gmail.com" class="text-yellow-500 hover:underline">Contact</a>
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
