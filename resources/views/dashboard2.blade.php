@extends('layouts.layout2')

@section('title','dashboard2')

@section('content')

<style>
    .progress-circle {
      width: 100px;
      height: 100px;
      border-radius: 50%;
      /* background: conic-gradient(#007bff {{ $latestSuhuAir * 3.6 }}deg, #ccc 0deg); Ubah sudut sesuai nilai suhu air */
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
    }
    
    .progress-circle .progress-value {
      width: 80px;
      height: 80px;
      background-color: #fff;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      position: absolute;
    }
    
    .progress-circle .progress-value h4 {
      margin: 0;
    }

    @media (max-width: 768px) {
        .card-body {
            text-align: center; /* Center text for small screens */
        }
    }

    </style>
    

<!-- Content Row -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h6 class="page-title">Dashboard</h6>
            </div>
            <!-- Tampilkan pesan kesalahan atau sukses -->
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row text-center">
                <!-- Suhu Air -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card-body text-left" style="font-size: large;">
                        <h4 style="font-weight: bold; margin-left: 1.5em;" class="card-title">Suhu Air</h4>
                        <div id="chart_suhu_air" style="width: 100%; height: 150px;"></div>
                    </div>
                </div>

                <!-- pH Air -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card-body text-left" style="font-size: large;">
                        <h4 style="font-weight: bold; margin-left: 2.5em;" class="card-title">pH Air</h4>
                        <div id="chart_ph_air" style="width: 100%; height: 150px;"></div>
                    </div>
                </div>
                
                <!-- TDS Air -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card-body text-left" style="font-size: large;">
                        <h4 style="font-weight: bold; margin-left: 3em;" class="card-title">TDS</h4>
                        <div id="chart_tds_air" style="width: 100%; height: 150px;"></div>
                    </div>
                </div>

                <!-- Tinggi Air -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card-body text-left" style="font-size: large;">
                        <h4 style="font-weight: bold; margin-left: 1.5em;" class="card-title">Tinggi Air</h4>
                        <div id="chart_tinggi_air" style="width: 100%; height: 150px;"></div>
                    </div>
                </div>
            </div>

<!-- GRAFIK SEMUA Sensor -->
<div class="col-md-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h4>Semua Data Sensor</h4>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink5"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                    aria-labelledby="dropdownMenuLink5">
                    <div class="dropdown-header">Tabel Data Sensor</div>
                    <a class="dropdown-item" href="http://127.0.0.1:8000/nilaisuhuair">Sensor suhu</a>
                    <a class="dropdown-item" href="http://127.0.0.1:8000/nilaipHair">Sensor pH</a>
                    <a class="dropdown-item" href="http://127.0.0.1:8000/nilaiTDS">Sensor TDS</a>
                    <a class="dropdown-item" href="http://127.0.0.1:8000/nilaitinggiair">Sensor Tinggi</a>
                </div>
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="chart-area">
                <canvas id="myAreaChart5"></canvas>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<!-- Chart.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
<!-- Custom Script for Chart -->

    <!-- Data Dummy Grafik 5 (Semua Data Sensor) -->
<script>
    $(document).ready(function() {
        var dummyData5 = {
            labels: ["08:00", "08:01", "08:02", "08:03", "08:04", "08:05", "08:06"],
            datasets: [
                {
                    label: "Suhu Air",
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgb(54, 162, 235)',
                    borderWidth: 1,
                    pointRadius: 0,
                    data: [25, 26, 27, 28, 29, 25, 29],
                    fill: false,
                    lineTension: 0
                },
                {
                    label: "pH Air",
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgb(255, 99, 132)',
                    borderWidth: 1,
                    pointRadius: 0,
                    data: [6.8, 6.9, 6.7, 6.7, 6.5, 6.8, 6.3],
                    fill: false,
                    lineTension: 0
                },
                {
                    label: "TDS",
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderColor: 'rgb(255, 206, 86)',
                    borderWidth: 1,
                    pointRadius: 0,
                    data: [220, 260, 230, 280, 290, 340, 310],
                    fill: false,
                    lineTension: 0
                },
                {
                    label: "Ketinggian Air",
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgb(75, 192, 192)',
                    borderWidth: 1,
                    pointRadius: 0,
                    data: [15, 20, 17, 15, 22, 30, 12],
                    fill: false,
                    lineTension: 0
                }
            ]
        };
    
        var ctx5 = document.getElementById('myAreaChart5').getContext('2d');
        var myChart5 = new Chart(ctx5, {
            type: 'line',
            data: dummyData5,
            options: {
                animation: {
                    x: {
                        type: 'number',
                        easing: 'linear',
                        duration: 10000,
                        from: NaN,
                        delay(ctx) {
                            if (ctx.type !== 'data' || ctx.xStarted) {
                                return 0;
                            }
                            ctx.xStarted = true;
                            return ctx.index * 2000;
                        }
                    },
                    y: {
                        type: 'number',
                        easing: 'linear',
                        duration: 10000,
                        from(ctx) {
                            if (ctx.type !== 'data' || ctx.yStarted) {
                                return 0;
                            }
                            ctx.yStarted = true;
                            return ctx.chart.scales.y.getPixelForValue(10);
                        },
                        delay(ctx) {
                            if (ctx.type !== 'data' || ctx.yStarted) {
                                return 0;
                            }
                            ctx.yStarted = true;
                            return ctx.index * 2000;
                        }
                    }
                },
                elements: {
                    line: {
                        tension: 0.5
                    }
                }
            }
        });
    });
    </script>

