 <?php
 session_start();

   $host        = "host = 35.161.9.218";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=postgres";
   $zero=$one=$two=$three=$four=$five=$six=$seven=$eight=$nine=$ten=$eleven=$twelve=$thirteen=$fourteen=$fifteen=$sixteen=$seventeen=$eighteen=$nineteen=$tzero=$tone=$ttwo=$tthree=0;
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     //else {
       //echo "Opened database successfully"."<br>";
    //}
    $pid=$_SESSION["pid"];
    $today=date("Y/m/d");
    $datetime = new DateTime('tomorrow');
    $tomorrow=$datetime->format('Y-m-d');
    //$result = pg_query($db, "SELECT meterreading as m1 FROM pwr_plantdata WHERE forplantid=$pid AND pwrplantdatats ='$today
       $result = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 07:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 06:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS six7;");
       if($row = pg_fetch_assoc($result)) 
       {
          $six7=$row['six7'];
          // $min=$row['m2'];
          // $max=$row['m1'];
          // if(($min==0)||($max==0)){
          //   $six7=0;
          // }
        }
        $result1 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 08:00:00' AND iscalulatedfrominv = 'm' AND meterreading <> 0  AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 07:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS seven8;");
       if($row1 = pg_fetch_assoc($result1)) 
       {
          $seven8=$row1['seven8'];
          /*$min=$row1['m2'];
          $max=$row1['m1'];
          if(($min==0)||($max==0)){
            $seven8=0;
          }*/
        }
        $result2 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 09:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 08:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS eight9;");
       if($row2 = pg_fetch_assoc($result2)) 
       {
          $eight9=$row2['eight9'];
          // $min=$row2['m2'];
          // $max=$row2['m1'];
          // if(($min==0)||($max==0)){
          //   $eight9=0;
          // }
        }
        $result3 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 10:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 09:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS nine10;");
       if($row3 = pg_fetch_assoc($result3)) 
       {
          $nine10=$row3['nine10'];
          // $min=$row3['m2'];
          // $max=$row3['m1'];
          // if(($min==0)||($max==0)){
          //   $nine10=0;
          // }
        }
        $result4 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 11:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 10:00:00' AND meterreading <> 0  AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS ten11;");
       if($row4 = pg_fetch_assoc($result4)) 
       {
          $ten11=$row4['ten11'];
          // $min=$row4['m2'];
          // $max=$row4['m1'];
          // if(($min==0)||($max==0)){
          //   $ten11=0;
          // }
        }
        $result5 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 12:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 11:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS eleven12;");
       if($row5 = pg_fetch_assoc($result5)) 
       {
          $eleven12=$row5['eleven12'];
          // $min=$row5['m2'];
          // $max=$row5['m1'];
          // if(($min==0)||($max==0)){
          //   $eleven12=0;
          // }
        }
        $result6 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 13:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 12:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS twelve13;");
       if($row6 = pg_fetch_assoc($result6)) 
       {
          $twelve13=$row6['twelve13'];
          // $min=$row6['m2'];
          // $max=$row6['m1'];
          // if(($min==0)||($max==0)){
          //   $twelve13=0;
          // }
        }
        $result7 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 14:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 13:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS thirteen14;");
       if($row7 = pg_fetch_assoc($result7)) 
       {
          $thirteen14=$row7['thirteen14'];
          // $min=$row7['m2'];
          // $max=$row7['m1'];
          // if(($min==0)||($max==0)){
          //   $thirteen14=0;
          // }
        }
        $result8 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 15:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 14:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS fourteen15;");
       if($row8 = pg_fetch_assoc($result8)) 
       {
          $fourteen15=$row8['fourteen15'];
          // $min=$row8['m2'];
          // $max=$row8['m1'];
          // if(($min==0)||($max==0)){
          //   $fourteen15=0;
          // }
        }
        $result9 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 16:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 15:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS fifteen16;");
       if($row9 = pg_fetch_assoc($result9)) 
       {
          $fifteen16=$row9['fifteen16'];
          // $min=$row9['m2'];
          // $max=$row9['m1'];
          // if(($min==0)||($max==0)){
          //   $fifteen16=0;
          // }
        }
        $result10 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 17:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 16:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS sixteen17;");
       if($row10 = pg_fetch_assoc($result10)) 
       {
          $sixteen17=$row10['sixteen17'];
          // $min=$row10['m2'];
          // $max=$row10['m1'];
          // if(($min==0)||($max==0)){
          //   $sixteen17=0;
          // } 
        }
        $result11 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 18:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 17:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS seventeen18;");
       if($row11 = pg_fetch_assoc($result11)) 
       {
          $seventeen18=$row11['seventeen18'];
          // $min=$row11['m2'];
          // $max=$row11['m1'];
          // if(($min==0)||($max==0)){
          //   $seventeen18=0;
          // }
        }
        $result12 = pg_query($db, "SELECT (SELECT meterreading as m1 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 19:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid) - (SELECT meterreading as m2 FROM  pwr_plantdata WHERE pwrplantdatats = '$today 18:00:00' AND meterreading <> 0 AND iscalulatedfrominv = 'm' AND forplantid=$pid ) AS eighteen19;");
       if($row12 = pg_fetch_assoc($result12)) 
       {
          $eighteen19=$row12['eighteen19'];
          // $min=$row12['m2'];
          // $max=$row12['m1'];
          // if(($min==0)||($max==0)){
          //   $eighteen19=0;
          // }
        }

 ?>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Time", "Energy", { role: "style" } ],
        // ["00:00", <?php echo "$zero" ?>, "silver"],
        // [, <?php echo "$one" ?>, "gold"],
        // ["02:00", <?php echo "$two" ?>, "silver"],
        // [, <?php echo "$three" ?>, "gold"],
        // ["04:00", <?php echo "$four" ?>, "silver"],
        // [, <?php echo "$five" ?>, "gold"],
        ["6-7", <?php echo "$six7" ?>, "gold"],
        ["7-8", <?php echo "$seven8" ?>, "gold"],
        ["8-9", <?php echo "$eight9" ?>, "gold"],
        ["9-10", <?php echo "$nine10" ?>, "gold"],
        ["10-11", <?php echo "$ten11" ?>, "gold"],
        ["11-12", <?php echo "$eleven12" ?>, "gold"],
        ["12-13", <?php echo "$twelve13" ?>, "gold"],
        ["13-14", <?php echo "$thirteen14" ?>, "gold"],
        ["14-15", <?php echo "$fourteen15" ?>, "gold"],
        ["15-16", <?php echo "$fifteen16" ?>, "gold"],
        ["16-17", <?php echo "$sixteen17" ?>, "gold"],
        ["17-18", <?php echo "$seventeen18" ?>, "gold"],
        ["18-19", <?php echo "$eighteen19" ?>, "gold"],
        // ["19:00", <?php echo "$nineteen" ?>, "gold"],
        // ["20:00", <?php echo "$tzero" ?>, "silver"],
        // [, <?php echo "$tone" ?>, "gold"],
        // ["22:00", <?php echo "$ttwo" ?>, "silver"],
        // [, <?php echo "$tthree" ?>, "gold"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Cumulative Energy",
        width: 700,
        height: 200,
        bar: {groupWidth: "50%"},
         hAxis: {
          title: 'Time of Day',
        },
        vAxis: {
          title: 'Energy'
        },
        colors: ['#fcb441', 'gold']
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values"></div>