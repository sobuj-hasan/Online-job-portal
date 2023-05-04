<?php
session_start();
////////////////////////////
$np2con = new mysqli('localhost', 'ejobs_sa_trin_usr', '2gO;bhj~UQ)[', 'ejobs_sa_trinng');
//$np2con = new mysqli('localhost', 'pixelitinst_pi_sa_user', ';wbA}Kq)uVXa', 'pixelitinst_sa_db');
//MySQL server and database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'dos_online';

if($np2con->connect_errno > 0){
die('Unable to connect to database ['. $np2con->connect_error .']');
exit();
}

$page_title = 'ejobs';


$np2con->set_charset('utf8');
date_default_timezone_set('Asia/Dhaka');
$ctime = date("Y-m-d H:i:s");

$day = date('d');
$year = date('Y');
$month =  date('m');

//http://localhost/online-job-portal="http://localhost/ejobs";
http://localhost/online-job-portal="https://training.ejobs.com.bd";

$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$de_user_profile = 'img/avatar.jpg';

	 if(isset($_SESSION['ejb_signed_in']) AND $_SESSION['ejb_signed_in'] == true)
	{		
	$queryv = mysqli_query($np2con,"SELECT * FROM staff  inner join 
	desiganation 
	on  
	staff.stf_desiganation = desiganation.d_id where stf_id = '{$_SESSION['ejb_user_id']}'");	
	while ($rowc = mysqli_fetch_array($queryv)) { 
	$di_stf_id = $rowc['stf_id'];
	$di_stf_name = $rowc['stf_name'];
	$di_stf_phone = $rowc['stf_phone'];
	$di_stf_address = $rowc['stf_address'];
	$di_stf_email = $rowc['stf_email'];
	$di_stf_photo = $rowc['stf_photo'];
	$di_stf_dis = $rowc['stf_discription'];
	$di_stf_joining_date = $rowc['stf_joining_date'];
	$di_stf_desiganation = $rowc['stf_desiganation'];
	$di_stf_desiganation_name = $rowc['d_name'];
	
	if($di_stf_photo !=''){$de_user_profile = 'upload/staff/'.$di_stf_photo.'';}
	}				
	}	


$cctime = date("Y-m-d H:i:s");
function alert($msg,$type = 'success'){
return '<div style="padding: 11px 6px;
    color: green;
    border: 1px solid #333;
    text-align: center;
    line-height: 11px;
    border-radius: 3px;
    font-size: 17px;">'.$msg.'</div>';
}	//error success notice warning 



function gen_notifi($msg,$type = 'alert-info'){
$ikey = rand(0,999);
return ' <div class="alert '.$type.'" role="alert">
'.$msg.'
</div>';
$r = '<li id="'.$ikey.'bb" class="dash-ntf"><a href="javascript:void(0)">'.$msg.'</a>
<span onclick="document.getElementById(\''.$ikey.'bb\').style.display=\'none\'" class="dash-close" title="Close Chat">×</span>
</li>';	
}

function reloader($link = '' ,$timer= 1000){ 
global $actual_link;
if($link == ''){$link = $actual_link;}
return '<script>setTimeout(function(){window.location = "'.$link.'"},'.$timer.');</script>';
}


	function image_thumb($im_name,$im_size,$im_type,$im_temp,$actual_image_name,$save_path,$imgresize = 'orginal',$imgquality,$watermark = "")
{
	$max_size = 1080; //max image size in Pixels
	$destination_folder = $save_path;
	$image_name = $im_name; //file name
	$image_size = $im_size; //file size
	$image_type = $im_type; //file type
	$image_temp = $im_temp; //file temp
	//list($txt, $ext) = explode(".", $image_name);
	//$actual_image_name	= $actual_image_name.'.'.$ext;					
	switch(strtolower($image_type)){ //determine uploaded image type 
			//Create new image from file
			case 'image/png': 
				$image_resource =  imagecreatefrompng($image_temp);
				break;
			case 'image/gif':
				$image_resource =  imagecreatefromgif($image_temp);
				break;          
			case 'image/jpeg': case 'image/pjpeg':
				$image_resource = imagecreatefromjpeg($image_temp);
				break;
			default:
				$image_resource = false;
		}
	
	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
		
		if($imgresize == 'orginal'){
		$new_image_width    = $img_width;
		$new_image_height   = $img_height;
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);	
		}
		else {
		$str = $imgresize;
		$hwds = (explode("x",$str));
		$new_image_height   = $hwds[0];
		$new_image_width    = $hwds[1];
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);
		}
		//$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		//$new_image_width    = ceil($image_scale * $img_width);
		//$new_image_height   = ceil($image_scale * $img_height);
		//$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);
	    //Construct a proportional size of new image
		

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			if(!is_dir($destination_folder)){ 
				mkdir($destination_folder);//create dir if it doesn't exist
			}
			
			//center watermark
			if($watermark != ''){   
			$pos = ($new_image_height*2/100);
			$watermark_left = ($new_image_width/2)-(300/2); //watermark left
			$watermark_bottom = ($new_image_height-130); //watermark bottom
			$watermark_png_file = 'watermark.png';
			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			}
			//output image direcly on the browser.
			//header('Content-Type: image/jpeg');
			//imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			imagejpeg($new_canvas, $destination_folder.'/'.$actual_image_name,$imgquality);
			
			//free up memory
			imagedestroy($new_canvas); 
			imagedestroy($image_resource);
			//die();
			
			
			//echo "<img src='".$destination_folder."".$actual_image_name."' alt='image'  value='".$actual_image_name."' class='preview'>";

			return true;
		}
	}
	}
	
 function set_pay_log($student_id,$notes,$author,$amount){
			  global $np2con,$ctime,$day,$month,$year;
			  if($student_id !=''){
				 $sql = "INSERT INTO pay_log (`pl_author`,`pl_student`,`pl_amount`, `pl_date`,`pl_day`,`pl_month`,`pl_year`, `pl_notes`)
						VALUES ('".$author."','".$student_id."','".$amount."','".$ctime."','".$day."','".$month."','".$year."','".$notes."')";
						if ($np2con->query($sql) === TRUE) {
						return true;	
						}  
			  }
			 
		  }
		  function ntf($notes,$type){
			  if($type == 0){
			return '<center style="max-width: 300px;    color: #FF5722;    border: 1px solid;    margin: 0 auto;    border-radius: 6px;    background: #ff572238;    padding: 2px;"><span>'.$notes.'</span></center>';	
			  }
			  else{
			return '<center style="max-width: 300px;    color: green;    border: 1px solid;    margin: 0 auto;    border-radius: 6px;    background: #1492144d;  padding: 2px;"><span>'.$notes.'</span></center>';	
			  }
		  }
		  
		  		 		function course_student_count($course,$type){
		global $np2con,$day,$month,$year;
		if($type = 'all'){
		$query = mysqli_query($np2con,"SELECT * FROM online_students where st_course_name = '".$course."'  AND st_payment_status = '1'");	
			$cnt = mysqli_num_rows($query);
			return sprintf('%02d', $cnt);		
		}
		if($type = 'this_month'){
		$query = mysqli_query($np2con,"SELECT * FROM online_students where st_course_name = '".$course."'  AND st_join_month = '".$month."' AND st_join_year = '".$year."'  AND st_payment_status = '1'");	
			$cnt = mysqli_num_rows($query);
			return sprintf('%02d', $cnt);		
		}
			
}

	function notice(){
	global $np2con,$day,$month,$year;	
	return '
	       <div class="alert alert-danger fade in alert-dismissible show">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true" style="font-size:20px">×</span>
		  </button>    <strong>Wellcome!</strong> To your Dashboard.
		</div>
	';	
	}


