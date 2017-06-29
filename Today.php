 <?php
 session_start();

   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";
   $zero=$one=$two=$three=$four=$five=$six=$seven=$eight=$nine=$ten=$eleven=$twelve=$thirteen=$fourteen=$fifteen=$sixteen=$seventeen=$eighteen=$nineteen=$tzero=$tone=$ttwo=$tthree;
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     //else {
       //echo "Opened database successfully"."<br>";
    //}
    $pid=$_SESSION["pid"];
    $datetime = new DateTime('tomorrow');
    $tomorrow=$datetime->format('Y-m-d');
   $result = pg_query($db, "SELECT date_trunc('hour',pwrplantdatats) as p1,max(plantcurdayenegry) as p2
   FROM pwr_plantdata
   WHERE forplantid=$pid and pwrplantdatats > NOW() and pwrplantdatats < '$tomorrow'
   GROUP BY date_trunc('hour',pwrplantdatats)
   ORDER BY date_trunc('hour',pwrplantdatats);");
   while($row = pg_fetch_assoc($result)) {

        $check=(int)date('H:i', strtotime($row['p1']));
        if($check==0)
        {
         $zero=$row['p2']; 
        }
        if($check==1)
        {
         $one=$row['p2']; 
        }
        if($check==2)
        {
         $two=$row['p2']; 
        }
        if($check==3)
        {
         $three=$row['p2']; 
        }
        if($check==4)
        {
         $four=$row['p2']; 
        }
        if($check==5)
        {
         $five=$row['p2']; 
        }
        if($check==6)
        {
         $six=$row['p2']; 
        }
        if($check==7)
        {
         $seven=$row['p2']; 
        }
        if($check==8)
        {
         $eight=$row['p2']; 
        }
        if($check==9)
        {
         $nine=$row['p2']; 
        }
        if($check==10)
        {
         $ten=$row['p2']; 
        }
        if($check==11)
        {
         $eleven=$row['p2']; 
        }
        if($check==12)
        {
         $twelve=$row['p2']; 
        }
        if($check==13)
        {
         $thirteen=$row['p2']; 
        }
        if($check==14)
        {
         $fourteen=$row['p2']; 
        }
        if($check==15)
        {
         $fifteen=$row['p2']; 
        }
        if($check==16)
        {
         $sixteen=$row['p2']; 
        }
        if($check==17)
        {
         $seventeen=$row['p2']; 
        }
        if($check==18)
        {
         $eighteen=$row['p2']; 
        }
        if($check==19)
        {
         $nineteen=$row['p2']; 
        }
        if($check==20)
        {
         $tzero=$row['p2']; 
        }
        if($check==21)
        {
         $tone=$row['p2']; 
        }
        if($check==22)
        {
         $ttwo=$row['p2']; 
        }
        if($check==23)
        {
         $tthree=$row['p2']; 
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
        ["Time", "Energy", { role: "style" } ],
        // ["00:00", <?php echo "$zero" ?>, "silver"],
        // [, <?php echo "$one" ?>, "gold"],
        // ["02:00", <?php echo "$two" ?>, "silver"],
        // [, <?php echo "$three" ?>, "gold"],
        // ["04:00", <?php echo "$four" ?>, "silver"],
        // [, <?php echo "$five" ?>, "gold"],
        ["06:00", <?php echo "$six" ?>, "silver"],
        ["07:00", <?php echo "$seven" ?>, "gold"],
        ["08:00", <?php echo "$eight" ?>, "silver"],
        ["09:00", <?php echo "$nine" ?>, "gold"],
        ["10:00", <?php echo "$ten" ?>, "silver"],
        ["11:00", <?php echo "$eleven" ?>, "gold"],
        ["12:00", <?php echo "$twelve" ?>, "silver"],
        ["13:00", <?php echo "$thirteen" ?>, "gold"],
        ["14:00", <?php echo "$fourteen" ?>, "silver"],
        ["15:00", <?php echo "$fifteen" ?>, "gold"],
        ["16:00", <?php echo "$sixteen" ?>, "silver"],
        ["17:00", <?php echo "$seventeen" ?>, "gold"],
        ["18:00", <?php echo "$eighteen" ?>, "silver"],
        ["19:00", <?php echo "$nineteen" ?>, "gold"],
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
        }
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values"></div>
