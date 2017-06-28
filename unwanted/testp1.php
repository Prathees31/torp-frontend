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
$result = pg_query($db, "SELECT p1.* FROM pwr_plant p1
inner join 
(
  SELECT pwrplantid, max(lastmeterreadingtime) as mts
  FROM pwr_plant 
  GROUP BY pwrplantid 
) p2 on p2.pwrplantid = 1 and p1.lastmeterreadingtime = p2.mts LIMIT 1;");
   while($row = pg_fetch_row($result)) {

        $name=$row[2];
        $address=$row[16];
        $capacity=$row[4];
        $cd=$row[25];
     }
    pg_close($db);

?>

<style>
.screen {
  position: fixed;
  left: 0px;
  top: 0px;
  width: 470;
  height: 100%;
  -webkit-box-shadow: inset 0 0 10px #000;
  -moz-box-shadow: inset 0 0 10px #000;
  -o-box-shadow: inset 0 0 10px #000;
  box-shadow: inset 0 0 10px #000;
}
a,img{
  margin-left: 50px;
}
.zoomin frame{
    margin-top: 20px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
    overflow: hidden;
}
.zoomin img { 
  height: 150px; 
  width: 350px; 
  -webkit-transition: all 2s ease; 
  -moz-transition: all 2s ease; 
  -ms-transition: all 2s ease; 
  transition: all 2s ease; } 
  
.zoomin img:hover { 
  width: 400px; 
  height: 250px; 
} 
.data{
  text-align: left;
  margin-top: 100px;
  margin-left: 50px;
  font-size: 20;
  color:white;
  font-family: Georgia;
}
h2{
  color: white;
  text-align: center;
}
.dot {
overflow: hidden;
border-style:solid;
border-width: 2px;
border-color: #666;
padding-top: 6px;
padding-left: 6px;
width: 32px;
height: 32px;
display: inline-block;
border-radius: 50%;
margin: 0.2em 0.4em 0.2em 0;
vertical-align:middle;
line-height: 32px;
background: #cccccc;
-webkit-box-shadow: inset 0 -6px 6px rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.3);
-moz-box-shadow: inset 0 -6px 6px rgba(0, 0, 0, 0.5), 0 1px 0 rgba(255, 255, 255, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.3);
box-shadow: inset -6px -6px 6px rgba(0, 0, 0, 0.3), inset 3px 3px 6px rgba(255, 255, 255, 0.3);
}
.dot-inner {
background: white;
opacity:0.35;
filter:alpha(opacity=35);
-webkit-box-shadow: 0px 0px 6px 3px rgba(255, 255, 255, 1);
-moz-box-shadow: 0px 0px 6px 3px rgba(255, 255, 255, 1);
box-shadow: 0px 0px 6px 3px rgba(255, 255, 255, 1);
border-radius: 50%;
overflow: hidden;
width: 6px;
height: 6px;
display: block;
line-height: 0;
}
.dot-red {
background: #990000;
}
.dot-green {
background: #009900;
}
.dot-yellow {
background: #999900;
}
</style>
<body class="screen" bgcolor="#2F2F39">
<h2>Plant Description</h2>
<div class="zoomin frame">
<img src="solarpower.jpg" alt="Smiley face" height="100" width="400" align="middle">
</div>
<div class="data">
  <?php echo $name ?>,<br>
  <address>
   <?php echo $address;?>,<br>
  </address> <br>
  Plant Capacity:<?php echo $capacity ?> <br>
  Commissioning Date:<?php echo $cd ?> <br>
  Status : <!--<span class="dot"><span class="dot-inner"></span></span>-->
  <!--<span class="dot dot-red"><span class="dot-inner"></span></span>-->
    <!--<span class="dot dot-yellow"><span class="dot-inner"></span></span>-->
    <span class="dot dot-green"><span class="dot-inner"></span></span> <br>
    CO2 Savings: <br>
    Revenue: <br><br>
    <!-- weather widget start --><a target="_blank" href="http://www.booked.net/weather/new-delhi-18038"><img src="https://w.bookcdn.com/weather/picture/1_18038_1_1_137AE9_160_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=w209&anc_id=83491"  alt="booked.net"/></a><!-- weather widget end -->
</div>
</body>