<script>
    $(document).ready(function() {
        $('.dropdown-toggle').dropdown();
    });
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawSuhuChart);

function drawSuhuChart() {
    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Suhu', {{ $latestSuhuAir }}], // Ganti 20 dengan nilai suhu terbaru Anda
    ]);

    var options = {
        width: 150, height: 150,
        redFrom: 35, redTo: 50,
        yellowFrom: 25, yellowTo: 35,
        greenFrom: 0, greenTo: 50,
        minorTicks: 5,
        max: 50
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_suhu_air'));
    chart.draw(data, options);

    // Optional: refresh data periodically
    function refreshSuhuData() {
        // Call your backend to get the latest data
        // For example, using AJAX (make sure to include jQuery if using this)
        $.ajax({
            url: '/path/to/your/api/endpoint',
            dataType: 'json',
            success: function(response) {
                var suhu = parseFloat(response.suhu).toFixed(2);
                data.setValue(0, 1, suhu);
                chart.draw(data, options);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown + ': ' + textStatus);
            }
        });
    }

    // Refresh the data every 1 second
    setInterval(refreshSuhuData, 1000);
}
google.charts.load('current', {'packages':['gauge']});
google.charts.setOnLoadCallback(drawPhChart);
google.charts.setOnLoadCallback(drawTdsChart);
google.charts.setOnLoadCallback(drawTinggiChart);

function drawPhChart() {
    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['pH', {{ $latestpHAir }}], // Ganti 5.5 dengan nilai pH terbaru Anda
    ]);

    var options = {
        width: 150, height: 150,
        redFrom: 0, redTo: 7,
        greenFrom: 7, greenTo: 14,
        minorTicks: 5,
        max: 14
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_ph_air'));
    chart.draw(data, options);

    // Optional: refresh data periodically
    function refreshPhData() {
        // Panggil backend Anda untuk mendapatkan data terbaru
        // Contoh menggunakan AJAX (pastikan untuk menyertakan jQuery jika menggunakan ini)
        $.ajax({
            url: '/path/to/your/api/endpoint',
            dataType: 'json',
            success: function(response) {
                var ph = parseFloat(response.ph).toFixed(2);
                data.setValue(0, 1, ph);
                chart.draw(data, options);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown + ': ' + textStatus);
            }
        });
    }

    // Refresh data setiap 1 detik
    setInterval(refreshPhData, 1000);
}

function drawTdsChart() {
    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['TDS', {{ $latestTDS }}], // Ganti 500 dengan nilai TDS terbaru Anda
    ]);

    var options = {
    width: 150,
    height: 150,
    redFrom: 600,   // Mulai zona merah dari 600
    redTo: 1000,    // Hingga maksimal 1000
    yellowFrom: 0,
    yellowTo: 0,    // Tidak ada zona kuning
    greenFrom: 0, // Mulai zona hijau dari 100
    greenTo: 600,   // Hingga 600
    minorTicks: 5,
    max: 1000
};



    var chart = new google.visualization.Gauge(document.getElementById('chart_tds_air'));
    chart.draw(data, options);

    // Optional: refresh data periodically
    function refreshTdsData() {
        // Panggil backend Anda untuk mendapatkan data terbaru
        // Contoh menggunakan AJAX (pastikan untuk menyertakan jQuery jika menggunakan ini)
        $.ajax({
            url: '/path/to/your/api/endpoint',
            dataType: 'json',
            success: function(response) {
                var tds = parseFloat(response.tds).toFixed(2);
                data.setValue(0, 1, tds);
                chart.draw(data, options);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown + ': ' + textStatus);
            }
        });
    }

    // Refresh data setiap 1 detik
    setInterval(refreshTdsData, 1000);
}

function drawTinggiChart() {
    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Tinggi Air', {{ $latestTinggiAir }}], // Ganti 15 dengan nilai Tinggi Air terbaru Anda
    ]);

    var options = {
        width: 150, height: 150,
        redFrom: 20, redTo: 25,
        yellowFrom: 15, yellowTo: 20,
        greenFrom: 0, greenTo: 25,
        minorTicks: 5,
        max: 25
    };

    var chart = new google.visualization.Gauge(document.getElementById('chart_tinggi_air'));
    chart.draw(data, options);

    // Optional: refresh data periodically
    function refreshTinggiData() {
        // Panggil backend Anda untuk mendapatkan data terbaru
        // Contoh menggunakan AJAX (pastikan untuk menyertakan jQuery jika menggunakan ini)
        $.ajax({
            url: '/path/to/your/api/endpoint',
            dataType: 'json',
            success: function(response) {
                var tinggi = parseFloat(response.tinggi).toFixed(2);
                data.setValue(0, 1, tinggi);
                chart.draw(data, options);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(errorThrown + ': ' + textStatus);
            }
        });
    }

    // Refresh data setiap 1 detik
    setInterval(refreshTinggiData, 1000);
}
</script>

@endsection