function staff_count(){
	global $np2con;
	$query = mysqli_query($np2con,"SELECT * FROM staff");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	

}

function notifier($to,$msg,$type=0,$status=0,$priotity=0){
	global $np2con;
$ctime = ''.date("Y-m-d H:i:s").'';
if($to!='' AND $msg!=''){
$stmt = $np2con->prepare("INSERT INTO `notification` 
(nt_for_user,nt_type,nt_date,nt_msg,nt_status,nt_priority)
VALUES(?,?,?,?,?,?)");
$stmt->bind_param('ssssss',$to,$type,$ctime,$msg,$status,$priotity);
if ($stmt->execute()) {
return true;
}else {return false;}	
}else {return false;}
}
//use--notifier('Mozahid','asasas',$type=0,$status=0,$priotity=0,$np2con);


//Core function
function backup_tables($host, $user, $pass, $dbname, $tables = '*') {
	global $np2con,$day,$month,$year;
	//$np2con = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($np2con, "SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($np2con, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($np2con, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return.= 'DROPx TABLE IF EXISTS '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($np2con, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) 
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {   
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }

    //save file
    $fileName = ''.$day.'-'.$month.'-'.$year.'.sql';
    $filepath = 'sql_bkp/'.$day.'-'.$month.'-'.$year.'.sql';
    $handle = fopen($filepath,'w+');
    fwrite($handle,$return);
    if(fclose($handle)){
    $sql = "INSERT INTO sql_bkp (`sb_name`, `sb_day`, `sb_month`, `sb_year`)
	VALUES ('".$fileName."','".$day."','".$month."','".$year."')";
	if ($np2con->query($sql) === TRUE) {
	return true;    
	echo ntf("Done, the file name is: ".$fileName,1);
    exit; 	
	}
	  	
    }
}
 function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
}
	   function pagination_all($countrow, $per_page = 6,$page = 1, $url = '?'){        
    	//$query = "SELECT COUNT(*) as `num` FROM {$query}";
    	//$row = mysql_fetch_array(mysql_query($query));
    	$total = $countrow;
        $adjacents = "2"; 
			$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;								
		
    	$prev = $page - 1;							
    	$next = $page + 1;
        $lastpage = ceil($total/$per_page);
    	$lpm1 = $lastpage - 1;
    	
    	$pagination = "";
    	if($lastpage > 1)
    	{	
    		$pagination .= "<ul class='pagination'>";
                    $pagination .= "<li class='details'>Page $page of $lastpage</li>";
    		if ($lastpage < 7 + ($adjacents * 2))
    		{	
    			for ($counter = 1; $counter <= $lastpage; $counter++)
    			{
    				if ($counter == $page)
    					$pagination.= "<li><a  href='{$url}page=$counter' class='current'>$counter</a></li>";
    				else
    					$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    			}
    		}
    		elseif($lastpage > 5 + ($adjacents * 2))
    		{
    			if($page < 1 + ($adjacents * 2))		
    			{
    				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li class='dot'>...</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>...</li>";
    				for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    				$pagination.= "<li class='dot'>..</li>";
    				$pagination.= "<li><a href='{$url}page=$lpm1'>$lpm1</a></li>";
    				$pagination.= "<li><a href='{$url}page=$lastpage'>$lastpage</a></li>";		
    			}
    			else
    			{
    				$pagination.= "<li><a href='{$url}page=1'>1</a></li>";
    				$pagination.= "<li><a href='{$url}page=2'>2</a></li>";
    				$pagination.= "<li class='dot'>..</li>";
    				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
    				{
    					if ($counter == $page)
    						$pagination.= "<li><a class='current'>$counter</a></li>";
    					else
    						$pagination.= "<li><a href='{$url}page=$counter'>$counter</a></li>";					
    				}
    			}
    		}
    		
    		if ($page < $counter - 1){ 
    			$pagination.= "<li><a href='{$url}page=$next'>Next</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>Last</a></li>";
    		}else{
    			$pagination.= "<li><a class='current'>Next</a></li>";
                $pagination.= "<li><a class='current'>Last</a></li>";
            }
    		$pagination.= "</ul>\n";		
    	}
    
    
        return $pagination;
    } 
    
   function del_log($note){
global $np2con;
$ctime = ''.date("Y-m-d").'';
if($note!=''){
$stmt = $np2con->prepare("INSERT INTO `del_log` (dl_date,dl_note)VALUES(?,?)");
$stmt->bind_param('ss',$ctime,$note);
if ($stmt->execute()) {
return true;
}else {return false;}	
}else {return false;}
} 

