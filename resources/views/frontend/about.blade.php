@extends('layouts.front')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Banner Section -->
    <div class="relative bg-cover bg-center h-64 mb-10" style="background-image: url('/path/to/banner-image.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="text-center text-white">
                <h1 class="text-3xl font-bold">Tentang Kami</h1>
                <p class="text-lg">Website belajar terbaik seluruh dunia</p>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="text-center py-10">
        <h2 class="text-xl font-bold mb-4">Dibangun oleh para profesional</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemonstrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak. Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang ditempatkan untuk mendemonstrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan tata letak.
        </p>
    <p class="text-gray-600 max-w-2xl mx-auto mt-4">
        Kami berkomitmen untuk menyediakan platform pembelajaran yang berkualitas tinggi dengan materi yang disusun oleh para ahli di bidangnya. Dengan berbagai fitur interaktif dan dukungan penuh dari tim kami, kami yakin Anda akan mendapatkan pengalaman belajar yang menyenangkan dan bermanfaat.
    </p>
    </div>

    <!-- Partner Section -->
    <div class="text-center py-8">
        <h3 class="text-xl font-bold mb-6">Partner Kami</h3>
        <div class="flex flex-wrap justify-center gap-6">
            <img src="/path/to/partner-logo.png" alt="Partner Logo" class="h-16">
            <img src="/path/to/partner-logo.png" alt="Partner Logo" class="h-16">
            <img src="/path/to/partner-logo.png" alt="Partner Logo" class="h-16">
            <img src="/path/to/partner-logo.png" alt="Partner Logo" class="h-16">
            <img src="/path/to/partner-logo.png" alt="Partner Logo" class="h-16">
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="py-8">
        <h3 class="text-xl font-bold text-center mb-6">FAQ / Pertanyaan yang sering diajukan</h3>
        <div class="max-w-3xl mx-auto">
            <div class="border-b">
                <button class="w-full text-left py-4 text-blue-600 font-semibold" onclick="toggleFaq(this)">
                    Apakah ini penipuan?
                </button>
                <div class="px-4 pb-4 text-gray-600 hidden">
                    <p>Jaminan uang kembali jika Anda tidak percaya. Kami adalah platform terpercaya dengan banyak pengguna yang puas.</p>
                </div>
            </div>
            <div class="border-b">
                <button class="w-full text-left py-4 text-blue-600 font-semibold" onclick="toggleFaq(this)">
                    Bagaimana cara membeli kelas?
                </button>
                <div class="px-4 pb-4 text-gray-600 hidden">
                    <p>Anda dapat membeli kelas melalui halaman pembayaran kami. Pilih kelas yang Anda inginkan, lalu ikuti instruksi untuk menyelesaikan pembayaran.</p>
                </div>
            </div>
            <div class="border-b">
                <button class="w-full text-left py-4 text-blue-600 font-semibold" onclick="toggleFaq(this)">
                    Apa jaminan jika tidak puas?
                </button>
                <div class="px-4 pb-4 text-gray-600 hidden">
                    <p>Kami memberikan garansi uang kembali jika Anda tidak puas. Hubungi layanan pelanggan kami untuk informasi lebih lanjut.</p>
                </div>
            </div>

<script>
    function toggleFaq(button) {
        const content = button.nextElementSibling;
        content.classList.toggle('hidden');
    }
</script>
            <div class="border-b">
                <button class="w-full text-left py-4 text-blue-600 font-semibold" onclick="toggleFaq(this)">
                    Berapa lama akses materi kelas?
                </button>
                <div class="px-4 pb-4 text-gray-600 hidden">
                    <p>Akses materi kelas berlaku seumur hidup.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
