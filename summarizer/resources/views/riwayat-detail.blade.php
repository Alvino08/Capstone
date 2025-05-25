<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Riwayat</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-screen overflow-x-hidden">

    <x-navbar />

    <div class="w-full flex-grow pt-28 pb-10 font-inter flex flex-col items-center px-4 sm:px-6 md:px-10">
        <a href="{{ route('riwayat.index') }}" class="w-full max-w-3xl text-left text-[#2563EB] font-medium text-sm md:text-base hover:underline mb-4">
            &laquo; Kembali ke daftar riwayat
        </a>

        <div class="w-full max-w-3xl mt-4 bg-white shadow-lg rounded-2xl p-6 sm:p-8">
            <h1 class="font-bold text-xl sm:text-2xl md:text-[30px] mb-4 text-gray-800">Teks Asli</h1>
            <p class="break-words text-base sm:text-lg md:text-[18px] text-justify text-gray-700 leading-relaxed">
                {{ $riwayat->original_text }}
            </p>

            <h2 class="font-bold text-xl sm:text-2xl md:text-[30px] mt-10 mb-4 text-gray-800">Hasil Rangkuman</h2>
            <p class="break-words text-base sm:text-lg md:text-[18px] text-justify text-gray-700 leading-relaxed">
                {{ $riwayat->summary_result }}
            </p>

            <!-- Tombol Hapus -->
            <div class="mt-10 text-right">
                <button onclick="toggleModal()" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 sm:px-6 py-2 rounded-lg shadow">
                    Hapus Riwayat
                </button>
            </div>
            <a href="{{ route('riwayat.index') }}" class="w-full max-w-3xl text-left text-[#2563EB] font-medium text-sm md:text-base hover:underline mb-4">
                &laquo; Kembali ke daftar riwayat
            </a>

        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center z-50 hidden">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-lg w-[90%] max-w-md mx-auto">
            <h2 class="text-lg sm:text-xl font-semibold text-gray-800 mb-4">Konfirmasi Hapus</h2>
            <p class="text-gray-600 text-sm sm:text-base mb-6">
                Apakah Anda yakin ingin menghapus riwayat ini? Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex flex-col sm:flex-row sm:justify-end sm:space-x-4 space-y-3 sm:space-y-0">
                <button onclick="toggleModal()" class="w-full sm:w-auto px-4 py-2 rounded bg-gray-200 hover:bg-gray-300 text-gray-800">
                    Batal
                </button>
                <form action="{{ route('riwayat.destroy', $riwayat->id) }}" method="POST" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full sm:w-auto px-4 py-2 rounded bg-red-500 hover:bg-red-600 text-white">
                        Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>

    <x-footer />

    <script>
        function toggleModal() {
            const modal = document.getElementById('confirmationModal');
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }
    </script>
</body>
</html>
