<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chart</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script type="text/javascript"> 
    
    google.charts.load('current', {'packages':['corechart']}); 
    google.charts.setOnLoadCallback(drawChart);
              
    function drawChart() { 
      var jsonData = $.ajax({ 
          url: "<?php echo site_url() . 'chart/getdata' ?>", 
          dataType: "json", 
          async: false 
          }).responseText; 
           
      var data = new google.visualization.DataTable(jsonData); 

      var options = {
        title: "Codeigniter, MySQL & Google Chart",
        width: 1200,
        height: 600, 
        curveType: 'function', // linechart 
        bar: {groupWidth: "55%"},   // barchart
        seriesType: 'bars',
        legend: { position: "right" },
        colors: ['#097138', 'red'],
        hAxis: {
          title: 'Month'
        },
        vAxis: {
          title: 'Point'
        },
        series: {
          0: {
            lineWidth: 5,
            lineDashStyle: [2, 1, 2]
          },
          1: {
            //lineWidth: 5,
            //lineDashStyle: [2, 1, 2], 
            type: 'line',
          },
        }
      }; 
 
      var chart = new google.visualization.ComboChart(document.getElementById("chart_div")); 
      chart.draw(data, options); 
    } 
 
    </script>
</head>
<body>
    <div id="chart_div"></div>
</body>
</html>