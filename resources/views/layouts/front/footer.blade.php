
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Footer Design</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.js"></script>
  <!-- Font Awesome CDN for social media icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen flex flex-col">

  <footer class="bg-[#141E61] text-white">
    <div class="container mx-auto px-4 py-8">
      <!-- Footer content container -->
      <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Newsletter Section -->
        <div class="w-full lg:w-1/3">
          <h2 class="text-xl font-semibold mb-3">Ajukan Pertanyaan Jika Masih Bingung</h2>
          <div class="flex flex-col sm:flex-row mb-2">
            <input 
              type="email" 
              id="emailInput" 
              placeholder="Email Address" 
              class="w-full sm:w-2/3 p-2 text-black bg-gray-100 border border-gray-300 rounded-md mb-2 sm:mb-0 sm:mr-2"
            />
            <button 
              onclick="sendEmail()" 
              class="bg-yellow-600 hover:bg-yellow-700 transition-colors text-white py-2 px-4 rounded-md"
            >
              Sign me up
            </button>
          </div>
          <p class="text-sm mt-2"><a href="mailto:admin@ibereality.com" class="hover:underline">Hubungi via Email</a></p>
          
          <!-- Social Media Icons -->
          <div class="mt-4 flex space-x-4">
            <a href="https://facebook.com/share/16MMY4vRw2/" target="_blank" class="text-white text-2xl hover:text-yellow-500 transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://instagram.com/ibereality/" target="_blank" class="text-white text-2xl hover:text-yellow-500 transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="https://tiktok.com/@ibereality" target="_blank" class="text-white text-2xl hover:text-yellow-500 transition-colors">
              <i class="fab fa-tiktok"></i>
            </a>
          </div>
        </div>
        
        <!-- Company Info Section -->
        <div class="w-full lg:w-2/3 flex flex-col md:flex-row gap-6">
          <!-- B-Corp Info -->
          <div class="w-full md:w-1/2">
            <p class="font-medium mb-2">Certified Chicago Community Member</p>
            <p class="text-sm mb-4">PT Integrasi Bisnis Eksekutif merupakan perusahaan teknologi yang fokus membangun ekosistem dengan tiga pilar model yaitu layanan teknologi, penyedia teknologi, dan pembelajaran teknologi.</p>
          </div>
          
          <!-- Contact Info -->
          <div class="w-full md:w-1/2 md:text-right">
            <p class="font-medium mb-2">Selamat Datang, Hallo!</p>
            <p class="text-sm mb-2">Gedung PIDI4.0, Jl. Raya Kby. Lama Lantai 8, Sukabumi Sel., Kec. Kb. Jeruk, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 11560</p>
            <p class="text-sm mb-2">+6281236868738</p>
            <a href="https://wa.me/+6281236868738" class="inline-block mt-1 text-yellow-500 hover:underline">Contact</a>
          </div>
        </div>
      </div>
      
      <!-- Copyright section -->
      <div class="pt-6 mt-6 border-t border-gray-700 text-center sm:text-left text-sm">
        <p>&copy; 2025 IBE Reality. All rights reserved.</p>
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