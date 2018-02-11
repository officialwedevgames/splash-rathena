<?php

$day1= 'Sunday';//Put weekday1 of your WOE
$day2= 'Sunday';//Put weekday1 of your WOE.See Note.
$starttime = '00';//Hrs
$mins='00';//Mins
$GMT = 'GMT+08:00';//GMT
$nextwoe = "";

$woe = mysql_query("SELECT * FROM woe_status");
$woestatus = mysql_fetch_array($woe);
$endtime=new Datetime($woestatus['endtime']);


define('INTERNAL_FORMAT', 'Y-m-d');
define('DISPLAY_MONTH_FORMAT', 'M Y');
define('DISPLAY_DAY_FORMAT', 'Y-m-d H:i:s');

// format excluded dates as YYYY-MM-DD, date('Y-m-d'):
$excluded_dates = array(
    '2010-03-09',
    '2010-04-13',
);
// date('w') returns a string numeral as follows:
//   '0' Sunday
//   '1' Monday
//   '2' Tuesday
//   '3' Wednesday
//   '4' Thursday
//   '5' Friday
//   '6' Saturday

function Monday($date) {
    return date('w', strtotime($date)) === '1';
	}
function Tuesday($date) {
    return date('w', strtotime($date)) === '2';
}
function Wednesday($date) {
    return date('w', strtotime($date)) === '3';
}
function Thursday($date) {
    return date('w', strtotime($date)) === '4';
}
function Frisday($date) {
    return date('w', strtotime($date)) === '5';
}
function Saturday($date) {
    return date('w', strtotime($date)) === '6';
}
function Sunday($date) {
    return date('w', strtotime($date)) === '0';
}
function greaterDate($start_date,$end_date)
{
  $start = strtotime($start_date);
  $end = strtotime($end_date);
  if ($start-$end > 0)
    return 1;
  else
   return 0;
}

// handle the excluded dates
function isExcludedDate($internal_date) {
    global $excluded_dates;
    return in_array($internal_date, $excluded_dates);
}
function AddHoursmins($datetime,$hours,$mins){

$new_datetime = date('Y-m-d H:i:s', strtotime("+$hours hours +$mins minutes", strtotime($datetime)));

return $new_datetime;
}


$start_date = date('now');

// something to store months and days
$months_and_dates = array();

// loop over 365 days and look for tuesdays or wednesdays not in the excluded list
foreach(range(0,10) as $day) {
    $internal_date = date(INTERNAL_FORMAT, strtotime("{$start_date} + {$day} days"));
    $this_day = date(DISPLAY_DAY_FORMAT, strtotime($internal_date));
    $this_month = date(DISPLAY_MONTH_FORMAT, strtotime($internal_date));
	$this_monthCNT = date(DISPLAY_MONTH_FORMAT, strtotime($internal_date));
    if (($day1($internal_date) || $day2($internal_date)) 
        && !isExcludedDate($internal_date)) {
            $months_and_dates[$this_month][] = $this_day;
			$months_and_datesCNT[$this_monthCNT][] = $this_day;
    }
}

foreach($months_and_dates as $month => $days) {
	$nextwoe=AddHoursmins($days[0],$starttime,$mins);
	break;
}
$nextwoefmt=date("D M j G:i:s",strtotime($nextwoe) );
$nextwoe1=new DateTime($nextwoe);

$woe_on = '<img src="img/on.png">';
$woe_off = '<img src="img/off.png">';
?>
