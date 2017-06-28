<?php
    $first4=date('Y-04-01');
    $last4=date('Y-04-t');
    echo $first4.'<br />';
    echo $last4.'<br />'; 
    $datetime = new DateTime('tomorrow');
    $tomorrow=$datetime->format('Y-m-d');
    echo $tomorrow.'<br />';
    $month1=date('Y-m-d', strtotime('first day of this month'));
    echo "<br/>";
    $month2=date('Y-m-d', strtotime('first day of next month'));
?>