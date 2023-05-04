<?php include('header.php');

include('admin-check.php');
    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 50;
    	$startpoint = ($page * $limit) - $limit;
		
		
		if(isset($_GET['st'])){
		}else {die();}
		$stid = $_GET['st'];
		
		die();
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

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                               
                            </div>
                            <h4 class="page-title">Send SMS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								    <section>

	  <?php
	  if(isset($_GET['st']) AND isset($_GET['typ'])){
		
		$query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id where st_id = {$stid}");
		while ($row = mysqli_fetch_array($query)) {
		 $oc_name_short = $row ['oc_name_short'];
		 $st_phone = $row ['st_phone'];
		 $st_name = $row ['st_name'];
		 $registration_number = $row ['st_registration_number'];
		 $st_batch_number = $row ['st_batch_number'];
		 
		 
$st_payment_paid = $row['st_payment_paid'];
$oc_discunt_fee = $row['oc_discunt_fee'];	
$unpaidamount = $oc_discunt_fee-$st_payment_paid;
		 
		}	
		
		$snd_sms_num = convert_bangla_number($st_phone);
					$snd_sms_num = preg_replace('/[+]88/', "", $snd_sms_num);
					$snd_sms_num = preg_replace('/[+]8/', "", $snd_sms_num);
					$snd_sms_num = preg_replace('/[+]/', "", $snd_sms_num);
					$count_num = strlen($snd_sms_num);	
			
		
		if($_GET['typ'] == 'confrm'){
$msgntf = "100milesIT
Your admission has been confirmed!
Reg:".$registration_number."";
		sendSMS('8809601001255',$snd_sms_num,$msgntf);
		echo ntf('confarmation sms Sent!',1);
		echo reloader('admin/send-sms.php?st='.$stid.'',2000);
		}  

		if($_GET['typ'] == 'Due'){
$msgntf = "Dear student
You have ".$unpaidamount." TK unpaid in ".$oc_name_short." course in
IT VISION - Reg:".$registration_number."";
		sendSMS('8809601001255',$snd_sms_num,$msgntf);
		echo ntf('Due('.$unpaidamount.') sms Sent!',1);
		echo reloader('admin/send-sms.php?st='.$stid.'',2000);
		}  
		
		
		if($_GET['typ'] == 'scholarship'){
$msgntf = "Congratulations! ".$st_name."
You have been selected for the ".$oc_name_short."  Scholarship Program - 100milesIT 
Reg:".$registration_number."";
		sendSMS('8809601001255',$snd_sms_num,$msgntf);
		echo ntf('Scholarship sms Sent!',1);
		echo reloader('admin/send-sms.php?st='.$stid.'',2000);
		}  
		
		if($_GET['typ'] == 'Info'){
$msgntf = "Dear student of  100milesIT 
".$st_name."
Course:".$oc_name_short."
Batch:".$st_batch_number."
Reg:".$registration_number."
";
		sendSMS('8809601001255',$snd_sms_num,$msgntf);
		echo ntf('Students  info sms Sent!',1);
		echo reloader('admin/send-sms.php?st='.$stid.'',2000);
		}  
		
		
		
		
	  }
	  ?>
	  
	   <table class="table table-hover"> 
		  <thead style="background:#ccc;">
		  <tr> <th>REG ID</th> <th>Full Name</th> <th>Course Name</th> <th>Payment</th> <th>Method</th><th>Number</th> <th>View Details</th></tr> </thead> 
		  
		  <tbody>
		  
		  
		<?php
		
		
		
		$Serch_setment = '';
		$setment_today = '';
		if(isset($_POST['subtodayserch'])){
		$setment_today = " AND 	st_join_date = '".date('Y')."-".date('m')."-".date('d')."' ";	
		}
		if(isset($_POST['subserch'])){
		
			 $Serch_setment = '';
			 $Batch_Number = $_POST['Batch_Number'];
			 $REG_no = $_POST['REG_no'];
			 $Mobile = $_POST['Mobile'];
			 $Student_Name = $_POST['Student_Name'];
	    if($Batch_Number != '')	{$Serch_setment .= " AND st_batch_number = '".$Batch_Number."' ";}
	    if($REG_no != '')	{$Serch_setment .= " AND st_registration_number = '".$REG_no."' ";}
	    if($Mobile != '')	{$Serch_setment .= " AND st_phone LIKE  '%".$Mobile."%' ";}
	    if($Student_Name != '')	{$Serch_setment .= " AND st_name LIKE  '%".$Student_Name."%' ";}
			
		}
		//echo $Serch_setment;
		$author = $_SESSION['ejb_user_id'];
		if($author == 'Admin' OR $author == 'Rahim'  OR $author == 'Fahim'){
		$author_setment = "where st_id > 0";	
		}else {$author_setment = "where st_reference_name = '$author'";}
		   $query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id where st_id = {$stid}");
		   while ($row = mysqli_fetch_array($query)) {
$st_payment_paid = $row['st_payment_paid'];
$oc_discunt_fee = $row['oc_discunt_fee'];	
$unpaidamount = $oc_discunt_fee-$st_payment_paid;
if($row ['st_photo'] != ''){
$usrimg = 'upload/students/'.$row ['st_photo'].'';	
}	
else {
$usrimg = 'img/11.png';
}
	echo '<tr> 
		  <th scope="row">'.$row ['st_registration_number'].'</th> 
		  <td>'.$row ['st_name'].'</td> 
		  <td>'.$row ['oc_name'].'</td> 
		  <td>';
		  
		  
		 if($row ['st_payment_status']== '1'){
			 
			if($st_payment_paid < $oc_discunt_fee ){
			  echo '<span class="label label-info">Due ('.$unpaidamount .')</span><br><span class="label label-success">Paid ('.$st_payment_paid .')</span>';
			  }else {
				  echo '<span class="label label-success">FullPaid</span>';  
			  }
			 }else{
				  echo '<span class="label label-danger">Unpaid</span>';
			  } 
		  
		  
			  
			  echo'</td> 
		  <td>'.$row ['st_payment_method'].'</td>
		  <td>'.$row ['st_phone'].'</td>
		  <td>
		  ';
		 /*  if($row ['st_payment_fullpaid']== '0'){
			  echo '<a href="admin/online-students.php?stdntpaid='.$row ['st_id'].'">
			  <button type="button" class="btn btn-success btn-sm">Full Paid?</button></a>';}
			  
		  else{echo '<a href="admin/online-students.php?stdntunpaid='.$row ['st_id'].'">
		  <button type="button" class="btn btn-danger btn-sm" >Unpaid?</button></a>';} */
		  
		  echo '
		  <button type="button" class="btn btn-dark btn-transparent mb-1 btn-theme-colored btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-'.$row ['st_registration_number'].'">View Details</button>
		  <a href="admin/send-sms.php?st='.$row ['st_id'].'&typ=scholarship" class="btn btn-danger btn-transparent mb-1 btn-theme-colored btn-sm">Scholarship SMS</a><br>
		  <a href="admin/send-sms.php?st='.$row ['st_id'].'&typ=confrm" class="btn btn-info btn-transparent mb-1 btn-theme-colored btn-sm">Confirm SMS</a>
		  <a href="admin/send-sms.php?st='.$row ['st_id'].'&typ=Due" class="btn btn-warning btn-transparent mb-1 btn-theme-colored btn-sm">Due SMS</a><br>
		  <a href="admin/send-sms.php?st='.$row ['st_id'].'&typ=Info" class="btn btn-success btn-transparent mb-1 btn-theme-colored btn-sm">Info SMS</a><br>


<div class="modal fade bs-example-modal-lg-'.$row ['st_registration_number'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="width: 585px;">
   
   
   
   <div data-example-id="contextual-table" style="background: #009688;min-width: 588px;
    border-radius: 10px" class="bs-example col-md-8 ">
<h3 style="text-align:center;" class="p-3">IT  Online Students</h3>	
			<div style="width:200px; height:200px; margin:0 auto;"><img src="'.$usrimg .'" class="mb-20 img-thumbnail"></div>
			<br>
			<table class="table"> 
	<tbody>
			<tr class="active"> 
			<th scope="row">Full Name:		
			
			</th> 
			<td>'.$row ['st_name'].'</td> 
			<th scope="row">Phone:</th>  
			<td>'.$row ['st_phone'].'</td> </tr>
			
			
			<tr> <th scope="row">Registration: 
			</th> <td>'.$row ['st_registration_number'].'</td> 
			<th scope="row">Payment :</th>  
			<td><span class="label">';
			if($row ['st_payment_status']== '0'){
			echo '<span class="label label-danger btn-sm">Pending</span>';}else{
			echo '<span class="label label-success btn-sm">Paid</span>';} 
			echo'</span></td> </tr>
			<tr class="success"> 
			<th scope="row">Course Name: </th> 
			<td>'.$row ['oc_name'].'</td> 
			<th scope="row">Date of Birth :</th> 
			<td>'.$row ['st_db'].'</td> </tr>
			
			 <tr class="active"> 
			<th scope="row">Batch No:</th> 
			<td>'.$row ['st_batch_number'].'</td> 
			<th scope="row">Reference:</th>  
			<td>'.$row ['st_reference_name'].'</td> </tr> 
			
			</tbody> 
	 
	</table> 
			<div class="row">
                      <div class="col-sm-6">
                       <a href="download-form.php?st='.$row ['st_id'].'" target="_blank"  class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">
					   DOWNLOAD FORM</a>
                      </div>
                      <div class="col-sm-6">
                       <a href="invoice.php?st='.$row ['st_id'].'" target="_blank" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">
					   VIEW INVOICE</a>
                      </div>
                    </div><br>
 
              </div>
   
   
   
   
   
   
  </div>
</div></td> 
		  </tr> ';
}
		  
		  ?>
		  
		   
		  
		  </tbody> </table> </div></div>
		 
	  
	  
	  
								</section>

                            
							</div>
                    </div>
                   </div><!--end row-->

              
             </div> <!-- end container -->
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