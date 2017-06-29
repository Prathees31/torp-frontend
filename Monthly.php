<?php
   session_start();
   $host        = "host = 35.161.9.218";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";
   $one=$two=$three=$four=$five=$six=$seven=$eight=$nine=$ten=$eleven=$twelve=$thirteen=$fourteen=$fifteen=$sixteen=$seventeen=
   $eighteen=$nineteen=$tzero=$tone=$ttwo=$tthree=$tfour=$tfive=$tsix=$tseven=$teight=$tnine=$thirty=$thirtyone=0;
   $db = pg_connect( "$host $port $dbname $credentials");
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
    $month1=date('Y-m-d', strtotime('first day of this month'));
    $month2=date('Y-m-d', strtotime('first day of next month'));
    $pid=$_SESSION["pid"];
    // echo $month1."<br>";
    // echo $month2."<br>";
    // echo $pid."<br>";
    //echo $pid;
   $result = pg_query($db, "SELECT date_trunc('day',pwrplantdatats) as p1,max(plantcurdayenegry) as p2
   FROM pwr_plantdata
   WHERE forplantid=$pid and pwrplantdatats > '$month1' and pwrplantdatats < '$month2'
   GROUP BY date_trunc('day',pwrplantdatats)
   ORDER BY date_trunc('day',pwrplantdatats);");
   while($row = pg_fetch_assoc($result))
    {
        $check=(int)date('d', strtotime($row['p1']));
        if($check==1)
        {
         $one=$row['p2']; 
        // echo $one."<br>";
        }
        if($check==2)
        {
         $two=$row['p2'];
        // echo $two."<br>"; 
        }
        if($check==3)
        {
         $three=$row['p2'];
         //echo $three."<br>"; 
        }
        if($check==4)
        {
         $four=$row['p2'];
        // echo $four."<br>"; 
        }
        if($check==5)
        {
         $five=$row['p2'];
         //echo $five."<br>"; 
        }
        if($check==6)
        {
         $six=$row['p2']; 
         //echo $six."<br>";
        }
        if($check==7)
        {
         $seven=$row['p2'];
         //echo $seven."<br>"; 
        }
        if($check==8)
        {
         $eight=$row['p2'];
         //echo $eight."<br>"; 
        }
        if($check==9)
        {
         $nine=$row['p2']; 
         //echo $nine."<br>";
        }
        if($check==10)
        {
         $ten=$row['p2']; 
         //echo $ten."<br>";
        }
        if($check==11)
        {
         $eleven=$row['p2'];
         //echo $eleven."<br>"; 
        }
        if($check==12)
        {
         $twelve=$row['p2'];
         //echo $twelve."<br>"; 
        }
        if($check==13)
        {
         $thirteen=$row['p2'];
         //echo $thirteen."<br>"; 
        }
        if($check==14)
        {
         $fourteen=$row['p2']; 
         //echo $fourteen."<br>";
        }
        if($check==15)
        {
         $fifteen=$row['p2'];
         //echo $fifteen."<br>"; 
        }
        if($check==16)
        {
         $sixteen=$row['p2']; 
         //echo $sixteen."<br>";
        }
        if($check==17)
        {
         $seventeen=$row['p2'];
         //echo $seventeen."<br>"; 
        }
        if($check==18)
        {
         $eighteen=$row['p2'];
         //echo $eighteen."<br>"; 
        }
        if($check==19)
        {
         $nineteen=$row['p2'];
         //echo $nineteen."<br>"; 
        }
        if($check==20)
        {
         $tzero=$row['p2'];
         //echo $tzero."<br>"; 
        }
        if($check==21)
        {
         $tone=$row['p2'];
         //echo $tone."<br>"; 
        }
        if($check==22)
        {
         $ttwo=$row['p2'];
         //echo $ttwo."<br>"; 
        }
        if($check==23)
        {
         $tthree=$row['p2'];
         //echo $tthree."<br>"; 
        }
        if($check==24)
        {
         $tfour=$row['p2'];
         //echo $tfour."<br>"; 
        }
        if($check==25)
        {
         $tfive=$row['p2'];
         //echo $tfive."<br>"; 
        }
        if($check==26)
        {
         $tsix=$row['p2'];
         //echo $tsix."<br>"; 
        }
        if($check==27)
        {
         $tseven=$row['p2'];
         //echo $tseven."<br>"; 
        }
        if($check==28)
        {
         $teight=$row['p2'];
         //echo $teight."<br>"; 
        }
        if($check==29)
        {
         $tnine=$row['p2'];
         //echo $tnine."<br>"; 
        }
        if($check==30)
        {
         $thirty=$row['p2'];
         //echo $thirty."<br>"; 
        }
        if($check==31)
        {
         $thirthyone=$row['p2'];
         //echo $thirthyone."<br>"; 
        }
     }
    pg_close($db);

?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Day", "Energy", { role: "style" } ],
        ["01", <?php echo $one ?>, "gold"],
        ["02", <?php echo "$two" ?>, "silver"],
        [, <?php echo "$three" ?>, "gold"],
        ["04", <?php echo "$four" ?>, "silver"],
        [, <?php echo "$five" ?>, "gold"],
        ["06", <?php echo "$six" ?>, "silver"],
        [, <?php echo "$seven" ?>, "gold"],
        ["08", <?php echo "$eight" ?>, "silver"],
        [, <?php echo "$nine" ?>, "gold"],
        ["10", <?php echo "$ten" ?>, "silver"],
        [, <?php echo "$eleven" ?>, "gold"],
        ["12", <?php echo "$twelve" ?>, "silver"],
        [, <?php echo "$thirteen" ?>, "gold"],
        ["14", <?php echo "$fourteen" ?>, "silver"],
        [, <?php echo "$fifteen" ?>, "gold"],
        ["16", <?php echo "$sixteen" ?>, "silver"],
        [, <?php echo "$seventeen" ?>, "gold"],
        ["18", <?php echo "$eighteen" ?>, "silver"],
        [, <?php echo "$nineteen" ?>, "gold"],
        ["20", <?php echo "$tzero" ?>, "silver"],
        [, <?php echo "$tone" ?>, "gold"],
        ["22", <?php echo "$ttwo" ?>, "silver"],
        [, <?php echo "$tthree" ?>, "gold"],
        ["24", <?php echo "$tfour" ?>, "silver"],
        [, <?php echo "$tfive" ?>, "gold"],
        ["26", <?php echo "$tsix" ?>, "silver"],
        [, <?php echo "$tseven" ?>, "gold"],
        ["28", <?php echo "$teight" ?>, "silver"],
        [, <?php echo "$tnine" ?>, "gold"],
        ["30", <?php echo "$thirty" ?>, "silver"],
        [, <?php echo "$thirtyone" ?>, "gold"]
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
        }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values"></div>