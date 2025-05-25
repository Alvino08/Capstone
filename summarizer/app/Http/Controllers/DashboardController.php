<?php

namespace App\Http\Controllers;
use App\Models\News;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $latestNews = News::latest()->take(3)->get();

        return view('dashboard', compact('latestNews'));
    }
}
