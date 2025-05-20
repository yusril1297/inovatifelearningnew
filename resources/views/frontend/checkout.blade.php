@extends('layouts.front')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 sm:py-12 lg:py-20 mb-20">
        @if ($course)
            <div class="bg-white shadow-md rounded-lg p-4 sm:p-6 mb-8">
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-4">Bayar Sekarang</h2>
                
                <!-- Mobile view (card layout) -->
                <div class="block sm:hidden space-y-4">
                    <div class="bg-gray-50 rounded-lg p-4">
                        <div class="font-medium text-gray-700">Produk</div>
                        <div class="font-semibold mt-1">{{ $course->title }}</div>
                        
                        <div class="flex justify-between mt-3 pt-3 border-t border-gray-200">
                            <span class="text-gray-600">Harga</span>
                            <span>Rp{{ number_format($course->price, 0, ',', '.') }}</span>
                        </div>
                        
                        <div class="flex justify-between mt-2">
                            <span class="text-gray-600">Jumlah</span>
                            <span>1</span>
                        </div>
                        
                        <div class="flex justify-between mt-2 pt-2 border-t border-gray-200 font-bold">
                            <span>Subtotal</span>
                            <span>Rp{{ number_format($course->price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                
                <!-- Desktop view (table layout) -->
                <div class="hidden sm:block">
                    <table class="w-full border rounded-lg overflow-hidden">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3 text-left">Produk</th>
                                <th class="p-3 text-right">Harga</th>
                                <th class="p-3 text-center">Jumlah</th>
                                <th class="p-3 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-t">
                                <td class="p-3">{{ $course->title }}</td>
                                <td class="p-3 text-right">Rp{{ number_format($course->price, 0, ',', '.') }}</td>
                                <td class="p-3 text-center">1</td>
                                <td class="p-3 text-right">Rp{{ number_format($course->price, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex justify-center sm:justify-end mt-6 sm:mt-10">
                <div class="w-full sm:w-3/4 md:w-1/2 bg-gray-100 p-4 sm:p-6 rounded-lg">
                    <h3 class="text-base sm:text-lg font-semibold">Total Keranjang Belanja</h3>
                    <div class="flex justify-between mt-2 sm:mt-4">
                        <span class="text-gray-700">Subtotal</span>
                        <span class="font-bold">Rp{{ number_format($course->price, 0, ',', '.') }}</span>
                    </div>
                    <button id="pay-button" class="w-full bg-blue-600 hover:bg-blue-700 transition-colors text-white font-semibold py-3 rounded-md mt-4 sm:mt-6 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Lanjutkan untuk Membayar
                    </button>
                </div>
            </div>
        @else
            <div class="bg-red-100 text-red-800 p-4 rounded-lg shadow-md">
                <p>Enrollment information is missing or invalid. Please try enrolling again.</p>
            </div>
        @endif
    </div>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var payButton = document.getElementById('pay-button');
            if (payButton) {
                payButton.onclick = function () {
                    // Show loading state
                    payButton.disabled = true;
                    payButton.innerHTML = '<span class="inline-block animate-spin mr-2">↻</span> Memproses...';
                    
                    fetch("{{ url('/payment/' . $enrollment->id) }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Failed to get snap token');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.snapToken) {
                            snap.pay(data.snapToken, {
                                onSuccess: function (result) {
                                    alert('Pembayaran berhasil! Menunggu konfirmasi...');
                                    window.location.href = `{{ url('/payment/success') }}/${data.order_id}`;
                                },
                                onPending: function (result) {
                                    alert('Pembayaran tertunda! Menunggu konfirmasi...');
                                },
                                onError: function (result) {
                                    alert('Pembayaran gagal! Silakan coba lagi.');
                                    // Reset button
                                    payButton.disabled = false;
                                    payButton.innerHTML = 'Lanjutkan untuk Membayar';
                                }
                            });
                        } else {
                            throw new Error('Snap token is missing in the response');
                        }
                    })
                    .catch(error => {
                        console.error(error.message);
                        // Reset button
                        payButton.disabled = false;
                        payButton.innerHTML = 'Lanjutkan untuk Membayar';
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    });
                };
            }
        });
    </script>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
@endsection