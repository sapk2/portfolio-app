@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="container mt-4">
                    <h2 class="text-2xl font-semibold mb-4">Dashboard Overview</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Cards Section -->
                        <div class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <h3 class="text-xl font-semibold">Projects</h3>
                            <p class="text-3xl font-bold">{{ $totalproject }}</p>
                        </div>
                        <div class="text-center bg-gradient-to-br from-teal-300 to-lime-300 font-medium rounded-lg text-sm px-5 py-2.5 text-gray-900 dark:text-white mb-2 me-2">
                            <h3 class="text-xl font-semibold">Skills</h3>
                            <p class="text-3xl font-bold">{{ $totalskills }}</p>
                        </div>
                        <div class="text-center bg-gradient-to-br from-purple-600 to-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 text-gray-900 dark:text-white mb-2 me-2">
                            <h3 class="text-xl font-semibold">Gallerys</h3>
                            <p class="text-3xl font-bold">{{ $totalimage }}</p>
                        </div>
                        <div class="text-gray-900 bg-gradient-to-r from-lime-200 via-lime-400 to-lime-500 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                            <h3 class="text-xl font-semibold">Resumes</h3>
                            <p class="text-3xl font-bold">{{ $totalresume }}</p>
                        </div>
                    </div>

                    <!-- Line Chart Section -->
                    <div class="mt-6">
                        <h3 class="text-xl font-semibold mb-4">User and Project Trends</h3>
                        <hr>
                        <!-- Chart Container with Tailwind CSS classes -->
                        <div class="w-full max-w-3xl mx- mt-4">
                            <div class="bg-white dark:bg-gray-700 rounded-lg shadow p-4">
                                <div class="h-80 w-full">
                                    <canvas id="lineChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('lineChart').getContext('2d');
    const lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($chartLabels), // Dynamic labels
            datasets: [
                {
                    label: 'Users',
                    data: @json($userCounts), // Dynamic user data
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true,
                },
                {
                    label: 'Projects',
                    data: @json($projectCounts), // Dynamic project data
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    fill: true,
                },
            ],
        },
        options: {
            responsive: true, // Ensures responsiveness
            maintainAspectRatio: false, // Allows flexibility in aspect ratio
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                },
            },
            interaction: {
                mode: 'index',
                intersect: false,
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Date',
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: 'Count',
                    },
                    beginAtZero: true,
                },
            },
        },
    });
</script>
@endsection
