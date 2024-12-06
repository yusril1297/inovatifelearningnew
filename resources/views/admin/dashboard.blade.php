@extends('layouts.admin')

@section('content')

<div class="p-6 bg-gray-100 min-h-screen">
    <!-- Dashboard Header -->
    <header class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>
        <p class="text-sm text-gray-500">Overview of your application.</p>
    </header>

    <!-- Dashboard Stats -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat Card -->
        @if(isset($users))
    
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center">
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-500">Total Users</div>
                    <div class="text-2xl font-bold text-gray-900"> {{ $users }}</div>
                </div>
            </div>
        </div>
    @endif

        <!-- Repeat for other stats -->
        @if(isset($categories))
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center">
                
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-500">Total Categories</div>
                    <div class="text-2xl font-bold text-gray-900"> {{ $categories }}</div>
                </div>
            </div>
        </div>
        @endif

        @if(isset($courses))
        <div class="bg-white shadow rounded-lg p-6">
            <div class="flex items-center">
                
                <div class="ml-4">
                    <div class="text-sm font-medium text-gray-500">Total Courses</div>
                    <div class="text-2xl font-bold text-gray-900"> {{ $courses }}</div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- Additional Section (Optional for charts, tables, etc.) -->
    <div class="mt-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Enrollment Trends</h2>
            <canvas id="enrollmentChart"></canvas>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if(isset($enrollmentsByMonth) && $enrollmentsByMonth->isNotEmpty())
<script>
    const enrollmentLabels = @json($enrollmentsByMonth->pluck('month'));
    const enrollmentData = @json($enrollmentsByMonth->pluck('total'));
    
    const ctx = document.getElementById('enrollmentChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: enrollmentLabels, // Labels dari database
            datasets: [{
                label: 'Enrollments',
                data: enrollmentData, // Data jumlah dari database
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
            },
        }
    });
</script>
@endif
@endsection