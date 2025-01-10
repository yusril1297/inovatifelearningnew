<!-- ========== FOOTER ========== -->

<footer
    class="mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-[#141E61] w-full">
    <div class="flex justify-between">
        <div class="flex flex-col gap-5">
            <p class="font-bold text-2xl text-white">Innovative Learning</p>
        </div>
        <div class="flex flex-col gap-5">
            <p class="font-semibold text-lg text-white">Courses</p>
            <ul class="flex flex-col gap-[14px]">
                @foreach ($categories as $category)
                <li>
                    <a href="{{ route('frontend.categories', $category->slug) }}" class="text-white hover:text-blue-500">{{ $category->name }}</a>
                </li>
                @endforeach
            </ul>
           
        </div>
        <div class="flex flex-col gap-5">
            <p class="font-semibold text-lg text-white">Company</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a href="" class="text-white hover:text-blue-500">Instructor</a>
                </li>
            </ul>
        </div>
        <div class="flex flex-col gap-5">
            <p class="font-semibold text-lg text-white">Resources</p>
            <ul class="flex flex-col gap-[14px]">
                <li>
                    <a href="" class="text-white hover:text-blue-500">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="w-full h-[51px] flex items-end border-t border-[#E7EEF2]">
        <p class="mx-auto text-sm text-white -tracking-[2%]">All Rights Reserved Innovative 2025</p>
    </div>
</footer>
<!-- ========== END FOOTER ========== -->
