@extends('layouts.app')

@section('content')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <div class="container">
        <h1 class="mt-5">Dashboard</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <h3>Controls</h3>
                <form action="{{ route('dashboard.control') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="angle1">Servomotor 1 Angle:</label>
                        <input type="number" name="angle1" id="angle1" class="form-control" min="0" max="180">
                    </div>
                    <div class="form-group">
                        <label for="angle2">Servomotor 2 Angle:</label>
                        <input type="number" name="angle2" id="angle2" class="form-control" min="0" max="180">
                    </div>
                    <div class="form-group">
                        <label for="fan">Fan:</label>
                        <select name="fan" id="fan" class="form-control">
                            <option value="1">Turn On</option>
                            <option value="0">Turn Off</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pump">Pump:</label>
                        <select name="pump" id="pump" class="form-control">
                            <option value="1">Turn On</option>
                            <option value="0">Turn Off</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Send Command</button>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Sensor Data</h3>
                <div id="sensor-data">
                    <!-- Sensor data will be displayed here -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function fetchSensorData() {
            $.get('{{ route("dashboard.data") }}', function(data) {
                $('#sensor-data').html(`
                    <p>Temperature: ${data.temperature}°C</p>
                    <p>Humidity: ${data.humidity}%</p>
                    <p>Soil Moisture: ${data.soilMoisture}</p>
                    <p>Light Intensity: ${data.lightIntensity}</p>
                    <p>Water Level: ${data.waterLevel}</p>
                `);
            });
        }

        $(document).ready(function() {
            fetchSensorData();
            setInterval(fetchSensorData, 5000); // Update every 5 seconds
        });
    </script>

@endsection
