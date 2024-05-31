<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    private $esp32_ip = 'http://192.168.11.134'; // Replace with your ESP32 IP address

    public function index()
    {
        $data = $this->getDataFromESP32();
        return view('dashboard', ['data' => $data]);
    }

    public function control(Request $request)
    {
        $angle1 = $request->input('angle1');
        $angle2 = $request->input('angle2');
        $fan = $request->input('fan');
        $pump = $request->input('pump');

        $this->sendCommandToESP32($angle1, $angle2, $fan, $pump);

        return redirect()->route('dashboard')->with('success', 'Command sent successfully');
    }

    public function data()
    {
        return Http::get($this->esp32_ip . '/data')->json();
    }

    private function sendCommandToESP32($angle1, $angle2, $fan, $pump)
    {
        $params = [
            'angle1' => $angle1,
            'angle2' => $angle2,
            'fan' => $fan,
            'pump' => $pump,
        ];

        Http::get($this->esp32_ip . '/control', $params);
    }

    private function getDataFromESP32()
    {
        return Http::get($this->esp32_ip . '/data')->json();
    }
}