function get_sevings($uid){
global $np2con;	
$am = 0;
$queryv = mysqli_query($np2con,"SELECT * FROM expenses Where ex_for = '".$uid."' AND ex_type = 'Salary' AND ex_save = '1' order by ex_id DESC");	
while ($rowc = mysqli_fetch_array($queryv)) { 
$am = $am+$rowc['ex_amount'];
}
//$am = $am*10/100;
return $am;	
}  


function count_ntf($uid,$type='unread'){
global $np2con;	
if($type=='unread'){$typstm = "AND nt_status = '0'";}
if($type=='all'){$typstm = "";}
$queryv = mysqli_query($np2con,"SELECT nt_id FROM notification Where nt_for_user = '".$uid."' $typstm");	
$am = mysqli_num_rows($queryv);
return $am;	
}


function logtracer($user,$type=0){
global $np2con;
date_default_timezone_set('Asia/Dhaka');
$ctime = date("Y-m-d H:i:s");
$time = date("h:i a");
$day = date('d');
$year = date('Y');
$month =  date('m');
$month =  date('m');
$ip =  getUserIP();
if($user!=''){
$stmt = $np2con->prepare("INSERT INTO `login_tracker` (`lt_user`, `lt_date`, `lt_day`, `lt_month`, `lt_year`,`lt_ip`,`lt_type`, `lt_time`)VALUES(?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssssss',$user,$ctime,$day,$month,$year,$ip,$type,$time);
if ($stmt->execute()) {
return true;
}else {return false;}	
}else {return false;}
}	
	function getUserIP(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];
	if(filter_var($client, FILTER_VALIDATE_IP))
    { $ip = $client;}
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {$ip = $forward;}
    else{$ip = $remote;}
	return $ip;
	}


