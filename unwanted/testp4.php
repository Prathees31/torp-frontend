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
$result = pg_query($db, "SELECT p1.* FROM pwr_plantdata p1
inner join 
(
  SELECT forplantid, max(pwrplantdatats) as mts
  FROM pwr_plantdata 
  GROUP BY forplantid 
) p2 on p2.forplantid = 40 and p1.pwrplantdatats = p2.mts and p1.plantcurdayenegry <> 0 LIMIT 1;");
   if($row = pg_fetch_row($result)) {

      $today= $row[8];
      echo $row[2];
     }
    pg_close($db);

?>
<script src="https://raw.githubusercontent.com/HubSpot/odometer/master/odometer.js" type="text/javascript"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js" type="text/javascript"></script>
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

.odometer {
  font-size: 25px;
}
#odometer1{
   margin-left: 120px;
}
#odometer2{
   margin-left: 75px;
}
#odometer3{
   margin-left: 75px;
}
#odometer4{
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
   
#today{
   margin-left: 120px;
}
h2{
   color: white;
   text-align: center;
}
pre{
   color: green;
   margin-left:130px; 
   font-size: 20px;
}
</style>
<script>
window.odometerOptions = {
  format: '(ddd).dd'
};
</script>

</head>

<body class="screen" bgcolor="#2F2F39">
   <link href="css/odometer-theme.css" rel="stylesheet" type="text/css" />
<h2>Yield Overview</h2><br><br><br>
<a target="_blank" id="today" href="Today.html"><button type="button" class="button"><span>Today</span></button></a>
<a target="_blank" id="monthly" href="Monthly.html"><button type="button" class="button"><span>Monthly</span></button></a>
<a target="_blank" id="yearly" href="Yearly.html"><button type="button" class="button"><span>Yearly</span></button></a>
<a target="_blank" id="total" href="Total.html"><button type="button" class="button"><span>Total</span></button></a><br><br>
<body bgcolor="#2F2F39">
<div id="odometer1" class="odometer">12</div>
<div id="odometer2" class="odometer">0123</div>
<div id="odometer3" class="odometer">0123</div>
<div id="odometer4" class="odometer">0123</div>
<script>
  setTimeout(function(){
    $('#odometer1').html(<?php echo $today ?>);
    $('#odometer2').html(3456);
    $('#odometer3').html(1230);
    $('#odometer4').html(5463);
  }, 500);
</script>
</body>
