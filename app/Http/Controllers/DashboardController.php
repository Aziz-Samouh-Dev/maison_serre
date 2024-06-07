<?php

namespace App\Http\Controllers;

use App\Models\Indicator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    // private $esp32_ip = 'http://192.168.11.134';

    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $latestIndicator = Indicator::latest()->first();

        return view('dashboard', compact('latestIndicator'));
    }

    public function getLatestIndicator()
    {
        $latestIndicator = Indicator::latest()->first(); // Retrieves the latest entry
        return response()->json($latestIndicator);
    }
}