function activity_tracer($user='',$note,$type=0){
global $np2con;
date_default_timezone_set('Asia/Dhaka');
$ctime = date("Y-m-d H:i:s");
$time = date("h:i a");
$day = date('d');
$year = date('Y');
$month =  date('m');
$month =  date('m');
//$ip =  getUserIP();
if($user!=''){
$stmt = $np2con->prepare("INSERT INTO `activity_tracker` (`at_user`, `at_date`, `at_day`, `at_month`, `at_year`,`at_note`,`at_type`, `at_time`)VALUES(?,?,?,?,?,?,?,?)");
$stmt->bind_param('ssssssss',$user,$ctime,$day,$month,$year,$note,$type,$time);
if ($stmt->execute()) {
return true;
}else {return false;}	
}else {return false;}
}


				function batch_students_count($batch_number,$course_id,$cmd){
			global $np2con;
			if($cmd == 'paid'){
			$queryc = mysqli_query($np2con,"SELECT st_id FROM online_students where st_batch_number = '".$batch_number."' AND st_course_name = '".$course_id."' AND st_payment_status = '1'");	
			$cnt = mysqli_num_rows($queryc);	
			return sprintf('%02d', $cnt);
			}
			if($cmd == 'unpaid'){
			$querycc = mysqli_query($np2con,"SELECT st_id FROM online_students where st_batch_number = '".$batch_number."'  AND st_course_name = '".$course_id."' AND st_payment_status = '0'");	
			$cntc = mysqli_num_rows($querycc);	
			return sprintf('%02d', $cntc);
			}
		
		}

		function check_exam_attend($reg){
		global 	$np2con;
		$query = mysqli_query($np2con,"SELECT gh_id,gh_status,gh_assmnt_status,gh_correct FROM exam_history  WHERE gh_reg_number ='{$reg}'");
		$cvb = mysqli_num_rows($query);
		if($cvb < 1){
		return 'Exam not given';	
		}else {
		while ($row = mysqli_fetch_array($query)) {
		$gh_correct_q = $row['gh_correct'];
		$gh_correct = $gh_correct_q*5;
		$gh_status = $row['gh_status'];
		$gh_assmnt_status = $row['gh_assmnt_status'];
		if($gh_status == 0) {
		return 'Exam not completed';	
		}else {
		if($gh_assmnt_status == 0) {
		return 'Assignment not submitted';	
		}else {
		return 'Full Exam Done(P-'.$gh_correct.')';		
		}}}}}


