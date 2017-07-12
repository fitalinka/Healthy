<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Калькулятор калорий</title>
  <link href="/template/style/bootstrap.css" rel="stylesheet">
  <?php require_once(ROOT.'/view/layouts/link.php');?>

</head>
<body>
  <header>
    <h1 class=" text-center">Калькулятор калорий Healthy</h1>
    <?php require_once(ROOT.'/view/layouts/menu.php'); ?>
  </header>
<div class = "container-fluid">

  <div class = "row">
  <aside class = "col-md-1  col-xs-12">
  <?php require_once(ROOT.'/view/layouts/menua.php'); ?>
  </aside>
  <div class = "wrap col-md-10 col-xs-12">
  <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </div>
</div>
</div>
  <footer>
  </footer>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Дата', 'Вес' ],
          <?php $pos = 0; foreach ($rez as $value) { $pos++; ?>
            ['<?php echo $value['data_g'];?>', <?php echo $value['weight'];?>]<?php if($pos != count($rez)) echo ",";?>
          <?php } ?>
        ]);

        var options = {
          title: 'Статистика по весу',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
</body>
</html>
