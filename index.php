<?php 
session_start();
$_SESSION["pid"]=$_POST['plantid'];
 $datetime = new DateTime('tomorrow');
   $tomorrow=$datetime->format('Y-m-d');
   $month1=date('Y-m-d', strtotime('first day of this month'));
   $month2=date('Y-m-d', strtotime('first day of next month'));
    $year = date('Y') - 1;
    $yearplus=date('Y') + 1;
    $year1=date('Y-m-d',strtotime('first day of January'.$year));
    $year2=date('Y-m-d', strtotime('first day of January '.date('Y') ));
    $year3=date('Y-m-d',strtotime('first day of January'.$yearplus));
    $host        = "host = 35.161.9.218";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=postgres";
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    }
   $result = pg_query($db, "SELECT * FROM pwr_plant WHERE pwrplantid='$_POST[plantid]';");
    while($row = pg_fetch_row($result)) {
        $name=$row[2];
        $address=$row[16];
        $chars = preg_split("/,/", $address, -1, PREG_SPLIT_NO_EMPTY);
        $capacit=$row[4];
        //$cd=$row[25];
        $capacity=floatval($capacit);
        $co2x=$row[10];
     }
     $result1 = pg_query($db, "SELECT irradiancefromplantid FROM pwr_plant WHERE pwrplantid='$_POST[plantid]';");//userspecified
   if($row1 = pg_fetch_assoc($result1)) 
   {
      $rid=$row1['irradiancefromplantid'];
   }
   if($rid==0)
   {
    $rid=$_POST['plantid'];//'$_POST[plantid]''//user specified
   }
   $irr='n';
   $result2 = pg_query($db, "SELECT plantdatairradiance,pwrplantdatats FROM pwr_plantdata WHERE pwrplantdatats < '$tomorrow' AND pwrplantdatats > NOW() AND plantdatairradiance > -1 and forplantid = $rid LIMIT 1;");
                    if($row2 = pg_fetch_assoc($result2)) 
                   {
                      $ir=$row2['plantdatairradiance'];
                      $timestamp1=$row2['pwrplantdatats'];
                      // $createDate = new DateTime($timestamp1);
                      // $time1 = $createDate->format('H:i:s');
                   }
    $result3=pg_query($db,"SELECT max(plantdatairradiance) as mir FROM pwr_plantdata WHERE forplantid=$rid;");
    if($row3=pg_fetch_assoc($result3))
    {
      $maxir=$row3['mir'];
    }
    // $result4=pg_query($db,"SELECT plantpower,pwrplantdatats FROM pwr_plantdata WHERE forplantid='$_POST[plantid]' and pwrplantdatats < '$tomorrow' and pwrplantdatats > NOW() and plantpower > 0 LIMIT 1;");
    // if($row4=pg_fetch_assoc($result4))
    // {
    //     $power=$row4['plantpower']/1000;
    //     $timestamp2=$row4['pwrplantdatats'];
    //     $createDate = new DateTime($timestamp2);
    //     $time2 = $createDate->format('H:i:s');
    // }
    $result5=pg_query($db,"SELECT max(plantpower) as mpr FROM pwr_plantdata WHERE forplantid=$rid;");
    if($row5=pg_fetch_assoc($result5))
    {
        $maxpr=$row5['mpr'];
    }
    $mir=ceil($maxir/100)*100;
    $result6 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$month1' AND 
