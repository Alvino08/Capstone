<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>SumAI</title>
</head>
<body>

    <!-- membuat Navigasi -->
    <x-navbar></x-navbar>

    <!-- Header -->
    <x-header></x-header>

    <!-- Konten -->
    <div class="w-full min-h-screen flex flex-col justify-center items-center px-4 py-12">
        <div class="max-w-screen-xl w-full flex flex-col lg:flex-row justify-center items-center gap-8">
            <!-- Teks Asli -->
            <div class="w-full lg:w-1/2">
                <p class="font-inter font-medium text-[20px] mb-2">Teks Asli</p>
                <form class="bg-white w-full h-[409px] rounded-lg border border-black/30 shadow p-4 text-[20px] font-inter font-medium">
                    <textarea class="w-full h-[85%] resize-none overflow-y-auto break-words p-2 rounded focus:outline-none" placeholder="Tulis sesuatu..."></textarea>
                    <p>0 kata</p>
                </form>
            </div>

            <!-- Hasil Ringkasan -->
            <div class="w-full lg:w-1/2">
                <p class="font-inter font-medium text-[20px] mb-2">Hasil Ringkasan</p>
                <div class="bg-[#F2F2F2] w-full h-[409px] rounded-lg border border-black/30 shadow p-4 text-[20px] font-inter font-medium flex items-end text-end">0 kata</div>
            </div>
        </div>

        <!-- Tombol -->
        <a href="/rangkuman" class="mt-10 inline-flex items-center justify-center w-[243px] h-[65px] bg-[#2563EB] text-white rounded-[10px] hover:bg-blue-900 transitiansition-all font-inter font-medium text-[20px]">
                Rangkum
        </a>
    </div>

    <!-- Berita Terkini -->
    <div class="w-full font-inter flex flex-col items-center shadow-md px-4 pt-10 pb-20 ">
        <div class="font-bold text-[32px] sm:text-[40px] md:text-[48px] text-center mb-8">Berita Terkini</div>
        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 max-w-screen-xl">
            @foreach ($latestNews as $item)
            <div class="flex flex-col items-center w-full">
                {{-- <img src="{{ asset($item->img ?? 'images/default-news.jpg') }}" alt="Gambar Berita" class="w-full max-w-[374px] h-[181px] rounded-[10px] object-cover" /> --}}
                <img src="{{ asset('storage/' . $item->img) }}" alt="Gambar Berita" class="w-full max-w-[374px] h-[181px] rounded-[10px] object-cover" />
                <div class="bg-white w-full max-w-[374px] h-[111px] rounded-[10px] border border-black p-[13px] -mt-10">
                    <p class="font-bold text-[18px] md:text-[20px] leading-6">{{ Str::limit($item->title, 40) }}</p>
                    <p class="text-[15px] mt-3 text-blue-600 hover:underline">
                        <a href="/artikel/{{ $item->slug }}">Baca Rangkuman</a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="font-medium text-[18px] md:text-[20px] mt-10 text-[#2563EB] hover:underline" href="/berita">Berita Lainnya</a>
    </div>

    <x-footer></x-footer>

</body>
</html>

