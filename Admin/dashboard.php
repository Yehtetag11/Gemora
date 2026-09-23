<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gemora Admin Dashboard</title>
    <link rel="stylesheet" href="../Assets/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<?php require_once "nevbar.php"; ?>

<style>
    .container h2{
        margin-top: 70px;
    }

    .chart-container {
        width: 100%;
        max-width: 1200px;
        /* Adjust width as needed */
        height: 800px;
        /* Prevent infinite growth */
        margin: 0 auto;
    }
    .text-center{
        font-family: "CenturyGothicBold";
    }
    .card {
        font-family: "CenturyGothicBold";
    }
</style>

<body>
    <div class="container mt-4">
        <h2 class="text-center">Admin Dashboard</h2>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h5>Total Users</h5>
                    <h3>1,245</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h5>Total Orders</h5>
                    <h3>875</h3>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow">
                    <h5>Total Revenue</h5>
                    <h3>$25,630</h3>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12">
                <div class="chart-container">
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const ctx = document.getElementById('salesChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [{
                        label: 'Revenue',
                        data: [5000, 7000, 6500, 8000, 9000, 10000],
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true, // Prevent infinite height issue
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>