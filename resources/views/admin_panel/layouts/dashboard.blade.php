@extends('admin_panel.layouts.app')
@section('title', 'Dashboard')
@section('contents')

<div class="container-fluid">
    <div class="row">
        <!-- Card for Monthly Revenue -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                               Revenue (Monthly)
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($monthlyEarnings, 0) }} VND</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Revenue Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <h3>Revenue Chart</h3>
                    <canvas id="revenueChart" style="max-width: 100%; height: 400px;"></canvas>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const labels = @json($labels);
    const revenueData = @json($revenueData);
    if (labels && labels.length > 0 && revenueData && revenueData.length > 0) {
        const ctx = document.getElementById('revenueChart')?.getContext('2d');
        if (ctx) {
            const revenueChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Revenue',
                        data: revenueData,
                        backgroundColor: 'rgba(78, 115, 223, 0.2)',
                        borderColor: 'rgba(78, 115, 223, 1)',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            min: 500000,
                            max: 10000000,
                            title: {
                                display: true,
                                text: 'Revenue (VND)',
                                font: {
                                    size: 16
                                }
                            },
                            ticks: {
                                stepSize: 100000,
                                callback: function(value) {
                                    return value.toLocaleString() + ' VND';
                                }
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Month',
                                font: {
                                    size: 16
                                }
                            },
                            ticks: {
                                maxRotation: 0,
                                autoSkip: false
                            }
                        }
                    }
                }
            });
        } else {
            console.log('Canvas element not found!');
        }
    } else {
        console.log('No data available to display the chart.');
    }
});
</script>

@endsection
