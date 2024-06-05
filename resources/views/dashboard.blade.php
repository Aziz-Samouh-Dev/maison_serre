@extends('layouts.app')

@section('content')
    <style>
        .logout-button-container {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .chart-container {
            position: relative;
            width: 300px;
            height: 300px;
            margin: 0 auto; /* Center the chart container */
        }

        .chart-container canvas {
            display: block;
        }

        .chart-container .chart-value {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2em;
            text-align: center;
        }
    </style>
    <div class="logout-button-container">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-4xl font-bold mb-6 text-center">Dashboard</h1>

    <div class="chart-container">
        <canvas id="donutChart"></canvas>
        <div class="chart-value" id="chartValue">65°</div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('donutChart').getContext('2d');
        const chartValue = document.getElementById('chartValue');

        function fetchTemperatureData() {
            fetch('/get_temperature')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const temperature = data.temperature;
                    if (temperature !== undefined) {
                        updateChart(temperature);
                    } else {
                        console.error('Error fetching data: temperature not found in the response.');
                        updateChart(0);
                    }
                })
                .catch(error => {
                    console.error('Error fetching temperature:', error);
                    updateChart(0);
                });
        }

        function updateChart(temperature) {
            const datasets = [{
                data: [temperature, 100 - temperature],
                backgroundColor: ['#00FFB0', '#2e2e3e'],
                borderWidth: 0
            }];
            const options = {
                responsive: true,
                cutout: '80%',
                plugins: {
                    tooltip: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            };
            const chart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets
                },
                options: options
            });
            chart.data = {
                datasets
            };
            chart.options = options;
            chart.update();
            chartValue.innerText = `${temperature}°`;
        }

        fetchTemperatureData();
        setInterval(fetchTemperatureData, 5000);
    </script>
@endsection