function total_payment_count($cmd,$author = 'cc'){
	global $np2con;
$rtn = 0;
if($author == 'Ejob-Admin'){
$user_stmn = '';	
}else {
$user_stmn = "and st_reference_name = '".$author."'";		
}
if($cmd=='paid'){
$query = mysqli_query($np2con,"SELECT st_payment_paid FROM online_students  where st_payment_status = '1'  $user_stmn");	
$rtn = mysqli_num_rows($query);	
}
if($cmd=='unpaid'){
$query = mysqli_query($np2con,"SELECT st_payment_paid FROM online_students  where st_payment_status = '0' $user_stmn");	
$rtn = mysqli_num_rows($query);	
}	
return $rtn;
}


function collection_count_day($cmd,$day){
global $np2con,$month,$year;
if($cmd=='paidstudent'){
$query = mysqli_query($np2con,"SELECT * FROM online_students where st_id > '0'  AND st_join_day = '".$day."' AND st_join_month = '".$month."' AND st_join_year = '".$year."'  AND st_payment_status = '1'");	
$cnt = mysqli_num_rows($query);	
return $cnt;
}
if($cmd=='totalform'){
$query = mysqli_query($np2con,"SELECT * FROM online_students where st_id > '0'  AND st_join_day = '".$day."' AND st_join_month = '".$month."' AND st_join_year = '".$year."'");	
$cnt = mysqli_num_rows($query);	
return $cnt;
}
if($cmd=='earning'){
$amount = 0;
$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' AND pl_day = '".$day."' AND pl_month = '".$month."' AND pl_year = '".$year."'");	
while ($row = mysqli_fetch_array($query)) { 
$amount = $amount+intval($row['pl_amount']);
}
return $amount;
}	
}

	function sendSMS($senderID, $recipient_no, $message){
    // Request parameters array
	//$senderID = 'IT VisionBD';
    $requestParams = array(
        'userid' => 'ovi0088@gmail.com',
        'password' => 'ovi0088',
        'body' => $message,
        'recipient' => $recipient_no,
        'sender' =>  $senderID
    );
    
    // Merge API url and parameters
    $apiUrl = "https://psms.dianahost.com/api/sms/v1/send?";
    foreach($requestParams as $key => $val){
        $apiUrl .= $key.'='.urlencode($val).'&';
    }
     $apiUrl = rtrim($apiUrl, "&");
    
    // API call
   $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 80);
    
    $response = curl_exec($ch);
    curl_close($ch);
    
    // Return curl response
   // return $response;
   // Return josn status curl response
if(strpos($response, ':200') !== false){
  sendmail('saidaminbd@gmail.com','MSG SEND SUCCESS PIXEL','MSG SEND SUCCESS PIXEL','MSG SEND SUCCESS PIXEL');
  return $response;
} else{
sendmail('saidaminbd@gmail.com','MSG SEND FAILD PIXEL','MSG SEND FAILD PIXEL','MSG SEND FAILD PIXEL');
return $response;
}
   
   
}

function sendmail($to,$subject,$body_title,$body_content){   
$messageh = '
<html>
<head>
<title>Pixelitinst</title>
</head>
<body>
<div style="">
<a style="" href="https://pixelitinst.com"><img src="https://pixelitinst.com/img/logo.png" /></a><br>
</div>
<div style="">
<p style="color:#08D;font-size:19px">Hallow....</p><br>
<p style="color:#08D;font-size:19px">'.$body_content.'</p>
</div>
<div style="background-image: linear-gradient(to bottom, #A2F396, #C1F5C2);
padding: 5px 14px;
border: 3px solid #1CCF1C;">

<p style="color:#08D;font-size:19px">Thanks.<a href="https://pixelitinst.com">pixelitinst.com</a></p>
<p style="color:#08D;font-size:17px">pixelitinst.com</p>

</div>
</body>
</html>
';
$messagestr= str_replace("\n.", "\n..", $messageh);
$message = wordwrap($messagestr, 70, "\r\n");
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Additional headers
$headers .= 'From: pixelitinst.com <support@pixelitinst.com>' . "\r\n";
// Mail it
mail($to, $subject, $message, $headers); 
      return true;
    }
function convert_bangla_number($str)
{
    $engNumber = array(1,2,3,4,5,6,7,8,9,0);
    $bangNumber = array('১','২','৩','৪','৫','৬','৭','৮','৯','০');
    $converted = str_replace($bangNumber, $engNumber, $str);
  
    return $converted;
}	


