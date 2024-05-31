<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    private $esp32_ip = 'http://192.168.1.100'; // Replace with your ESP32 IP address

    public function index()
    {
        return view('dashboard');
    }

    public function fetchSensorData()
    {
        $response = Http::get($this->esp32_ip . '/data');
        return $response->json();
    }

    public function updateActuator(Request $request, $id)
    {
        $response = Http::get($this->esp32_ip . '/control?' . http_build_query($request->all()));
        // Handle response or error if needed
        return redirect()->route('dashboard')->with('success', 'Actuator updated successfully');
    }
}
