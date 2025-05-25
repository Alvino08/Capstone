<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Riwayat;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SaveSummaryToRiwayat;

class SummaryController extends Controller
{
    // public function summarize(Request $request)
    // {
    //     $request->validate([
    //         'text' => 'required|string|min:5',
    //     ]);

    //     $response = Http::post('http://127.0.0.1:8000/summarize', [
    //         'text' => $request->input('text'),
    //     ]);

    //     if ($response->successful()) {
    //         return redirect()->back()
    //             ->withInput()
    //             ->with('summary', $response->json()['summary']);
    //     } else {
    //         return redirect()->back()
    //             ->withErrors(['msg' => 'Gagal merangkum. Pastikan FastAPI aktif.']);
    //     }
    // }

    // public function summarize(Request $request)
    // {
    //     $request->validate([
    //         'text' => 'required|string|min:5',
    //     ]);

    //     $response = Http::post('http://127.0.0.1:8000/summarize', [
    //         'text' => $request->input('text'),
    //     ]);

    //     if ($response->successful()) {
    //         $summary = $response->json()['summary'];

    //         // ✅ Tambahkan penyimpanan ke tabel riwayat
    //         $riwayat = new Riwayat([
    //             'original_text' => $request->input('text'),
    //             'summary_result' => $summary,
    //         ]);
    //         $riwayat->user_id = Auth::id(); // hanya jika ada kolom user_id
    //         $riwayat->save();

    //         return redirect()->back()
    //             ->withInput()
    //             ->with('summary', $summary);
    //     } else {
    //         return redirect()->back()
    //             ->withErrors(['msg' => 'Gagal merangkum. Pastikan FastAPI aktif.']);
    //     }
    // }

    //     public function summarize(Request $request)
    // {
    //     $request->validate([
    //         'text' => 'required|string|min:5',
    //     ]);

    //     $response = Http::post('http://127.0.0.1:8000/summarize', [
    //         'text' => $request->input('text'),
    //     ]);

    //     if ($response->successful()) {
    //         $summary = $response->json()['summary'];

    //         // ✅ Simpan hanya jika user sudah login
    //         if (Auth::check()) {
    //             $riwayat = new Riwayat([
    //                 'original_text' => $request->input('text'),
    //                 'summary_result' => $summary,
    //             ]);
    //             $riwayat->user_id = Auth::id();
    //             $riwayat->save();
    //         }

    //         return redirect()->back()
    //             ->withInput()
    //             ->with('summary', $summary);
    //     } else {
    //         return redirect()->back()
    //             ->withErrors(['msg' => 'Gagal merangkum. Pastikan FastAPI aktif.']);
    //     }
    // }

    public function summarize(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:5',
        ]);

        $response = Http::post('http://3.234.167.241:8000/summarize', [
            'text' => $request->input('text'),
        ]);

        if ($response->successful()) {
            $summary = $response->json()['summary'];

            if (Auth::check()) {
                dispatch(new SaveSummaryToRiwayat(
                    Auth::id(),
                    $request->input('text'),
                    $summary
                ));
            }

            return redirect()->back()
                ->withInput()
                ->with('summary', $summary);
        } else {
            return redirect()->back()
                ->withErrors(['msg' => 'Gagal merangkum. Pastikan FastAPI aktif.']);
        }
    }
}