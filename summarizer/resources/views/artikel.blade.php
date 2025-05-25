<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>SumAI Artikel</title>
</head>
<body>
    <x-navbar></x-navbar>

    <div class="w-full min-h-screen pt-28 pb-10 font-inter flex flex-col items-center px-4 sm:px-6 md:px-10">
        <a class="w-full max-w-4xl text-left text-[#2563EB] font-medium text-sm md:text-base hover:underline mb-4" href="/berita">
            &laquo; Kembali ke daftar berita
        </a>

        <div class="w-full max-w-4xl">
            <!-- Judul dan tanggal ditengah untuk md ke atas -->
            <div class="text-center md:text-center">
                <p class="font-bold text-[24px] md:text-[32px] text-gray-900 mb-1">{{ $news->title }}</p>
                <p class="font-normal text-[16px] md:text-[18px] text-gray-500">
                    {{ $news->created_at->translatedFormat('d F Y, H:i') }}
                </p>
            </div>

            <img src="{{ asset('storage/' . $news->img) }}"
                 alt="Gambar Berita"
                 class="w-full h-auto max-h-[400px] object-cover rounded-2xl my-6" />

            <div class="font-medium text-[16px] md:text-[20px] text-justify leading-relaxed">
                {!! $news->body !!}
            </div>

            <a class="block mt-6 text-[#2563EB] font-medium text-sm md:text-base hover:underline" href="{{ $news->link }}">
                Menuju Link Berita &raquo;
            </a>

            @auth
                @if(auth()->user()?->is_admin)
                    <div x-data="{ open: false }" class="mt-8">
                        <!-- Tombol Hapus -->
                        <button @click="open = true"
                                class="bg-red-600 hover:bg-red-700 text-white font-semibold px-4 py-2 rounded-md transition-all">
                            Hapus Artikel
                        </button>

                        <!-- Modal Konfirmasi -->
                        <div x-show="open" x-transition
                            class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div @click.outside="open = false"
                                class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6 mx-4">
                                <h2 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
                                <p class="text-sm text-gray-600 mb-6">
                                    Apakah Anda yakin ingin menghapus artikel ini? Tindakan ini tidak dapat dibatalkan.
                                </p>
                                <div class="flex justify-end gap-2">
                                    <button @click="open = false"
                                            class="px-4 py-2 text-sm rounded-md border border-gray-300 text-gray-700 hover:bg-gray-100">
                                        Batal
                                    </button>
                                    <form action="{{ route('news.destroy', $news->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 text-sm rounded-md bg-red-600 text-white hover:bg-red-700">
                                            Ya, Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth


        </div>
    </div>

    <x-footer></x-footer>
</body>
</html>

