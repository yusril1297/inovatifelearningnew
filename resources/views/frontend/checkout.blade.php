@extends('layouts.front')

@section('content')

<div class="container">
    @if ($enrollment && $enrollment->course)
        <h2>Checkout - {{ $enrollment->course->title }}</h2>
        <p>Amount: Rp{{ number_format($enrollment->course->price, 2) }}</p>

        <button id="pay-button" class="btn btn-primary">Pay Now</button>
    @else
        <p>Enrollment information is missing or invalid. Please try enrolling again.</p>
    @endif
   
</div>


<script type="text/javascript">
 document.addEventListener('DOMContentLoaded', function () {
    var payButton = document.getElementById('pay-button');
    if (payButton) {
        payButton.onclick = function () {
            fetch(`{{ url('/payment/' . $enrollment->id) }}`, {
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
                snap.pay(data.snapToken); // Gunakan snapToken untuk membuka popup Midtrans
            })
            .catch(error => {
                console.error(error.message);
            });
        };
    }
});
  </script>




{{-- 
<script src="{{ asset('assets/js/main.js') }}"></script>  --}}
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('services.midtrans.client_key') }}"></script>


@endsection







{{-- <div class="flex flex-col gap-[10px] items-center">
    <div class="bg-gradient-to-r from-sky-100 to-blue-200 w-fit p-[8px_16px] rounded-full border border-[#adc7fe] flex items-center gap-[6px]">
        <div>
            <img src="{{ asset('assets/icon/medal-star.svg') }}" alt="icon">
        </div>
        <p class="font-medium text-sm text-[#1E90FF]">Invest In Yourself Today</p>
    </div>
    <h2 class="font-bold text-[40px] leading-[60px] text-neutral-800">Checkout Subscription</h2>
</div>
<div class="flex gap-10 px-[100px] relative z-10">
    <div class="w-[400px] flex shrink-0 flex-col bg-[#F5F8FA] rounded-2xl p-5 gap-4 h-fit">
        <p class="font-bold text-lg">Package</p>
        <div class="flex items-center justify-between w-full">
            <div class="flex items-center gap-3">
                <div class="w-[50px] h-[50px] flex shrink-0 rounded-full overflow-hidden">
                    <img src="{{ asset('assets/icon/Web Development 1.svg') }}" class="w-full h-full object-cover" alt="photo">
                </div>
                <div class="flex flex-col gap-[2px]">
                    <p class="font-semibold">Premium</p>
                    <p class="text-sm text-[#6D7786]">30 days access</p>
                </div>
            </div>
            <p class="p-[4px_12px] rounded-full bg-[#1E90FF] font-semibold text-xs text-white text-center">Popular
            </p>
        </div>
        <hr>
        <div class="flex flex-col gap-5">
            <div class="flex gap-3">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                </div>
                <p class="text-[#475466]">Access all course materials</p>
            </div>
            <div class="flex gap-3">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                </div>
                <p class="text-[#475466]">Unlock all course badges for jobs</p>
            </div>
            <div class="flex gap-3">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                </div>
                <p class="text-[#475466]">Receive premium rewards</p>
            </div>
        </div>
        <p class="font-semibold text-[28px] leading-[42px]">Rp 429000</p>
    </div>
    <form class="w-full flex flex-col bg-[#F5F8FA] rounded-2xl p-5 gap-5">
        <p class="font-bold text-lg">Send Payment</p>
        <div class="flex flex-col gap-5">
            <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Bank Name</p>
                </div>
                <p class="font-semibold">Angga Capital</p>
                <input type="hidden" name="bankName" value="Angga Capital">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Account Number</p>
                </div>
                <p class="font-semibold">22081996202191404</p>
                <input type="hidden" name="accountNumber" value="22081996202191404">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Account Name</p>
                </div>
                <p class="font-semibold">Alqowy Education First</p>
                <input type="hidden" name="accountName" value="Alqowy Education First">
            </div>
            <div class="flex items-center justify-between">
                <div class="flex gap-3">
                    <div class="w-6 h-6 flex shrink-0">
                        <img src="{{ asset('assets/icon/tick-circle.svg') }}" class="w-full h-full object-cover" alt="icon">
                    </div>
                    <p class="text-[#475466]">Code Swift</p>
                </div>
                <p class="font-semibold">ACEFIRSTBANK</p>
                <input type="hidden" name="swift" value="ACEFIRSTBANK">
            </div>
        </div>
        <hr>
        <p class="font-bold text-lg">Confirm Your Payment</p>
        <div class="relative">
            <button type="button"
                class="p-4 rounded-full flex gap-3 w-full ring-1 ring-black transition-all duration-300 hover:ring-2 hover:ring-[#1E90FF]"
                onclick="document.getElementById('file').click()">
                <div class="w-6 h-6 flex shrink-0">
                    <img src="{{ asset('assets/icon/note-add.svg') }}" alt="icon">
                </div>
                <p id="fileLabel">Add a file attachment</p>
            </button>
            <input id="file" type="file" name="file" class="hidden" onchange="updateFileName(this)">
        </div>
        <button
            class="p-[20px_32px] bg-[#1E90FF] text-white rounded-full text-center font-semibold transition-all duration-300 hover:shadow-[0_10px_20px_0_#adc7fe]">I've
            Made The Payment</button>
    </form>
</div>
<div class="flex justify-center absolute transform -translate-x-1/2 left-1/2 bottom-0 w-full">
    <img src="{{ asset('assets/background/alqowy.svg') }}" alt="background">
</div>
{{-- End Checkout --}}