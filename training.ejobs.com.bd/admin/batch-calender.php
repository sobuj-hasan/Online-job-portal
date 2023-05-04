<?php include('header.php');

include('admin-check.php');
//include('super-admin-check.php');
IF($di_stf_desiganation == 11 or $di_stf_desiganation == 5 or $di_stf_desiganation == 7){
    
}else {die();}
    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 50;
    	$startpoint = ($page * $limit) - $limit;
?>

  <body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

           <?php include('top-nav.php') ?>
		   <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                       <?php include('sidebar.php') ?>

					
					<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                       
<div class="container-fluid">

<div class="card-block">
                                        
<div class="row">
                   <div class="col-12">
                        <div class="card">
                 <div class="card-body">
 <h3 class="text-theme-colored mt-0 ">Yearly Calendar</h3>
              
			  
			  <?php
/**
 * Returns the calendar's html for the given year and month.
 *
 * @param $year (Integer) The year, e.g. 2015.
 * @param $month (Integer) The month, e.g. 7.
 * @param $events (Array) An array of events where the key is the day's date
 * in the format "Y-m-d", the value is an array with 'text' and 'link'.
 * @return (String) The calendar's html.
 */
function build_html_calendar($year, $month, $events = null, $batch_array = null,$link = '') {

  // CSS classes
  $css_cal = 'calendar';
  $css_cal_row = 'calendar-row';
  $css_cal_day_head = 'calendar-day-head';
  $css_cal_day = 'calendar-day';
  $css_cal_day_number = 'day-number';
  $css_cal_day_blank = 'calendar-day-np';
  $css_cal_day_event = 'calendar-day-event';
  $css_cal_event = 'calendar-event';

  // Table headings
  $headings = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];

  // Start: draw table
  $calendar =
    "<table cellpadding='0' cellspacing='0' class='{$css_cal}'>" .
    "<tr class='{$css_cal_row}'>" .
    "<td class='{$css_cal_day_head}'>" .
    implode("</td><td class='{$css_cal_day_head}'>", $headings) .
    "</td>" .
    "</tr>";

  // Days and weeks
  $running_day = date('N', mktime(0, 0, 0, $month, 1, $year));
  $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

  // Row for week one
  $calendar .= "<tr class='{$css_cal_row}'>";

  // Print "blank" days until the first of the current week
  for ($x = 1; $x < $running_day; $x++) {
    $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
  }

  // Keep going with days...
  for ($day = 1; $day <= $days_in_month; $day++) {

    // Check if there is an event today
    $cur_date = date('Y-m-d', mktime(0, 0, 0, $month, $day, $year));
    
	$my_event_start = false;
    $my_event_end = false;
	$my_event_start_part = '';
	$my_event_end_part = '';

	
	
	
	foreach($batch_array As $key => $value){
	if($value['b_start_date'] == $cur_date)	{	
	$clc_start = 'color: white;background: #4CAF50;padding: 0px 4px; border-radius: 5px;font-size: 13px;';	
	
	$my_event_start = true;	
	//keep as verival nor next use
	$my_event_start_part .=
        "<div class='{$css_cal_event}'>" .
        "<a  style='{$clc_start}' href='".$link."".$key."'>" .$value['b_name'] .  "</a>" .
        "</div>";	
	}
	if($value['b_end_date'] == $cur_date)	{	
	$clc_end = 'color: white;background: #F44336;padding: 0px 4px; border-radius: 5px;font-size: 13px;';	
	$my_event_end = true;	
	//keep as verival nor next use
	$my_event_end_part .=
        "<div class='{$css_cal_event}' style='color:green'>" .
        "<a style='{$clc_end}' href='".$link."".$key."'>" .$value['b_name'] .  "</a>" .
        "</div>";
	}
	}

    $draw_event = false;
    if (isset($events) && isset($events[$cur_date])) {
      $draw_event = true;
    }

    // Day cell
    $calendar .= $draw_event ?
      "<td class='{$css_cal_day} {$css_cal_day_event}'>" :
      "<td class='{$css_cal_day}'>";

    // Add the day number
    $calendar .= "<div class='{$css_cal_day_number}'>" . $day . "</div>";

    // START BATCH

	$calendar .= $my_event_start_part;

	$calendar .= $my_event_end_part;
	

	
    /* if ($my_event) {
      $calendar .=
        "<div class='{$css_cal_event}'>" .
        "<a href='#'>" . $my_event_v .  "</a>" .
        "</div>";
    } */
	// bkp "<a href='{$events[$cur_date]['href']}'>" . $events[$cur_date]['text'] .  "</a>" .
    // Close day cell
    $calendar .= "</td>";

    // New row
    if ($running_day == 7) {
      $calendar .= "</tr>";
      if (($day + 1) <= $days_in_month) {
        $calendar .= "<tr class='{$css_cal_row}'>";
      }
      $running_day = 1;
    }

    // Increment the running day
    else {
      $running_day++;
    }

  } // for $day

  // Finish the rest of the days in the week
  if ($running_day != 1) {
    for ($x = $running_day; $x <= 7; $x++) {
      $calendar .= "<td class='{$css_cal_day_blank}'> </td>";
    }
  }

  // Final row
  $calendar .= "</tr>";

  // End the table
  $calendar .= '</table>';

  // All done, return result
  return $calendar;
}

