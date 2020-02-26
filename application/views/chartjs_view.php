<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChartJS</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js">

    <script>
        $(function() {
            var cData = JSON.parse(`<?php echo $chart_data; ?>`);
            var ctx = $("#bar-chart");

            var data = {
                labels: cData.label, 
                datasets: [{
                    label: cData.label, 
                    data: cData.data, 
                    backgroundColor: [
                        "#deb887", "#a9a9a9", "#dc143c", "#f4a460", 
                        "#2e8bde", "#3ecdef", "#e326ff", "#123abc",
                        "#abc321", "#fffe32", "#ad32dd", "#e3937d",
                    ], 
                    borderColor: [
                        "#abc321", "#fffe32", "#ad32dd", "#e3937d",
                        "#deb887", "#a9a9a9", "#dc143c", "#f4a460",
                        "#2e8bde", "#3ecdef", "#e326ff", "#123abc",
                    ], 
                    borderWidth: [
                        10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 
                    ]
                }]
            };

            var options = {
                responsive: true, 
                title: {
                    display: true, 
                    position: "top", 
                    text: "Sales Revenue by 2019", 
                    fontSize: 18, 
                    fontColor: "#111111"
                }, 
                legend: {
                    display: true, 
                    position: "bottom", 
                    labels: {
                        fontColor: "#333333", 
                        fontSize: 16
                    }
                }
            };

            var mychart = new Chart(ctx, {
                type: "bar", 
                data: data, 
                options: options
            });
        });
    </script>
</head>
<body>
    <div class="chart-container">
        <div class="bar-chart-container">
            <canvas id="bar-chart"></canvas>
        </div>
    </div>
</body>
</html>