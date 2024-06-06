<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 1.5rem; line-height: 2rem;">
            {{ __('Dashboard Asset Management') }}
        </h2>
    </x-slot>

    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-center text-xl font-bold mb-4">Status Asset MLP</h1>
                <div class="flex">
                    <div class="w-1/3 p-4" style="width: 33.333333%;">
                        <h3 class="text-center text-m font-bold mb-4">Status Asset</h3>
                        <canvas id="pieChart" style="width: 100%; max-height: 400px;"></canvas>
                    </div>
                    <div class="w-2/3 p-4" style="width: 66.666667%;">
                        <h3 class="text-center text-m font-bold mb-4">Status Asset per Kategori</h3>
                        <canvas id="stackedBarChart" style="width: 100%; max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Pie Chart Data
        const pieData = {
            labels: ['Good', 'Broken', 'Repair'],
            datasets: [{
                label: 'Asset Status',
                data: [getRandomInt(50, 100), getRandomInt(1, 50), getRandomInt(1, 50)],
                backgroundColor: ['#4CAF50', '#F44336', '#FFC107'],
            }]
        };

        // Pie Chart Config
        const pieConfig = {
            type: 'pie',
            data: pieData,
        };

        // Render Pie Chart
        const pieChart = new Chart(
            document.getElementById('pieChart'),
            pieConfig
        );

        // Stacked Bar Chart Data
        const stackedBarData = {
            labels: ['Category 1', 'Category 2', 'Category 3', 'Category 4'],
            datasets: [{
                    label: 'Good',
                    data: [getRandomInt(20, 50), getRandomInt(20, 50), getRandomInt(20, 50), getRandomInt(20, 50)],
                    backgroundColor: '#4CAF50'
                },
                {
                    label: 'Broken',
                    data: [getRandomInt(1, 20), getRandomInt(1, 20), getRandomInt(1, 20), getRandomInt(1, 20)],
                    backgroundColor: '#F44336'
                },
                {
                    label: 'Repair',
                    data: [getRandomInt(1, 20), getRandomInt(1, 20), getRandomInt(1, 20), getRandomInt(1, 20)],
                    backgroundColor: '#FFC107'
                }
            ]
        };

        // Stacked Bar Chart Config
        const stackedBarConfig = {
            type: 'bar',
            data: stackedBarData,
            options: {
                scales: {
                    x: {
                        stacked: true,
                    },
                    y: {
                        stacked: true,
                    }
                }
            }
        };

        // Render Stacked Bar Chart
        const stackedBarChart = new Chart(
            document.getElementById('stackedBarChart'),
            stackedBarConfig
        );

        // Function to generate random integer between min and max
        function getRandomInt(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }
    </script>
</x-app-layout>