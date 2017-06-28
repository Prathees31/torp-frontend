<?php
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";
   $one=$two=$three=$four=$five=$six=$seven=$eight=$nine=$ten=$eleven=$twelve=$thirteen=$fourteen=$fifteen=$sixteen=$seventeen=$eighteen=$nineteen=$tzero=$tone=$ttwo=$tthree=0;
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     //else {
       //echo "Opened database successfully"."<br>";
    //}
   $result = pg_query($db, "SELECT date_trunc('hour',pwrplantdatats) as p1,max(plantcurdayenegry) as p2
   FROM pwr_plantdata
   WHERE forplantid=9 and pwrplantdatats > NOW() and pwrplantdatats < '2017-06-26'
   GROUP BY date_trunc('hour',pwrplantdatats)
   ORDER BY date_trunc('hour',pwrplantdatats);");
   while($row = pg_fetch_assoc($result)) {
   	    $check=(int)date('H:i', strtotime($row['p1']));
   	    if($check==00)
   	    {
         $zero=$row['p2']; 
        }
        if($check==01)
   	    {
         $one=$row['p2']; 
        }
        if($check==02)
   	    {
         $two=$row['p2']; 
        }
        if($check==03)
   	    {
         $three=$row['p2']; 
        }
        if($check==04)
   	    {
         $four=$row['p2']; 
        }
        if($check==05)
   	    {
         $five=$row['p2']; 
        }
        if($check==06)
   	    {
         $six=$row['p2']; 
        }
        if($check==07)
   	    {
         $seven=$row['p2']; 
        }
        if($check==08)
   	    {
         $eight=$row['p2']; 
        }
        if($check==09)
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








