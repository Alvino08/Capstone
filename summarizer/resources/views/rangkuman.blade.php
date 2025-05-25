{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>SumAI Rangkuman</title>
</head>
<body>
    
    <x-navbar></x-navbar>

    <div class="w-full min-h-screen flex flex-col justify-center items-center">
        <form method="POST" action="{{ route('summarize') }}" class="flex flex-col items-center mt-[100px] space-y-6">
            @csrf
            <div class="flex justify-center items-start space-x-6">
                <!-- Teks Asli -->
                <div class="w-[597px]">
                    <p class="mt-[25px] mx-[25px] mb-2 font-inter font-[500] text-[20px]">Teks Asli</p>
                    <div class="bg-[#FFFFFF] ml-[25px] mr-[12px] w-[560px] h-[409px] rounded-[8px] outline outline-[#00000047] shadow p-[16px] font-inter font-[500] text-[20px]">
                        <textarea
                            name="text"
                            class="w-full h-[90%] resize-none overflow-y-auto break-words p-2 rounded focus:outline-none focus:ring-0"
                            placeholder="Tulis sesuatu...">{{ old('text') }}</textarea>
                        <p>{{ str_word_count(old('text')) }} kata</p>
                    </div>
                </div>

                <!-- Hasil Ringkasan -->
                <div class="w-[597px]">
                    <p class="mt-[25px] mx-[15px] mb-2 font-inter font-[500] text-[20px]">Hasil Ringkasan</p>
                    <div class="bg-[#F2F2F2] mx-[15px] w-[560px] h-[409px] rounded-[8px] outline outline-[#00000047] shadow p-[16px] font-inter font-[500] text-[18px] overflow-y-auto">
                        @if(session('summary'))
                            {{ session('summary') }}
                        @else
                            <p class="text-[#898989] text-center mt-[180px]">Hasil ringkasan akan muncul di sini</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tombol Rangkum -->
            <button type="submit" class="w-[200px] h-[50px] bg-[#2563EB] text-white rounded hover:bg-blue-900 transition-all text-[18px]">
                Rangkum
            </button>
        </form>
    </div>

    <a class="w-full h-[189px] flex flex-col items-center justify-center" href="/riwayat">
        <img src="{{ asset('build/assets/images/riwayat.png') }}" alt="Riwayat" class="w-[110px] h-[110px] rounded-[100px] p-[10px] outline outline-[#C8C8C8]">
        <p class="font-inter font-[500] text-[20px] text-[#898989] m-[11px]">Riwayat</p>
    </a>

    <x-footer></x-footer>

</body>
</html>
 --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>SumAI Rangkuman</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    
    <x-navbar></x-navbar>

    <div class="w-full min-h-screen flex flex-col items-center px-4 pb-10 pt-30">
        <form method="POST" action="{{ route('summarize') }}" class="flex flex-col items-center w-full max-w-[1280px] space-y-6">
            @csrf

            {{-- <div class="w-full flex flex-col-reverse md:flex-row justify-center items-start gap-6 px-4">
                <!-- Teks Asli -->
                <div class="w-full md:w-[597px]">
                    <p class="mt-4 mb-2 font-inter font-medium text-[20px]">Teks Asli</p>
                    <div class="bg-white w-full md:w-[560px] h-[409px] rounded-lg outline outline-[#00000047] shadow p-4 font-inter text-[20px]">
                        <textarea
                            name="text"
                            class="w-full h-[85%] resize-none overflow-y-auto break-words p-2 rounded focus:outline-none focus:ring-0"
                            placeholder="Tulis sesuatu...">{{ old('text') }}</textarea>
                        <p class="text-sm mt-2">{{ str_word_count(old('text')) }} kata</p>
                    </div>
                </div>

                <!-- Hasil Ringkasan -->
                <div class="w-full md:w-[597px]">
                    <p class="mt-4 mb-2 font-inter font-medium text-[20px]">Hasil Ringkasan</p>
                    <div class="bg-[#F2F2F2] w-full md:w-[560px] h-[409px] rounded-lg outline outline-[#00000047] shadow p-4 font-inter text-[18px] overflow-y-auto">
                        @if(session('summary'))
                            {{ session('summary') }}
                        @else
                            <p class="text-[#898989] text-center mt-[180px]">Hasil ringkasan akan muncul di sini</p>
                        @endif
                    </div>
                </div>
            </div> --}}

            <div class="w-full flex flex-col-reverse md:flex-row justify-center items-start gap-6 px-4">
                <!-- Teks Asli -->
                <div class="w-full md:flex-1 max-w-[560px] mx-auto">
                    <p class="mt-4 mb-2 font-inter font-medium text-[20px] text-center md:text-left">Teks Asli</p>
                    <div class="bg-white w-full h-[409px] rounded-lg outline outline-[#00000047] shadow p-4 font-inter text-[20px]">
                        <textarea
                            name="text"
                            class="w-full h-[85%] resize-none overflow-y-auto break-words p-2 rounded focus:outline-none focus:ring-0"
                            placeholder="Tulis sesuatu...">{{ old('text') }}</textarea>
                        <p class="text-sm mt-2">{{ str_word_count(old('text')) }} kata</p>
                    </div>
                </div>

                <!-- Hasil Ringkasan -->
                <div class="w-full md:flex-1 max-w-[560px] mx-auto">
                    <p class="mt-4 mb-2 font-inter font-medium text-[20px] text-center md:text-left">Hasil Ringkasan</p>
                    <div class="bg-[#F2F2F2] w-full h-[409px] rounded-lg outline outline-[#00000047] shadow p-4 font-inter text-[18px] overflow-y-auto">
                        @if(session('summary'))
                            {{ session('summary') }}
                        @else
                            <p class="text-[#898989] text-center mt-[180px]">Hasil ringkasan akan muncul di sini</p>
                        @endif
                    </div>
                </div>
            </div>



            <!-- Tombol Rangkum -->
            <button type="submit" class="w-[200px] h-[50px] bg-[#2563EB] text-white rounded hover:bg-blue-900 transition-all text-[18px]">
                Rangkum
            </button>
        </form>
    </div>

    <!-- Tombol Riwayat -->
    <a class="w-full h-auto py-10 flex flex-col items-center justify-center" href="/riwayat">
        <img src="{{ asset('images/riwayat.png') }}" alt="Riwayat" class="w-[110px] h-[110px] rounded-full p-2 outline outline-[#C8C8C8]">
        <p class="font-inter font-medium text-[20px] text-[#898989] mt-2">Riwayat</p>
    </a>

    <x-footer></x-footer>

</body>
</html>