function get_counselor_amount_collection($reference,$command,$gday = 0,$gmonth = 0,$gyear = 0){
		global $np2con,$day,$month,$year;
	$amount = 0;
//where st_reference_name = '".$reference."'
	$user_sttment = " AND pl_author = '".$reference."'";
	if($command == 'this_month_Collection'){
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' $user_sttment  AND pl_month = '".$month."' AND pl_year = '".$year."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['pl_amount'];
	}
	return sprintf('%02d', $amount);
	}
	
	if($command == 'Collection_by_day'){
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' $user_sttment  AND pl_day = '".$gday."'  AND pl_month = '".$gmonth."' AND pl_year = '".$gyear."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['pl_amount'];
	}
	return sprintf('%02d', $amount);
	}
	
	if($command == 'prev_month_Collection'){
	if($month < 2){
	$monthprv = 12;	
	}else {
	$monthprv = $month-1;		
	}
	$monthprv =  sprintf('%02d',$monthprv);
	$query = mysqli_query($np2con,"SELECT pl_amount FROM pay_log where pl_id > '0' $user_sttment AND pl_month = '".$monthprv."' AND pl_year = '".$year."'");	
	while ($row = mysqli_fetch_array($query)) { 
	$amount = $amount+$row['pl_amount'];
	}
	return sprintf('%02d', $amount);
	}	
}

	function student_count_author($reference,$command,$sday= '0',$smonth = '0',$syear = '2020'){
	global $np2con,$day,$month,$year;
	if($reference == 'Ejob-Admin'){$ref = "where st_id > 0";}else {$ref = "where st_reference_name = '".$reference."'";}
	
	if($command == 'Month'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_month = '".$smonth."'  AND st_join_year = '".$syear."' AND st_payment_status = '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'search_month_admission'){
	//$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_month = '".$smonth."'  AND st_join_year = '".$syear."' AND st_payment_status = '1'");	
	//$cnt = mysqli_num_rows($query);
	//return sprintf('%02d', $cnt);	
	}
	if($command == 'search_day_admission'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_day = '".$sday."'  AND st_join_month = '".$smonth."'  AND st_join_year = '".$syear."' AND st_payment_status = '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'search_day_form'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_day = '".$sday."'  AND st_join_month = '".$smonth."'  AND st_join_year = '".$syear."' AND st_payment_status != '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	
	
	if($command == 'all'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_payment_status = '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'today_admission'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref} AND st_join_day = '".$day."'  AND st_join_month = '".$month."' AND st_join_year = '".$year."' AND st_payment_status = '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'today_form'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref} AND st_join_day = '".$day."'  AND st_join_month = '".$month."' AND st_join_year = '".$year."'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'form_this_month'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_month = '".$month."' AND st_join_year = '".$year."'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'admission_this_month'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_month = '".$month."' AND st_join_year = '".$year."' AND st_payment_status = '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'previous_month'){
	$prevyear = $year;
	if($month == 1){
	$prevmonth = 12;
	$prevyear = $year-1;
	}else {
	$prevmonth = $month-1;	
	}
	$prevyear = sprintf('%02d', $prevyear);
	$prevmonth = sprintf('%02d', $prevmonth);	
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_join_month = '".$prevmonth."' AND st_join_year = '".$prevyear."' AND st_payment_status = '1'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	if($command == 'pending_admission'){
	$query = mysqli_query($np2con,"SELECT * FROM online_students {$ref}  AND st_payment_status = '0'");	
	$cnt = mysqli_num_rows($query);
	return sprintf('%02d', $cnt);	
	}
	}

$fnc_expense_type = array('Salary' => 'Salary','Transport' => 'Transport','Snacks' => 'Snacks','Purchase' => 'Purchase','Utlities' => 'Utlities'
			,'House-Rent' => 'House rent','Mobile-Cost' => 'Mobile cost','Boosting-Cost' => 'Boosting cost'
			,'Stationary-Cost' => 'Stationary Cost','Office-Expense' => 'Office Expense'
			,'Computer-Accessories' => 'Computer Accessories','Loan-Repayment' => 'Loan Repayment','dividend-shares' => 'Dividend shares','entertainment' => 'Entertainment','internet-cost' => 'Internet Cost');

?>

