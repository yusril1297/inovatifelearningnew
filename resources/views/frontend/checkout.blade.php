@extends('layouts.front')

@section('content')
    <div class="container mx-auto max-w-9xl min-h-100x50 py-20 mb-20 pb-20">
        @if ($course)
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Bayar Sekarang</h2>
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

            <div class="flex justify-end mt-10">
                <div class="w-full md:w-1/2 bg-gray-100 p-6 rounded-lg">
                    <h3 class="text-lg font-semibold">Total Keranjang Belanja</h3>
                    <div class="flex justify-between mt-2">
                        <span>Subtotal</span>
                        <span class="font-bold">Rp{{ number_format($course->price, 0, ',', '.') }}</span>
                    </div>
                    <button id="pay-button" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-md mt-4">
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
                                }
                            });
                        } else {
                            throw new Error('Snap token is missing in the response');
                        }
                    })
                    .catch(error => {
                        console.error(error.message);
                    });
                };
            }
        });
    </script>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
@endsection
