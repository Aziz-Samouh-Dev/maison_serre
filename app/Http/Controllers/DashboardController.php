<?php

namespace App\Http\Controllers;

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

    // public function data()
    // {
    //     // return Http::get($this->esp32_ip . '/data')->json();
    // }
    // public function data()
    // {
    //     // $response = Http::get($this->esp32_ip . '/data');
    //     // $data = $response->json();

    //     // Format data as needed for the chart
    //     return response()->json([
    //         // 'value' => $data['value']
    //     ]);
    // }

    public function data()
    {
        // Simulate data for testing
        $value = rand(0, 100); // Generate a random value between 0 and 100

        return response()->json([
            'value' => $value
        ]);
    }

    public function runSensor()
    {
        // $response = Http::get($this->esp32_ip . '/run-sensor');
        // return response()->json($response->json());
        return response()->json(['status' => 'Sensor run successfully']);

    }

    public function showResources()
    {
        // $response = Http::get($this->esp32_ip . '/resources');
        // return response()->json($response->json());
        return response()->json(['cpu' => rand(1, 100), 'memory' => rand(1, 100)]);

    }

    private function sendCommandToESP32($angle1, $angle2, $fan, $pump)
    {
        // $params = [
        //     'angle1' => $angle1,
        //     'angle2' => $angle2,
        //     'fan' => $fan,
        //     'pump' => $pump,
        // ];

        // Http::get($this->esp32_ip . '/control', $params);


    }

    private function getDataFromESP32()
    {
        // return Http::get($this->esp32_ip . '/data')->json();
        return ['value' => rand(0, 100)];

    }
}
