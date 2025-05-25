{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SumAI Riwayat</title>
</head>
<body class="flex flex-col min-h-screen">

<x-navbar></x-navbar>

    <main class="flex-grow min-h-screen pt-[89px]">
        <div class="h-auto flex justify-center py-10">
            <div class="w-[946px] space-y-5">
                @forelse ($riwayats as $riwayat)
                    <a href="{{ route('riwayat.show', $riwayat->id) }}" class="block">
                        <div class="rounded-2xl border p-6 shadow-sm hover:bg-gray-50 transition-all">
                            <p class="font-bold text-xl mb-2">{{ Str::limit($riwayat->original_text, 80) }}</p>
                            <p class="text-gray-700 text-base mb-2">{{ Str::limit($riwayat->summary_result, 200) }}</p>
                            <p class="text-sm text-right text-gray-500">{{ $riwayat->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                @empty
                    <div class="text-center text-gray-500 text-lg">Belum ada riwayat rangkuman.</div>
                @endforelse
            </div>
        </div>
    </main>

<x-footer></x-footer>

</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>SumAI Riwayat</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-screen">

    <x-navbar></x-navbar>

    <main class="flex-grow pt-[89px] min-h-screen">
        <div class="flex justify-center py-10 px-4">
            <div class="w-full max-w-5xl space-y-5">
                @forelse ($riwayats as $riwayat)
                    <a href="{{ route('riwayat.show', $riwayat->id) }}" class="block">
                        <div class="rounded-2xl border p-6 shadow-sm hover:bg-gray-50 transition-all">
                            <p class="font-bold text-lg md:text-xl mb-2">
                                {{ Str::limit($riwayat->original_text, 80) }}
                            </p>
                            <p class="text-gray-700 text-base mb-2">
                                {{ Str::limit($riwayat->summary_result, 200) }}
                            </p>
                            <p class="text-sm text-right text-gray-500">
                                {{ $riwayat->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </a>
                @empty
                    <div class="text-center text-gray-500 text-lg">Belum ada riwayat rangkuman.</div>
                @endforelse
            </div>
        </div>
    </main>

    <x-footer></x-footer>

</body>
</html>
