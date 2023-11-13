<?php
include 'connect/dbConnect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/babymonitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>    
    <title>IntelliCradle</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <div class="text-center p-3 d-none d-md-block">
                <img src="images/logo.png" height="30" alt="Company Logo">
            </div>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>      
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link mx-2 active" aria-current="page" href="babymonitor.html">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#">Live Feed</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2 btn rounded-0 btn-danger" href="#">Order Online</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-2" href="#">Sign Out</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <!-- Temperature Readings -->
    <h4 class="text-center mt-4"><b>Temperature Readings</b></h4>
    <div class="temp">       
        <div class="temp-readings">
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Temperature : </span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
        <div class="temp-chart my-3">
            <div class="card">
                <div class="card-body">
                    Temperature Bar Chart
                    <hr>
                    <canvas id="barchart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Humidity Readings -->
    <h4 class="text-center mt-4"><b>Humidity Readings</b></h4>
    <div class="temp">       
        <div class="temp-readings">
            <div class="input-group mt-3 mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default2">Humidity : </span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
            </div>
        </div>
        <div class="temp-chart my-3">
            <div class="card">
                <div class="card-body">
                    Humidity Line Graph
                    <hr>
                    <canvas id="linegraph"></canvas>
                </div>
            </div>
        </div>
    </div>


    
    <!-- Js Links -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Temp Bar Chart -->
    <script>
      const ctx = document.getElementById('barchart');
      const tempdata = [10, 19, 3, 8, 4, 3];

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Morning', 'Mid-Day', 'Afternoon', 'Evening', 'Night'],
          datasets: [{
            label: 'Temperature readings',
            data: tempdata,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <!-- Humidity line graph -->
    <script>
      const ctl = document.getElementById('linegraph');
      const humdata = [12, 19, 3, 5, 12, 3];

      new Chart(ctl, {
        type: 'line',
        data: {
          labels: ['Morning', 'Mid-Day', 'Afternoon', 'Evening', 'Night'],
          datasets: [{
            label: 'Humidity readings',
            data: humdata,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
</body>
</html>