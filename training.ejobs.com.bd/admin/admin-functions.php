<?php
function expense_collection($command,$reference = 'all'){
	global $np2con,$day,$month,$year;
	$amount = 0;
	if($reference == 'all'){
	$user_sttment = '';	
	}else {
	$user_sttment = " AND ex_for = '".$reference."'";		
	}	
	if($command == 'monthly_expense'){
	$query = mysqli_query($np2con,"SELECT ex_amount FROM expenses where ex_id > '0' $user_sttment AND ex_month = '".$month."' AND ex_year = '".$year."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['ex_amount'];
	}
	return sprintf('%02d', $amount);
	}
	if($command == 'total_expense'){
	$query = mysqli_query($np2con,"SELECT ex_amount FROM expenses where ex_id > '0' $user_sttment");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['ex_amount'];
	}
	return sprintf('%02d', $amount);
	}	
}
function due_payment($command,$reference = 'all'){
	global $np2con,$day,$month,$year;
	$amount = 0;
	if($reference == 'all'){
	$user_sttment = '';	
	}else {
	$user_sttment = " AND st_reference_name = '".$reference."'";		
	}	
	if($command == 'total_due'){
	$query = mysqli_query($np2con,"SELECT st_payment_paid,oc_discunt_fee FROM online_students  INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id where st_payment_status = '1' $user_sttment");	
	while ($row = mysqli_fetch_array($query)) { 
	//$cours_fee = $row['oc_discunt_fee'];
	$amount = $amount+$row['oc_discunt_fee'];
	$amount = $amount-$row['st_payment_paid'];
	}
	return sprintf('%02d', $amount);
	}
}
function payment_collection($command,$reference = 'all'){
	global $np2con,$day,$month,$year;
	$amount = 0;
	if($reference == 'all'){
	$user_sttment = '';	
	}else {
	$user_sttment = " AND pl_author = '".$reference."'";		
	}
	//where st_reference_name = '".$reference."'
	if($command == 'today_Collection'){
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' $user_sttment AND pl_day = '".$day."' AND pl_day = '".$day."' AND pl_month = '".$month."' AND pl_year = '".$year."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['pl_amount'];
	}
	return sprintf('%02d', $amount);
	}
	
	if($command == 'monthly_collection'){
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' $user_sttment AND  pl_month = '".$month."' AND pl_year = '".$year."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['pl_amount'];
	}
	return sprintf('%02d', $amount);
	}
	if($command == 'total_collection'){
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' $user_sttment");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+intval($row['pl_amount']);
	}
	return sprintf('%02d', $amount);
	}
	

}
?>