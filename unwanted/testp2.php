<?php
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
   //  else {
   //    echo "Opened database successfully"."<br>";
   // }
$result = pg_query($db, "SELECT p1.* FROM pwr_plantdata p1
inner join 
(
  SELECT forplantid, max(pwrplantdatats) as mts
  FROM pwr_plantdata 
  GROUP BY forplantid 
) p2 on p2.forplantid = 9 and p1.pwrplantdatats = p2.mts and p1.iscalulatedfrominv = 'm' LIMIT 1;");
 
   while($row = pg_fetch_row($result)) {
      $power=$row[3]/1000;
      $radiance=$row[5];
   }
    pg_close($db);

?>
<html>
  <head>
  <style type="text/css">
    .g{
      margin-left: 23%;
      margin-top: 13%;
    }
#head{
	color: white;
	margin-top: 1px;
	margin-bottom: -100px;
	font-size: 24px;
	margin-left: 35%;
}
.screen {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  -webkit-box-shadow: inset 0 0 10px #000;
  -moz-box-shadow: inset 0 0 10px #000;
  -o-box-shadow: inset 0 0 10px #000;
  box-shadow: inset 0 0 10px #000;
}
.gauge{
	float: left;
	width: 15px;
}
.sidegauge{
	float: left;
	width: 15px;
	margin-top: 70;
}
.radiance{
	text-align:center;
	font-size: 18;
	color: white;
	font-family: Times New Roman;
}
.power{
	margin-left:0px;
	font-size: 18;
	color: white;
	font-family: Times New Roman;
}
.pr{
	margin-left:0px;
	font-size: 18;
	color: white;
	font-family: Times New Roman;
}
p { 
    word-spacing: 70px;
}
p1 { 
    word-spacing: 100px;
}
</style>
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data1 = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Radiance', <?php echo $radiance?>]
        ]);
        var data2=google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Power', <?php echo $power?>]
        ]);
        var data3=google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['PR', 57]
        ]);
        var option1 = {
          width: 140, 
          height: 140,
          redFrom: 90, 
          redTo: 100,
          yellowFrom:75, 
          yellowTo: 90,
          minorTicks: 5,
            animation:{
            duration: 400,
            easing: 'inAndOut',
           },
          max: 500
        };
          var option2 = {
          width: 200, 
          height: 200,
          redFrom: 90, 
          redTo: 100,
          yellowFrom:75, 
          yellowTo: 90,
          minorTicks: 5,
             animation:{
            duration: 400,
            easing: 'inAndOut',
           },
          max: 1200
        };
          var option3 = {
          width: 140, 
          height: 140,
          redFrom: 90, 
          redTo: 100,
          yellowFrom:75, 
          yellowTo: 90,
          minorTicks: 5,
             animation:{
            duration: 400,
            easing: 'inAndOut',
           },
          max: 100
        };
        var chart1 = new google.visualization.Gauge(document.getElementById('chart_div1'));
        var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
        var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));
        chart1.draw(data1, option1);
        chart2.draw(data2, option2);
        chart3.draw(data3, option3);
        setInterval(function() {
          data1.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data1, option1);
        }, 13000);
        setInterval(function() {
          data2.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data2, option2);
        }, 5000);
        setInterval(function() {
          data3.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart2.draw(data3, option3);
        }, 26000);
      }
    </script>
  </head>
 
  <body  class="screen" bgcolor="#2F2F39">
   <div id="head">Current System Status</div>
   <div class="g">
    <div id="chart_div1" class="sidegauge" style="width: 130px; height: 130px;"></div>
    <div id="chart_div2" class="gauge" style="width: 200px; height: 200px;"></div>
    <div id="chart_div3" class="sidegauge" style="width: 130px; height: 130px;"></div>
		<div class="radiance" style="width: 460px; height: 130px;"><br><br>
		<p1>Watt/m^2 K.Watt Percentage</p1>
	</div>
   </div><br><br>

	<!--<div class="power" style="width: 200px;">Power<br>K.Watt</div>
	<div class="pr" style="width: 130px;">PR<br>Percentage</div>-->
  </body>
</html>