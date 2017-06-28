<?php
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     //else {
       //echo "Opened database successfully"."<br>";
    //}
$result = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-06-01' AND 
pwrplantdatats < '2017-07-01' AND meterreading <> 0 AND forplantid=9) - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-06-01' AND 
pwrplantdatats < '2017-07-01' AND meterreading <> 0 AND forplantid=9 ) AS month;");
   if($row = pg_fetch_assoc($result)) {

      $monthly=$row['month'];
     }
     $result1 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '2016-01-01' AND 
pwrplantdatats < '2017-01-01' AND meterreading <> 0 AND forplantid=9) - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '2016-01-01' AND 
pwrplantdatats < '2017-01-01' AND meterreading <> 0 AND forplantid=9 ) AS year;");
   if($row1 = pg_fetch_assoc($result1)) {

      $yearly=$row1['year'];
     }

     $result2 = pg_query($db, "SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '2016-01-01' AND 
pwrplantdatats < NOW() AND meterreading <> 0 AND forplantid=9;");
   if($row2 = pg_fetch_assoc($result2)) {

      $total=$row2['m1'];
     }
   $result3 = pg_query($db, "SELECT pwrplantdatats as p1,max(plantcurdayenegry) as today
   FROM pwr_plantdata
   WHERE forplantid=9 and pwrplantdatats > NOW() and pwrplantdatats < '2017-06-27'
   GROUP BY pwrplantdatats
   ORDER BY pwrplantdatats;");
   if($row3 = pg_fetch_assoc($result3)) {

      $today=$row3['today'];
     }
    pg_close($db);

?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width:800;
    height: 800;
}
.button {
  float: left;
  display: inline-block;
  border-radius: 8px;
  background-color: #000;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 7px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin-right:0;

}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  margin-right: 10px;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: 0px;
  transition: 0.5s;
}
.button:hover{
  background-color: grey;
}

.button:hover span {
  padding-right: 10px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>
</head>
<body bgcolor="#2F2F39">  
<link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
<script src="http://github.hubspot.com/odometer/odometer.js"></script>
<script type="text/javascript">
  setTimeout(function(){
    today.innerHTML = <?php echo $today ?>;;
    monthly.innerHTML = <?php echo $monthly ?>;
    yearly.innerHTML = <?php echo $yearly ?>;
    total.innerHTML = <?php echo $total ?>;
}, 1000);
</script>

<p></p>
<table cellpadding="40">
  <h2 align="center">Yield Overview</h2>
  <tr>
<th align="center"><a target="_blank"  href="id2.php"><button type="button"  class="button"><span>Today</span></button></a></th>
<th align="center"><a target="_blank"  href="id3.php"><button type="button"  class="button"><span>Monthly</span></button></a></th>
<th align="center"><a target="_blank"  href="id4.php"><button type="button"  class="button"><span>Yearly</span></button></a></th>
<th align="center"><a target="_blank"  href="id5.php"><button type="button"  class="button"><span>Total</span></button></a></th>
  </tr>
  <tr> 
<td align="center"><div id="today" class="odometer">100.00</div></td>
<td align="center"><div id="monthly" class="odometer">1,234.56</div></td>
<td align="center"><div id="yearly" class="odometer">123,456.12</div></td>
<td align="center"><div id="total" class="odometer">123,456.12</div></td>
  </tr>
</table>

</body>
</html>