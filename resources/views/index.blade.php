<!DOCTYPE html>
<html>
<head>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      fetch('/api/suhuair-data')
        .then(response => response.json())
        .then(data => {
          var dataTable = new google.visualization.DataTable();
          dataTable.addColumn('date', 'Time');
          dataTable.addColumn('number', 'Suhu');

          // Konversi data dari JSON ke format yang sesuai
          var rows = data.map(item => {
            // Mengonversi string datetime menjadi objek Date
            let date = new Date(item.time);
            return [date, parseFloat(item.nilai_suhu)];
          });
          dataTable.addRows(rows);

          var options = {
            chart: {
              title: 'Suhu Air',
              subtitle: 'Suhu dalam waktu yang berbeda'
            },
            width: 900,
            height: 500,
            hAxis: {
              title: 'Waktu',
              format: 'dd/MM/yyyy HH:mm:ss'
            },
            vAxis: {
              title: 'Suhu (°C)'
            }
          };

          var chart = new google.charts.Line(document.getElementById('line_top_x'));
          chart.draw(dataTable, google.charts.Line.convertOptions(options));
        })
        .catch(error => console.error('Error fetching data:', error));
    }
  </script>
</head>
<body>
  <div id="line_top_x"></div>
</body>
</html>
