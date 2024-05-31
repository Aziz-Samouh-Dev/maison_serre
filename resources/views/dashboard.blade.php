@extends('layouts.app')

@section('content')
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <!-- Sensors Data Widgets -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Temperature Widget -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Temperature</h2>
                <p class="text-gray-700" id="temperature"></p>
            </div>

            <!-- Humidity Widget -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Humidity</h2>
                <p class="text-gray-700" id="humidity"></p>
            </div>

            <!-- Add more widgets for other sensor data -->
        </div>

        <!-- Actuators Control Buttons -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Actuator 1 Control -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Actuator 1</h2>
                <form action="{{ route('dashboard.updateActuator', 1) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Enable</button>
                </form>
            </div>

            <!-- Actuator 2 Control -->
            <div class="bg-white p-4 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-2">Actuator 2</h2>
                <form action="{{ route('dashboard.updateActuator', 2) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status" value="1">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Enable</button>
                </form>
            </div>

            <!-- Add more controls for other actuators -->
        </div>
    </div>

    <script>
        function fetchSensorData() {
            fetch('/data')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('temperature').innerText = `Temperature: ${data.temperature}°C`;
                    document.getElementById('humidity').innerText = `Humidity: ${data.humidity}%`;
                    // Update other sensor data here
                })
                .catch(error => console.error('Error fetching sensor data:', error));
        }

        document.addEventListener('DOMContentLoaded', () => {
            fetchSensorData();
            setInterval(fetchSensorData, 5000); // Update every 5 seconds
        });
    </script>
@endsection
