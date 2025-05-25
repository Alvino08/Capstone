<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>SumAI Berita</title>
</head>
<body>
    <x-navbar></x-navbar>

    <div class="font-inter w-full flex flex-col items-center mb-10 pt-[85px] px-4">
        <div class="mb-6 text-center">
            <p class="mt-5 font-bold text-[32px] md:text-[48px] leading-tight">Berita Terkini</p>
            @if(Auth::check() && Auth::user()->is_admin)
                <a href="/post">
                    <div class="w-[164px] h-[44px] border border-[#2563EB] rounded-[20px] mx-auto text-center pt-2 hover:bg-[#2563EB1a] transition cursor-pointer">
                        <p class="text-[#2563EB] font-semibold text-[18px] md:text-[20px]">Buat Berita</p>
                    </div>
                </a>
            @endif
        </div>

        @if ($news->count() > 0)
            @php $highlight = $news->first(); @endphp

            {{-- Highlight Berita Pertama --}}
            <a href="/artikel/{{ $highlight->slug }}"
               class="w-full max-w-[1280px] mb-6 flex flex-col lg:flex-row items-center lg:items-start lg:justify-center 
                      border lg:shadow-md lg:rounded-[15px] lg:border-black-200 overflow-hidden bg-white">
                <img src="{{ asset('storage/' . ($highlight->img ?? 'placeholder.png')) }}"
                     alt="{{ $highlight->slug }}"
                     class="w-full max-w-[687px] h-[200px] md:h-[300px] lg:h-[355px] object-cover rounded-t-[15px] lg:rounded-l-[15px] lg:rounded-tr-none" />

                <div class="w-full max-w-[651px] p-5">
                    <p class="font-bold text-[22px] md:text-[26px] lg:text-[30px] leading-snug mb-2">
                        {{ $highlight->title }}
                    </p>
                    <p class="font-medium text-[16px] md:text-[18px] lg:text-[20px] leading-6 mt-2">
                        {{ Str::limit($highlight->body, 178) }}
                    </p>
                    <p class="font-medium text-[13px] mt-4 text-blue-600 underline">
                        Lihat Lebih Lengkap
                    </p>
                </div>
            </a>

            {{-- Grid Berita Lain --}}
            <div class="w-full max-w-[1280px] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-2 sm:px-4 md:px-6">
                @foreach ($news->skip(1) as $item)
                    <div class="bg-white border shadow rounded-[10px] overflow-hidden">
                        <img 
                            src="{{ asset('storage/' . ($item->img ?? 'placeholder.png')) }}" 
                            alt="Gambar Berita" 
                            class="w-full h-[200px] object-cover"
                        />
                        <div class="p-4">
                            <p class="font-semibold text-lg text-gray-800 leading-tight">
                                {{ Str::limit($item->title, 60) }}
                            </p>
                            <p class="mt-2 text-sm text-blue-600 hover:underline">
                                <a href="/artikel/{{ $item->slug }}">Baca Rangkuman</a>
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-xl text-gray-600 mt-10">Belum ada berita yang tersedia.</p>
        @endif
    </div>

    <x-footer></x-footer>
</body>

</html>

