<?php
$date1 = '29-08-2013';
$date2 = '03-09-2013';

function returnDates($fromdate, $todate) {
    $fromdate = \DateTime::createFromFormat('d-m-Y', $fromdate);
    $todate = \DateTime::createFromFormat('d-m-Y', $todate);
    return new \DatePeriod(
        $fromdate,
        new \DateInterval('P1D'),
        $todate->modify('+1 day')
    );
}

$datePeriod = returnDates($date1, $date2);
foreach($datePeriod as $date) {
   // echo $date->format('d-m-Y'), PHP_EOL;
	// $all_dates[]=$date->format('d-m-Y');
}







// example 1
$time1 = "08:00:00";
$time2 = "13:40:00";

echo "Time difference: ".get_time_difference($time1, $time2)." hours<br/>";

// example 2
$time1 = "22:00:00";
$time2 = "04:00:00";

echo "Time difference: ".get_time_difference($time1, $time2)." hours<br/>";

function get_time_difference($time1, $time2)
{
    $time1 = strtotime("1/1/1980 $time1");
    $time2 = strtotime("1/1/1980 $time2");
    
    if ($time2 < $time1)
    {
        $time2 = $time2 + 86400;
    }
    
    return ($time2 - $time1) / 3600;
    
}  
?>