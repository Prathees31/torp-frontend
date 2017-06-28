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
$result = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-01-01' AND 
pwrplantdatats < '2017-01-31' AND meterreading <> 0 AND forplantid=9) - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-01-01' AND 
pwrplantdatats < '2017-01-31' AND meterreading <> 0 AND forplantid=9 ) AS month;");
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
   if($row1 = pg_fetch_assoc($result2)) {

      $total=$row1['m1'];
     }
     $result3 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats >NOW() AND 
pwrplantdatats < NOW() AND meterreading <> 0 AND forplantid=9) - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > NOW() AND 
pwrplantdatats < NOW() AND meterreading <> 0 AND forplantid=9 ) AS today;");
   if($row4 = pg_fetch_assoc($result1)) {

      $today=$row4['today'];
     }
    pg_close($db);

?>
<!DOCTYPE html><!--\\\\\\\\\\panel 4 starts////////-->
<html>
<head>
<style>
.button {
  display: inline-block;
  border-radius: 8px;
  background-color: #000;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 15px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -5px;
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
  .screen4 {
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

.odometer {
  font-size: 17px;
}
#today,#today1{
  margin-left: 120px;
}
#monthly,#monthly1{
  margin-left: 75px;
}
#yearly,#yearly1{
  margin-left: 75px;
}
#total,#total1{
  margin-left: 65px;
}

a {
  padding-right: 10px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  margin-left: 40px;
}
  
#today1{
  margin-left: 120px;
}
h2{
  color: white;
  text-align: center;
}
</style>
</head>
<body class="screen4" bgcolor="#2F2F39">

<h2>Yield Overview</h2><br><br><br>
<a target="_blank" id="today1" href="Today.html"><button type="button" class="button"><span>Today</span></button></a>
<a target="_blank" id="monthly1" href="Monthly.html"><button type="button" class="button"><span>Monthly</span></button></a>
<a target="_blank" id="yearly1" href="Yearly.html"><button type="button" class="button"><span>Yearly</span></button></a>
<a target="_blank" id="total1" href="Total.html"><button type="button" class="button"><span>Total</span></button></a><br><br>
<link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" />
<script src="http://github.hubspot.com/odometer/odometer.js"></script>
<script type="text/javascript">
  setTimeout(function(){
    today.innerHTML = 12345;
    monthly.innerHTML = <?php echo $monthly ?>;
    yearly.innerHTML = <?php echo $yearly ?>;
    total.innerHTML = <?php echo $total ?>;
}, 1000);
</script>
<div bgcolor="#2F2F39">
<div id="today" class="odometer">99999</div>
<div id="monthly" class="odometer">999999</div>
<div id="yearly" class="odometer">999999</div>
<div id="total" class="odometer">999999</div>
</div>

</body>
</html>