 <?php
   session_start();
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";
   $Jan=$Feb=$Mar=$Apr=$May=$Jun=$Jul=$Aug=$Sep=$Oct=$Nov=$Dec=0;
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     //else {
       //echo "Opened database successfully"."<br>";
    //}
    $pid=9;
    $pid=$_SESSION["pid"];
    $_POST['plantid4']=$pid;
    $first1=date('Y-01-01');
    $last1=date('Y-01-t');
    $first2=date('Y-02-01');
    $last2=date('Y-02-28');
    $first3=date('Y-03-01');
    $last3=date('Y-03-t');
    $first4=date('Y-04-01');
    $last4=date('Y-04-t');
    $first5=date('Y-05-01');
    $last5=date('Y-05-t');
    $first6=date('Y-06-01');
    $last6=date('Y-06-t');
    $first7=date('Y-07-01');
    $last7=date('Y-07-t');
    $first8=date('Y-08-01');
    $last8=date('Y-08-t');
    $first9=date('Y-09-01');
    $last9=date('Y-09-t');
    $first10=date('Y-10-01');
    $last10=date('Y-10-t');
    $first11=date('Y-11-01');
    $last11=date('Y-11-t');
    $first12=date('Y-12-01');
    $last12=date('Y-12-t');
   $result1 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first1' AND 
pwrplantdatats < '$last1' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first1' AND 
pwrplantdatats < '$last1' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS jan;");
   if($row1 = pg_fetch_assoc($result1)) 
   {
      $Jan=$row1['jan'];
   }
   $result2 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first2' AND 
pwrplantdatats < '$last2' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first2' AND 
pwrplantdatats < '$last2' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS feb;");
   if($row2 = pg_fetch_assoc($result2)) 
   {
      $Feb=$row2['feb'];
   }
   $result3 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first3' AND 
pwrplantdatats < '$last3' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first3' AND 
pwrplantdatats < '$last3' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS mar;");
   if($row3 = pg_fetch_assoc($result3)) 
   {
      $Mar=$row3['mar'];
   }
   $result4 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first4' AND 
pwrplantdatats < '$last4' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first4' AND 
pwrplantdatats < '$last4' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS apr;");
   if($row4 = pg_fetch_assoc($result4)) 
   {
      $Apr=$row4['apr'];
   }
   $result5 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first5' AND 
pwrplantdatats < '$last5' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first5' AND 
pwrplantdatats < '$last5' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS may;");
   if($row5 = pg_fetch_assoc($result5)) 
   {
      $May=$row5['may'];
   }
   $result6 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first6' AND 
pwrplantdatats < '$last6' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first6' AND 
pwrplantdatats < '$last6' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS jun;");
   if($row6 = pg_fetch_assoc($result6)) 
   {
      $Jun=$row6['jun'];
   }
   $result7 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first7' AND 
pwrplantdatats < '$last7' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first7' AND 
pwrplantdatats < '$last7' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS jul;");
   if($row7 = pg_fetch_assoc($result7)) 
   {
      $Jul=$row7['jul'];
   }
   $result8 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first8' AND 
pwrplantdatats < '$last8' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first8' AND 
pwrplantdatats < '$last8' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS aug;");
   if($row8 = pg_fetch_assoc($result8)) 
   {
      $Aug=$row8['aug'];
   }
   $result9 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first9' AND 
pwrplantdatats < '$last9' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first9' AND 
pwrplantdatats < '$last9' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS sep;");
   if($row9 = pg_fetch_assoc($result9)) 
   {
      $Sep=$row9['sep'];
   }
   $result10 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first10' AND 
pwrplantdatats < '$last10' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first10' AND 
pwrplantdatats < '$last10' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS oct;");
   if($row10 = pg_fetch_assoc($result10)) 
   {
      $Oct=$row10['oct'];
   }
   $result11 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first11' AND 
pwrplantdatats < '$last11' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first11' AND 
pwrplantdatats < '$last11' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS nov;");
   if($row11 = pg_fetch_assoc($result11)) 
   {
      $Nov=$row11['nov'];
   }
   $result12 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$first12' AND 
pwrplantdatats < '$last12' AND meterreading <> 0 AND forplantid='$_POST[plantid4]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$first12' AND 
pwrplantdatats < '$last12' AND meterreading <> 0 AND forplantid='$_POST[plantid4]' ) AS dec;");
   if($row12 = pg_fetch_assoc($result12)) 
   {
      $Dec=$row12['dec'];
   }
   // echo $Jan."<br>";
   // echo $Feb."<br>";
   // echo $Mar."<br>";
   // echo $Apr."<br>";
   // echo $May."<br>";
   // echo $Jun."<br>";
   // echo $Jul."<br>";
   // echo $Aug."<br>";
   // echo $Sep."<br>";
   // echo $Oct."<br>";
   // echo $Nov."<br>";
   // echo $Dec."<br>";

    pg_close($db);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Month", "Energy", { role: "style" } ],
        ["Jan", <?php echo "$Jan" ?>, "silver"],
        ["Feb", <?php echo "$Feb" ?>, "gold"],
        ["Mar", <?php echo "$Mar" ?>, "silver"],
        ["Apr", <?php echo "$Apr" ?>, "gold"],
        ["May", <?php echo "$May" ?>, "silver"],
        ["Jun", <?php echo "$Jun" ?>, "gold"],
        ["Jul", <?php echo "$Jul" ?>, "silver"],
        ["Aug", <?php echo "$Aug" ?>, "gold"],
        ["Sep", <?php echo "$Sep" ?>, "silver"],
        ["Oct", <?php echo "$Oct" ?>, "gold"],
        ["Nov", <?php echo "$Nov" ?>, "silver"],
        ["Dec", <?php echo "$Dec" ?>, "gold"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
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