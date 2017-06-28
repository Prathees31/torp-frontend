 <?php
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";
   $sixteen=$seventeen=0;
   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
    } 
     else {
       echo "Opened database successfully"."<br>";
    }
    $a=1;
   $result = pg_query($db, "SELECT irradiancefromplantid FROM pwr_plant WHERE pwrplantid=$a;");//userspecified
   if($row = pg_fetch_assoc($result)) 
   {
      $rid=$row['irradiancefromplantid'];
   }
   if($rid==0)
   {
    $rid=$a;//'$_POST[plantid]''//user specified
   }
   $irr='n';
   $result2 = pg_query($db, "SELECT * FROM pwr_plantdata WHERE pwrplantdatats < '2017-06-28' AND pwrplantdatats > NOW() AND plantdatairradiance > -1 and forplantid = $rid LIMIT 1;");
                    if($row2 = pg_fetch_row($result2)) 
                   {
                      $ir=$row2[5];
                   }
                   $result3=pg_query($db,"SELECT max(plantdatairradiance) as mir FROM pwr_plantdata WHERE forplantid=$rid;");
                   if($row3=pg_fetch_assoc($result3))
                   {
                    $maxir=$row3['mir'];
                   }
   
echo ceil($ir);
echo ceil($maxir/100)*100;
   pg_close($db);

?>


