@extends('layouts.front')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Banner Section -->
    <div class="banner">
        <h1>Website belajar terbaik seluruh dunia</h1>
        <h2>Dibangun oleh para profesional</h2>
    </div>

    <!-- Description Section -->
    <div class="description">
        <p>PT Integrasi Bisnis Eksekutif, perusahaan teknologi yang berfokus pada pengembangan dan implementasi solusi industri 4.0. Berdiri sejak tahun 2017 sebagai perusahaan jasa riset perangkat lunak, IBE REALITY telah tumbuh menjadi entitas yang memiliki kompetensi unggul dalam bidang teknologi perangkat lunak dan robotika. Seiring berkembangnya era digital dan kebutuhan industri akan transformasi cerdas, IBE REALITY menghadirkan tiga pilar utama layanan untuk mendukung adaptasi menuju industri 4.0. Pilar pertama, IBE LEARNING, merupakan platform edukasi yang menyediakan pembelajaran robotika interaktif untuk berbagai jenjang pendidikan. Pilar kedua, IBE STORE, menjadi pusat penjualan komponen elektronik, alat edukasi, dan produk teknologi berbasis robotika. Sementara itu, pilar ketiga, IBE REALITY, menyediakan layanan konsultasi dan implementasi teknologi untuk perusahaan yang ingin mengadopsi sistem berbasis industri 4.0 secara menyeluruh dan terintegrasi.

</p>
    </div>

    <style> 
        /* Banner Section */
        .banner {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 2rem;
            background-image: url('https://i.pinimg.com/736x/43/0b/69/430b69231cffa6d4e23ab6e9f7c2d6dc.jpg'); /* Ganti dengan path gambar kamu */
            background-size: cover;
            background-position: center;
            color: white; /* Menambahkan teks putih agar kontras dengan gambar */
            height: 400px; /* Atur tinggi banner sesuai kebutuhan */
        }

        .banner h1 {
            font-size: 48px;
            margin-bottom: 1rem;
        }

        .banner h2 {
            font-size: 24px;
        }

        /* Description Section */
        .description {
            padding: 2rem;
            text-align: center;
            background: #fff;
        }
    </style>
</div>


    

     {{-- Dokumentasi Mengajar --}}
     <div class="container px-[20px] max-w-full py-10 mr-[20px]">
        <!-- Menambahkan teks "Dokumentasi Mengajar" di atas konten -->
        <h1 class="text-4xl font-bold text-center mb-8">Dokumentasi Mengajar</h1>
    
        <div class="flex justify-center w-full">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all ">
                    <img src="https://gurulesku.id/wp-content/uploads/2020/01/Lowongan-Tentor-Les-Privat.jpg" alt="Karya 1" class="w-full">
                    <div class="p-4 text-center">
                        <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                        <p class="text-xs text-gray-500">Ini adalah karya yang dibuat sekitar tujuh minggu lalu, dengan hasil percetakan 3D yang sangat detail dan cermat, menghasilkan desain yang unik dan fungsional.</p>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <img src="https://assets.kompasiana.com/items/album/2023/01/07/les-privat-ke-rumah-63b96aba08a8b541570edde2.jpg" alt="Karya 2" class="w-full">
                    <div class="p-4 text-center">
                        <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                        <p class="text-xs text-gray-500">Proyek ini selesai sekitar tujuh minggu yang lalu, memanfaatkan teknologi pencetakan 3D untuk membuat laci dengan desain yang modern dan sangat praktis.</p>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all">
                    <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 3" class="w-full">
                    <div class="p-4 text-center">
                        <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                        <p class="text-xs text-gray-500">Karya ini selesai tercipta sekitar tujuh minggu lalu, menggabungkan seni dan teknologi untuk menghasilkan produk laci yang estetis sekaligus fungsional dengan teknologi pencetakan 3D.</p>
                    </div>
                </div>
                <div class="border rounded-lg overflow-hidden shadow-lg hover:shadow-xl transform hover:scale-105 transition-all>
                    <img src="https://fomu.co.id/wp-content/uploads/2023/10/slider-1.jpg" alt="Karya 4" class="w-full">
                    <div class="p-4 text-center">
                        <p class="text-sm text-gray-600 font-bold">Kegiatan Mengajar</p>
                        <p class="text-xs text-gray-500">Karya ini selesai tercipta sekitar tujuh minggu lalu, menggabungkan seni dan teknologi untuk menghasilkan produk laci yang estetis sekaligus fungsional dengan teknologi pencetakan 3D.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--  --}}
    <!-- dokuemtadi-->

    <!-- FAQ Section -->
     <!-- FAQ -->
     <section id="FAQ" class="max-w-full mx-auto flex flex-col py-[70px] px-[20px] bg-[#F5F8FA] rounded-[30px]">
    <div class="flex flex-col items-center mb-10">
        <h2 class="text-3xl font-bold text-center mb-4">Pertanyaan yang Sering Diajukan</h2>
        <p class="text-lg text-center text-gray-600">Temukan jawaban atas beberapa pertanyaan yang paling umum di bawah ini.</p>
    </div>
    <div class="flex justify-center">
        <!-- Container utama FAQ dengan grid dan rounded border -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px] w-full max-w-full bg-white p-[30px] rounded-[30px]">
            <!-- Kolom FAQ 1 -->
            <div class="flex flex-col gap-[30px] w-full">
                <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                        <span class="font-semibold text-lg text-left">Apakah pemula bisa mengikuti kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-1" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Ya, kami telah menyediakan berbagai macam kursus dari tingkat pemula hingga menengah untuk mempersiapkan karir besar Anda berikutnya.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                        <span class="font-semibold text-lg text-left">Berapa lama waktu yang dibutuhkan untuk implementasi?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-2" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolore placeat ut nostrum aperiam mollitia tempora aliquam perferendis explicabo eligendi commodi.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                        <span class="font-semibold text-lg text-left">Apakah Anda menyediakan program jaminan pekerjaan?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-3" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae itaque facere ipsum animi sunt iure!</p>
                    </div>
                </div>
                
            </div>

            <!-- Kolom FAQ 2 -->
            <div class="flex flex-col gap-[30px] w-full">
                <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-5">
                        <span class="font-semibold text-lg text-left">Apa saja yang harus saya persiapkan sebelum mengikuti kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-5" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tristique turpis, ut sagittis sapien.</p>
                    </div>
                </div>
                <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-5">
                        <span class="font-semibold text-lg text-left">Apa saja yang harus saya persiapkan sebelum mengikuti kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-5" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tristique turpis, ut sagittis sapien.</p>
                    </div>
                </div>

               <div class="flex flex-col p-5 rounded-[30px] bg-[#F5F8FA] border-t-4 border-[#3c64ff] w-full">
                    <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-5">
                        <span class="font-semibold text-lg text-left">Apa saja yang harus saya persiapkan sebelum mengikuti kursus?</span>
                        <div class="arrow w-9 h-9 flex shrink-0">
                            <img src="assets/icon/add.svg" alt="icon">
                        </div>
                    </button>
                    <div id="accordion-faq-5" class="accordion-content hide">
                        <p class="leading-[30px] text-[#475466] pt-[10px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet tristique turpis, ut sagittis sapien.</p>
                    </div>
                </div>

                

            </div>
        </div>
    </div>
</section>


<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        content.classList.toggle('hidden');
    }
</script>
            
       
    </div>
</div>
@endsection