pwrplantdatats < '$month2' AND meterreading <> 0 AND forplantid='$_POST[plantid]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '2017-06-01' AND 
pwrplantdatats < '2017-07-01' AND meterreading <> 0 AND forplantid='$_POST[plantid]') AS month;");
   if($row6 = pg_fetch_assoc($result6)) {

      $monthly=$row6['month'];
     }
     $result7 = pg_query($db, "SELECT (SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE pwrplantdatats > '$year2' AND 
pwrplantdatats < '$year3' AND meterreading <> 0 AND forplantid='$_POST[plantid]') - (SELECT min(meterreading) as m2 FROM  pwr_plantdata WHERE pwrplantdatats > '$year2' AND 
pwrplantdatats < '$year3' AND meterreading <> 0 AND forplantid='$_POST[plantid]' ) AS year;");
   if($row7 = pg_fetch_assoc($result7)) {

      $yearly=$row7['year'];
     }

     $result8 = pg_query($db, "SELECT max(meterreading) as m1 FROM  pwr_plantdata WHERE meterreading <> 0 AND 
      forplantid='$_POST[plantid]';");
   if($row8 = pg_fetch_assoc($result8)) {

      $total=$row8['m1'];
     }
  
  $result9 = pg_query($db, "SELECT max(plantcurdayenegry) as today
   FROM pwr_plantdata
   WHERE forplantid='$_POST[plantid]' and pwrplantdatats < '$tomorrow' and pwrplantdatats > NOW()  LIMIT 1;");
   if($row9 = pg_fetch_assoc($result9)) {

      $today=$row9['today'];
     // echo "Now".$today."<br>";
     }
     $result10=pg_query($db,"SELECT reimbursement FROM pwr_plant_additionals WHERE plantid='$_POST[plantid]';");
     if($row10=pg_fetch_assoc($result10))
     {
      $reimx=$row10['reimbursement'];
     }
     $result11=pg_query($db,"SELECT plantpower,pwrplantdatats FROM pwr_plantdata WHERE plantcurdayenegry=$today and forplantid='$_POST[plantid]';");
     if($row11=pg_fetch_assoc($result11))
     {
      $power=$row11['plantpower'];
      $timestamp2=$row11['pwrplantdatats'];
      // $createDate = new DateTime($timestamp2);
      // $time2 = $createDate->format('H:i:s');
     }
     $result12=pg_query($db,"SELECT max(plantpower) as mpr FROM pwr_plantdata WHERE forplantid='$_POST[plantid]';");
     if($row12=pg_fetch_assoc($result12))
     {
      $mxpr=$row12['mpr'];
     }
     $co2s=$co2x*$total;

     $reim=$reimx*$total;
     if($irr > 10 && $pwr < 1)
     {
      $val=3;
     }
     elseif($irr > 0 && $pwr < 1)
     { 
       $val=2;
      }
      elseif($irr > 10 && $pwr > 1)
      {
         $val=1;
      }
     //  $result12= pg_query($db,"SELECT commissioningdate FROM pwr_plant_additionals WHERE plantid='$_POST[plantid]';");
     // if($row12=pg_fetch_assoc($result11))
     // {
     //  $cd=$row12['commissioningdate'];
     // }
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Solar Data Visulazation</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/odometer-theme.css">

</head>
<body>
  <div class="container-fluid">
    <div class="col-md-12" class="plant">
      <div class="row">
      
        <div class="col-md-5">
          <div>
            <h2 class="text-center">Plant Description</h2>
          </div>
          <div class="col-md-12">
            <img src="images/solarpower.jpg" style="width: 219px;" class="plant-image img-responsive center-block" alt="Smiley face">
          </div>
          <div class="col-md-12 text-center plant-selection">
            <form name="insert" class="form-inline" action="index.php" method="POST">
              <select name="plantid" id="plantselect" class="form-control">
                <option value="1">BMW</option>
                <option value="9">Brakes India-ABS,Padi</option>
                <option value="11">BECTON DICKINSON BAWAL</option>
                <option value="12">TEL</option>
                <option value="14">Sunbeam-GDC</option>
                <option value="15">Sunbeam-Maruti</option>
                <option value="16">Lingaya-Main</option>
                <option value="17">Lingaya-Computer</option>
                <option value="18">Lingaya-Komati</option>
                <option value="19">MJ Logistics</option>
                <option value="20">Amtek</option>
                <option value="21">Brakes India-SS, Padi</option>
                <option value="22">Brakes India-U24, Padi</option>
                <option value="23">Brakes India-EMR, Padi</option>
                <option value="24">Brakes India-ERD, Padi</option>
                <option value="25">Brakes India-U21,Padi</option>
                <option value="26">TEST</option>
                <option value="27">ATL Chennai</option>
                <option value="28">DTVS-Oragadam-P1a</option>
                <option value="29">DTVS-Oragadam-P1b</option>
                <option value="30">DTVS-Oragadam-P2</option>
                <option value="32">DTVS-Mannur-DI</option>
                <option value="33">DTVS-Mannur-UPCR</option>
                <option value="34">DTVS-Mannur-Tech.Center</option>
                <option value="35">DTVS-Mannur-Production</option>
                <option value="36">Mettembert_1</option>
                <option value="37">Capricorn-Krishnagiri</option>
                <option value="38">TEST-CATL</option>
                <option value="39">MTAB</option>
                <option value="40">ATL Limda</option>
                <option value="41">SSN-Test</option>
            </select>
            <input type="submit" name="action" class="btn btn-default"/>

            </form>
          </div>
          <div class="col-md-12">
            <p>Mail:<?php echo $chars[0] ?></p>
          </div>
          <div class="col-md-6">
            <ul class="list-group">
              <li class="list-group-item">Plant Capacity :<?php echo number_format($capacity) ?></li>
              <li class="list-group-item">Commissioning Date :<?php echo $cd ?></li>

              <li class="list-group-item">Status &nbsp;&nbsp;&nbsp; <?php
                if($val==3)
                 {
                   echo "<span class='dot dot-red'><span class='dot-inner'></span></span>";
                  }
                 if($val==2)
                 {
                   echo "<span class='dot dot-yellow'><span class='dot-inner'></span></span>";
                 }
                 if($val==1)
                 {
                   echo "<span class='dot dot-green'><span class='dot-inner'></span></span>";
                  }
                 ?> 
              <li class="list-group-item">CO2 Savings :<?php echo number_format($co2s) ?>Kg</li>
              <li class="list-group-item">Reimbursement :₹<?php echo number_format($reim) ?></li>
            </ul> 
          </div>
          <div class="col-md-6">
            <iframe id="forecast_embed" type="text/html" frameborder="0" height="245" width="200" <?php $result = pg_query($db, "SELECT plantlat,plantlong FROM pwr_plant WHERE pwrplantid= '$_POST[plantid]';");
                 if($row = pg_fetch_assoc($result)) 
                 {

                    $latitude=$row['plantlat'];
                    $longitude=$row['plantlong'];
                   }echo "src='http://forecast.io/embed/#lat=$latitude&lon=$longitude&units=ca'";?> >
            </iframe>

          </div>
          <div class="col-md-12">
              <img src="images/logo.png" class="img-responsive center-block" alt="Logo">
          </div>
        </div>
    
        <div class="col-md-7" style="border-left: 1px solid #fff;height: 630px;">
          <div>
            <h2 class="text-center">Current System Status</h2>
          </div>
          <div class="col-md-12">
            <div class="g row">
              <div id="chart_div1" class="sidegauge col-md-6" ">
                
              </div>
              <div id="chart_div2" class="gauge col-md-6">
                
              </div>
              <!-- <div id="chart_div3" class="sidegauge col-md-4">
                
              </div> -->
              <div class="radiance col-md-12">
                <div class="col-md-6">
                  <p class="text-center">Watt/sq.meter</p>
                  <p class="text-center"><?php echo $timestamp1 ?></p>
                </div>
                <div class="col-md-6">
                  <p class="text-center">K.Watt </p>
                  <p class="text-center"><?php echo $timestamp2 ?></p>
                </div>
                <!-- <div class="col-md-4"><p class="text-center">Percentage</p></div> -->
                <!-- <p>12:30  <?php echo $time2 ?>  12:32</p> -->
            </div>
           </div>
          </div>
          
          <div class="col-md-12">
          <hr>
           <button class="btn btn-default pull-right" type="button" id="back">back</button>
          <div class="odo-content">
            <div>
              <h2 class="text-center">Yield Overview</h2>

            </div>
            
              <div class="col-md-12">
                <table class="table">
                        <tr>
                          <th class="no-padding"><button type="button" id="today1"  class="button"><span>Today</span></button></th>
                          <th class="no-padding"><button type="button" id="monthly1" class="button"><span>Monthly</span></button></th>
                          <th class="no-padding"><button type="button" id="yearly1" class="button"><span>Yearly</span></button></th>
                          <th class="no-padding"><button type="button" id="total1" class="button"><span>Total</span></button></th>
                        </tr>
                </table>
              </div>
              <div class="col-md-12">
                  <table class="table">
                       <thead>
                        <tr>
                          <th><div id="today" class="odometer"><p>000<p></div></th>
                          <th ><div id="monthly" class="odometer">000.00</div></th>
                          <th><div id="yearly" class="odometer">000,000.00</div></th>
                          <th><div id="total" class="odometer">000,000.00</div></th>
                        </tr>
                      </thead>
                  </table>
            </div>

            <!-- <div class="col-md-12">

              <ul class="list-inline text-center">
                <li><button type="button" id="today"  class="button"><span>Today</span></button></li>
                <li><button type="button" id="monthly" class="button"><span>Monthly</span></button></li>
                <li><button type="button" id="yearly" class="button"><span>Yearly</span></button></li>
                <li><button type="button" id="total" class="button"><span>Total</span></button></li>
                
              
            </div>
            <div class="col-md-12">
              <ul class="hide-li list-inline text-center">
                <li id="today" class="odometer">100.00</li>
                <li id="monthly" class="odometer">1,234.56</li>
                <li id="yearly" class="odometer">123,456.12</li>
                <li id="total" class="odometer">123,456.12</li>
              </ul>
              
            </div> -->
            </div>
            <div id="today1div" class="content col-md-12">
               <?php include 'Today.php';?>
              <!-- <div id="chart_div" class="col-md-12">
                
              </div> -->
            </div>
            <div id="monthly1div" class="content col-md-12">
                <!-- <div id="chart_div"></div> -->
                
               <?php include 'Monthly.php';?>
            </div>
            <div id="yearly1div" class="content col-md-12">
                <!-- <div id="chart_div"></div> -->
                
                <h3>yearly div</h3>
            </div>
            <div id="total1div" class="content col-md-12">
                
                <!-- <div id="chart_div"></div> -->
                <h3>total div</h3>
            </div>
          </div>
          <div class="col-md-12">
          
          </div>
                
          </div>
        </div>
        </div>
        
    
    </div>  
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/loader.js"></script>
<script src="js/odometer.js"></script>
</script>
<script type="text/javascript">
          google.charts.load('current', {'packages':['gauge']});
          google.charts.setOnLoadCallback(drawChart);
          function drawChart() {
          var data1 = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['IRR', <?php echo $ir ?>]
          ]);
          var data2=google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Power', <?php echo $power/1000 ?>]
          ]);
        // var data3=google.visualization.arrayToDataTable([
        //   ['Label', 'Value'],
        //   ['PR', 57]
        // ]);
        var option1 = {
          width: 200, 
          height: 200,
          minorTicks: 5,
            animation:{
            duration: 400,
            easing: 'inAndOut',
           },
          max: <?php echo $mir ?>
        };
          var option2 = {
          width: 200, 
          height: 200,
          minorTicks: 5,
             animation:{
            duration: 400,
            easing: 'inAndOut',
           },
          max: <?php echo $mxpr/1000 ?>
        };
        //   var option3 = {
        //   width: 130, 
        //   height: 130,
        //   minorTicks: 5,
        //      animation:{
        //     duration: 400,
        //     easing: 'inAndOut',
        //    },
        //   max: 100
        // };
        var chart1 = new google.visualization.Gauge(document.getElementById('chart_div1'));
        var chart2 = new google.visualization.Gauge(document.getElementById('chart_div2'));
        //var chart3 = new google.visualization.Gauge(document.getElementById('chart_div3'));
        chart1.draw(data1, option1);
        chart2.draw(data2, option2);
        //chart3.draw(data3, option3);
        setInterval(function() {
          data1.setValue(0, 1, );
          chart.draw(data1, option1);
        }, 13000);
        setInterval(function() {
          data2.setValue(1, 1, );
          chart.draw(data2, option2);
        }, 5000);
        // setInterval(function() {
        //   data3.setValue(2, 1, );
        //   chart2.draw(data3, option3);
        // }, 26000);
      }
    </script>
