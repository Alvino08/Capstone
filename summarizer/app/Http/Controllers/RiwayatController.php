<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Riwayat;

class RiwayatController extends Controller
{
    // Menampilkan riwayat user yang sedang login
    
    public function index()
    {
        $riwayats = Riwayat::where('user_id', Auth::id())->latest()->get();
        return view('riwayat', compact('riwayats'));
    }

    public function show($id)
    {
        $riwayat = Riwayat::where('id', $id)
            ->where('user_id', Auth::id()) // hanya milik user login
            ->firstOrFail();

        return view('riwayat-detail', compact('riwayat'));
    }

    public function destroy($id)
    {
        $userId = Auth::id(); // tenang bagi Intelephense

        $riwayat = Riwayat::where('id', $id)
                    ->where('user_id', $userId)
                    ->firstOrFail();

        $riwayat->delete();

        return redirect()->route('riwayat.index')->with('success', 'Riwayat berhasil dihapus.');
    }
    
}