$batch_array = array();
$query = mysqli_query($np2con,"SELECT * FROM batchs ");
while ($row = mysqli_fetch_array($query)) {
$batch_array[$row['b_id']]['b_name'] = $row['b_name'];	
$batch_array[$row['b_id']]['b_start_date'] = $row['b_year'].'-'.$row['b_month'].'-'.$row['b_day'];	
$batch_array[$row['b_id']]['b_end_date'] = $row['b_end_year'].'-'.$row['b_end_month'].'-'.$row['b_end_day'];	

}

 $eevent = ['2020-01-16' => [ 'text' => "EB205",  'href' => "/path/to/599" ]]; 
  

 //$myevnt[] = array('3'=>'2020-01-17 202 Grapic','4'=>'2020-01-17 202 Grapic');
/*
//$eevent= [];
$alldata=array();
foreach($sds As $key => $value){
//$eevent = [''.$value.'' => ['text' => "".$key."", 'href' => "/path/to/599"]];
$alldata = [''.$value.'' => ['text' => "".$key."", 'href' => "/path/to/599"]];
//$alldata[$value][] = $key;
//array_merge_recursive($eevent2,$eevent);
}
//$eevent = $alldata;

 */
foreach($batch_array As $key => $value){
/* echo $bath_id = $key;
echo '~';
echo $bath_name = $value['b_name'];
echo '~';
echo $bath_start_date = $value['b_start_date'];
echo '~';
echo $bath_end_date = $value['b_end_date'];
echo '<br>'; */	
}
 
 
//print_r($gj_id);
for ($x = 1; $x <= 12; $x++) {
	
	

echo '<div class="clndsec">';
echo "<h2>".date("F", mktime(0, 0, 0, $x, 10))." 2020</h2>";
echo ''.build_html_calendar(2020, $x,$eevent,$batch_array,'http://localhost/oline_dos/admin/show-batch-info.php?b=').'
</div>';	
}
	
	
	
?>
<style>
/* calendar */

.clndsec h2 {
margin: 0;
    color: #ffffff;
    padding: 8px 7px;
background: #283179;
background: linear-gradient(to right, #303549, #16181f);
    text-align: center;
}
	
.clndsec {width: 32%;
float: left;
    min-height:500px;
    border: 2px solid #223750;
    border-radius: 5px;
    margin: 5px;
    overflow: hidden;
    box-sizing: border-box;
    border-bottom: 5px solid #233952;
}
@media only screen and (min-width : 50px) and (max-width : 780px)
{
.clndsec {
	width: 100%;	
}	
}
@media only screen and (min-width : 781px)
{
.clndsec {
	width: 48%;	
}	
}

table.calendar		{    width: 100%;/*border: 2px solid #444;*/}
.calendar > tbody > tr:first-child > td { box-shadow: 0px 2px 5px #444;}
tr.calendar-row	{  }
td.calendar-day	{ min-height:80px; font-size:11px; position:relative; } * html div.calendar-day { height:80px; }
td.calendar-day:hover	{ background:#eceff5; }
td.calendar-day-np	{ background:#eee; min-height:80px; } * html div.calendar-day-np { height:80px; }

td.calendar-day-head {
	background: #4680ff;
    font-weight: bold;
    text-align: center;
    padding: 15px 1px;
    color: white;
    border: 1px solid #fff;
	}
div.day-number		{ 
  /* background: #cac5c5; */
    /* padding: 5px; */
    color: #000;
    font-weight: bold;
   /*  float: right;*/
    margin: -5px -5px 0 0;
   width: 100%;
    text-align: center;
    font-size: 20px;}
/* shared */
td.calendar-day, td.calendar-day-np {/* width: 120px; */
    padding: 15px 14px;
    border-bottom: 1px solid #999;
    border-right: 1px solid #999;}
</style>

			  
            

               </div>
               </div>
               </div>
             </div>

										
												</div>            <!-- Page-Title -->
              
 
         <!-- content here -->
		 
		
		
		</div>



									   </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              
            </div>
        </div>

   <?php include('footer.php') ?>