<script>
  $( document ).ready(function() {
      console.log( "ready!" );
      var plantid = <?php echo $_POST['plantid'] ?>;
      console.log(plantid);
      $('select option[value='+plantid+']').attr("selected",true);
  });
</script>
<script type="text/javascript">
  setTimeout(function(){
    today.innerHTML = <?php echo round($today,1) ?>;
    monthly.innerHTML = <?php echo round($monthly,1) ?>;
    yearly.innerHTML = <?php echo round($yearly,1) ?>;
    total.innerHTML = <?php echo round($total,1) ?>;
}, 1000);
</script>
<script type="text/javascript">
  $(function() {
  $(".button").on("click",function(e) {
    e.preventDefault();
    //$(".content").hide();
    $(".odo-content").hide();
    $("#back").show();
    $("#"+this.id+"div").show();
  });
});
</script>
<!-- <script type="text/javascript">
  $(function() {
  $(".button").on("click",function() {
    $(".odo-content").hide();
  });
});
</script> -->
<script type="text/javascript">
  $(function() {
  $("#back").on("click",function() {
    $("#back").hide();
    $(".content").hide();
    $(".odo-content").show();
  });
});
</script>


<!-- <script type="text/javascript">
    $(function() {
  $("#back2").on("click",function() {
    $(".odo-content").show();
  });
});

</script> -->
</html>