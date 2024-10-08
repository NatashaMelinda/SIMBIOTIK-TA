@extends('layouts.layout')

@section('title','dashboard')

@section('content')

{{-- <style>
    .mt-100{
  margin-top: 200px;
}
.progress {
  width: 150px;
  height: 150px !important;
  float: left; 
  line-height: 150px;
  background: none;
  margin: 20px;
  box-shadow: none;
  position: relative;
}
.progress:after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 12px solid #fff;
  position: absolute;
  top: 0;
  left: 0;
}
.progress>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}
.progress .progress-left {
  left: 0;
}
.progress .progress-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 12px;
  border-style: solid;
  position: absolute;
  top: 0;
}
.progress .progress-left .progress-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}
.progress .progress-right {
  right: 0;
}
.progress .progress-right .progress-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
  animation: loading-1 1.8s linear forwards;
}
.progress .progress-value {
  width: 90%;
  height: 90%;
  border-radius: 50%;
  background: #ffffff;
  font-size: 24px;
  color: #000000;
  line-height: 135px;
  text-align: center;
  position: absolute;
  top: 5%;
  left: 5%;
}
.progress.blue .progress-bar {
  border-color: #049dff;
}
.progress.blue .progress-left .progress-bar {
  animation: loading-2 1.5s linear forwards 1.8s;
}
.progress.yellow .progress-bar {
  border-color: #fdba04;
}
.progress.yellow .progress-right .progress-bar {
  animation: loading-3 1.8s linear forwards;
}
.progress.yellow .progress-left .progress-bar {
  animation: none;
}
@keyframes loading-1 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(180deg);
    transform: rotate(180deg);
  }
}
@keyframes loading-2 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(144deg);
    transform: rotate(144deg);
  }
}
@keyframes loading-3 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(135deg);
    transform: rotate(135deg);
  }
} --}}
</style>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

<!-- Content Row -->
<div class="row">

    <!-- Suhu Air -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card-body" style="font-size:large" class="text-white">
            Suhu Air
            <div id="chart_suhu_air" style="width: 100%; height: 150px;"></div>
        </div>
    </div>

    <!-- pH Air -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card-body" style="font-size: large" class="text-white">
      pH Air
      <div id="chart_ph_air" style="width: 100%; height: 150px;"></div>
  </div>
</div>

    

    <!-- Pengukuran TDS -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card-body" style="font-size: large" class="text-white">
      TDS Air
      <div id="chart_tds_air" style="width: 100%; height: 150px;"></div>
  </div>
</div>


    <!-- Tinggi Air-->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card-body">
      Tinggi Air
      <div id="chart_tinggi_air" style="width: 100%; height: 150px;"></div>
  </div>
</div>

</div>

                  <!-- GRAFIK -->
                  <div class=" ">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 text-primary">Grafik</h6>
                            <div class="dropdown no-arrow">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                    aria-labelledby="dropdownMenuLink">
                                    <div class="dropdown-header">Pilih Grafik:</div>
                                    <a class="dropdown-item" href="#">Grafik Suhu air</a>
                                    <a class="dropdown-item" href="#">Grafik pH air</a>
                                    <a class="dropdown-item" href="#">Grafik TDS</a>
                                    <a class="dropdown-item" href="#">Ketinggian Air</a>
                                </div>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>  

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
	google.charts.load('current', {'packages':['gauge']});
	google.charts.setOnLoadCallback(drawSuhuChart);

	function drawSuhuChart() {
        var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Suhu', 33], // Ganti 20 dengan nilai suhu terbaru Anda
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
            ['pH', 5.5], // Ganti 5.5 dengan nilai pH terbaru Anda
        ]);

        var options = {
            width: 150, height: 150,
            redFrom: 4.5, redTo: 5.5,
            yellowFrom: 5, yellowTo: 6,
            greenFrom: 0, greenTo: 14,
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
            ['TDS', 500], // Ganti 500 dengan nilai TDS terbaru Anda
        ]);

        var options = {
            width: 150, height: 150,
            redFrom: 800, redTo: 1000,
            yellowFrom: 500, yellowTo: 800,
            greenFrom: 0, greenTo: 1000,
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
            ['Tinggi Air', 15], // Ganti 15 dengan nilai Tinggi Air terbaru Anda
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
