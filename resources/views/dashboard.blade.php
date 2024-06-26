<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="font-size: 1.5rem; line-height: 2rem;">
            {{ __('Dashboard Asset Management') }}
        </h2>
    </x-slot>

    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-center text-xl font-bold mb-4">Status Asset MLP</h2>
                <div class="flex">
                    <div class="w-1/3 p-4" style="width: 33.333333%;">
                        <h3 class="text-center text-m mb-4">Status Asset</h3>
                        <canvas id="pieChart" style="width: 100%; max-height: 400px;"></canvas>
                    </div>
                    <div class="w-2/3 p-4" style="width: 66.666667%;">
                        <h3 class="text-center text-m mb-4">Status Asset per Kategori</h3>
                        <canvas id="stackedBarChart" style="width: 100%; max-height: 400px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const statusCounts = @json($statusCounts);
        const categoryStatusCounts = @json($categoryStatusCounts);

        // Pie Chart Data
        const statusLabels = ['Good', 'Repair', 'Breakdown'];
        const statusColors = {
            Good: '#4CAF50', // Green
            Repair: '#FFC107', // Yellow
            Breakdown: '#F44336' // Red
        };

        // Ensure the data and colors align with the status labels
        const pieData = {
            labels: statusLabels,
            datasets: [{
                label: 'Asset Status',
                data: statusLabels.map(label => statusCounts[label] || 0),
                backgroundColor: statusLabels.map(label => statusColors[label]),
            }]
        };

        // Calculate total count for pie chart
        const totalStatusCount = pieData.datasets[0].data.reduce((a, b) => a + b, 0);

        // Pie Chart Config
        const pieConfig = {
            type: 'pie',
            data: pieData,
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const value = pieData.datasets[0].data[tooltipItem.dataIndex];
                                const percentage = ((value / totalStatusCount) * 100).toFixed(2);
                                if (percentage === '0.00') return '';
                                return `${tooltipItem.label}: ${value} (${percentage}%)`;
                            }
                        }
                    },
                    datalabels: {
                        formatter: (value, ctx) => {
                            let percentage = ((value / totalStatusCount) * 100).toFixed(2);
                            if (percentage === '0.00') return '';
                            return percentage + '%';
                        },
                        color: '#fff',
                    }
                }
            },
            plugins: [ChartDataLabels]
        };

        // Render Pie Chart
        const pieChart = new Chart(
            document.getElementById('pieChart'),
            pieConfig
        );

        // Stacked Bar Chart Data
        const labels = Object.keys(categoryStatusCounts);
        const goodData = labels.map(label => categoryStatusCounts[label]['Good'] || 0);
        const brokenData = labels.map(label => categoryStatusCounts[label]['Breakdown'] || 0);
        const repairData = labels.map(label => categoryStatusCounts[label]['Repair'] || 0);

        const stackedBarData = {
            labels: labels,
            datasets: [{
                    label: 'Good',
                    data: goodData,
                    backgroundColor: '#4CAF50'
                },
                {
                    label: 'Repair',
                    data: repairData,
                    backgroundColor: '#FFC107'
                },
                {
                    label: 'Breakdown',
                    data: brokenData,
                    backgroundColor: '#F44336'
                },
            ]
        };

        // Calculate total count for each category
        const totalCategoryCounts = labels.map(label =>
            (categoryStatusCounts[label]['Good'] || 0) +
            (categoryStatusCounts[label]['Repair'] || 0) +
            (categoryStatusCounts[label]['Breakdown'] || 0)
        );

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
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                const datasetLabel = tooltipItem.dataset.label;
                                const value = tooltipItem.raw;
                                const categoryIndex = tooltipItem.dataIndex;
                                const total = totalCategoryCounts[categoryIndex];
                                const percentage = ((value / total) * 100).toFixed(2);
                                if (percentage === '0.00') return '';
                                return `${datasetLabel}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                }
            }
        };

        // Render Stacked Bar Chart
        const stackedBarChart = new Chart(
            document.getElementById('stackedBarChart'),
            stackedBarConfig
        );
    </script>
</x-app-layout>