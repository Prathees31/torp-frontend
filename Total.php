 <?php
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";
   $sixteen=$seventeen=0;
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     //else {
       //echo "Opened database successfully"."<br>";
    //}
   $result1 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '2016-01-01' AND 
pwrplantdatats < '2017-01-01' AND meterreading <> 0 AND forplantid='$_POST[plantid5]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '2016-01-01' AND 
pwrplantdatats < '2017-01-01' AND meterreading <> 0 AND forplantid='$_POST[plantid5]' ) AS osix;");
   if($row1 = pg_fetch_assoc($result1)) 
   {
      $sixteen=$row1['osix'];
   }

    $result2 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-01-01' AND 
pwrplantdatats < '2018-01-01' AND meterreading <> 0 AND forplantid='$_POST[plantid5]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-01-01' AND 
pwrplantdatats < '2018-01-01' AND meterreading <> 0 AND forplantid='$_POST[plantid5]' ) AS oseven;");
   if($row2 = pg_fetch_assoc($result2)) 
   {
      $seventeen=$row2['oseven'];
   }
   pg_close($db);

?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Year", "Energy", { role: "style" } ],
        ["2016", <?php echo "$sixteen" ?>, "silver"],
        ["2017", <?php echo "$seventeen" ?>, "gold"],
        
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        //title: "Density of Precious Metals, in g/cm^3",
        width: 1500,
        height: 800,
        bar: {groupWidth: "50%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 1600px; height: 600px;"></div>