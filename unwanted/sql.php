<?php
   $host        = "host = 35.165.7.5";
   $port        = "port = 5432";
   $dbname      = "dbname = plantmgmt";
   $credentials = "user = postgres password=admin";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database"."<br>";
   } else {
      echo "Opened database successfully"."<br>";
   }


//    $sql =<<<EOF
//       SELECT * from pwr_plantdata where forplantid=28 and pwrplantdatats >'2017-06-16' and pwrplantdatats <'2017-06-17';
// EOF;

//    $ret = pg_query($db, $sql);
//    if(!$ret) {
//       echo pg_last_error($db);
//       exit;
//    } 
//    while($row = pg_fetch_row($ret)) {
//       echo "ID = ". $row[1] . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
//       echo "Meter Reading = ". $row[4] ."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
//       echo "Current Energy = ". $row[8] ."&nbsp&nbsp";
//       echo "Irradiance =  ".$row[5] ."<br>";
//    }
//    echo "Operation done successfully\n";
//     pg_close($db);

?>
