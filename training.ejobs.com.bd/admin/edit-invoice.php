<?php include('header.php');

include('admin-check.php');
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


                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


							<div class="row">
              <div class="col-sm-6">
              <h3 class="text-theme-colored mt-0 pt-5">Payment Invoice</h3>
           
			 
             <?php
			 
			function check_batch_fillup($batch_num,$course_id){
			global $np2con;
			$b_terget = 0;
			$status = '00';
			$query = mysqli_query($np2con,"SELECT * FROM batchs  WHERE b_name = '$batch_num' AND  b_couse = '$course_id'");
			while ($row = mysqli_fetch_array($query)) {
			$b_terget = $row['b_terget'];
			$b_status = $row['b_status'];
			}
			if(isset($b_status) AND $b_status == '0'){
			$status = 'booked';	
			}else {
			$querycv = mysqli_query($np2con,"SELECT * FROM online_students   WHERE st_batch_number = '$batch_num' AND st_course_name = '$course_id' AND  (st_payment_status = '1' OR st_payment_paid > '99')");	 
			$admitted = mysqli_num_rows($querycv);
			if($admitted >= $b_terget){
			$status =  'booked';
			}else {
			$status = 'ongoing'	;
			}	
			}
			return $status;
			}
			

			
			 
			//echo  check_batch_fillup('601',1);
			 
				if(isset($_GET['st'])){
				$query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id  WHERE st_id = '{$_GET['st']}'");
				if(mysqli_num_rows($query) < 1){echo ntf('not found!',0);die();}
				while ($row = mysqli_fetch_array($query)) {
				$st_payment_paid = $row['st_payment_paid'];
				$st_note = $row['st_note'];
				$st_name = $row['st_name'];
				$batch_num = $row['st_batch_number'];
				$oc_discunt_fee = $row['oc_discunt_fee'];
				$oc_name = $row['oc_name'];
				$oc_id = $row['oc_id'];
				$st_payment_fullpaid = $row['st_payment_fullpaid'];
				$st_reference_name = $row['st_reference_name'];
				}	
					
				}
				else {
				echo ntf('not found!',0);
				die();	
					
				}
			

			
			  if(isset($_POST['submit'])){
			
				 $st_id = $_GET['st'];
				 $paid = $_POST['Paid'];
				 $previus_paid = $_POST['previus_paid'];
				 $note = $_POST['note'];
				 $paylog_note = 'Paid ('.$paid.') Note ('.$note.')';
				 $total_paid = $previus_paid+$paid;
				 $course_fee = $_POST['course_fee'];
				$sts = '1';
				if($total_paid >= $course_fee){
				$fullpaid = '1';	
				}else {
				$fullpaid = '0';	
				}
				if($paid >= 100){
				if($previus_paid >= $course_fee){
				echo '
			<div class="alert alert-danger" role="alert">
			  <h4 class="alert-heading">Sorry!</h4>
			  <p> এই স্টুডেন্ট এর পেমেন্ট ইতোমধ্যে ফুল পেইড হয়ে গিয়েছে!!</p>
			  <hr></div>';
				}
				else{
				////$queryx = mysqli_query($np2con,"SELECT pl_id FROM pay_log where pl_student = '".$st_id."'  AND pl_notes = '".$paylog_note."'");	
				////$cnt = mysqli_num_rows($queryx);	
				////if($cnt < 1){
				if($st_payment_paid >= '100'){
				//echo 'old Student';
				$stmt2 = $np2con->prepare("UPDATE `online_students` SET st_payment_paid = ?,st_payment_status = ?,st_payment_fullpaid = ?,st_note = ? Where st_id = ?");
				$stmt2->bind_param('sssss',$total_paid,$sts,$fullpaid,$note,$st_id);
				if ($stmt2->execute()) {
				echo ntf('Payment Updated!',1);
				set_pay_log($st_id,$paylog_note,$st_reference_name,$paid);
				echo reloader('admin/edit-invoice.php?st='.$st_id.'',1000);
				}else {
				echo ntf('Payment Updated Failed!',0);	
				} 	
				}
				else {
				//echo 'New Students paid';	
				
				//check batch alreadyb felup	
				if(check_batch_fillup($batch_num,$oc_id) == 'ongoing'){
				$stmt2 = $np2con->prepare("UPDATE `online_students` SET st_payment_paid = ?,st_join_date = ?,st_join_day = ?,st_join_month = ?,st_join_year = ?,st_payment_status = ?,st_payment_fullpaid = ?,st_note = ? Where st_id = ?");
				$stmt2->bind_param('sssssssss',$total_paid,$ctime,$day,$month,$year,$sts,$fullpaid,$note,$st_id);
				if ($stmt2->execute()) {
				echo ntf('Payment Updated!',1);
				set_pay_log($st_id,$paylog_note,$st_reference_name,$paid);
				echo reloader('admin/edit-invoice.php?st='.$st_id.'',1000);
				}else {
				echo ntf('Payment Updated Failed!',0);	
				} 	
				}else {
				echo '
			<div class="alert alert-danger" role="alert">
			  <h4 class="alert-heading">Sorry!</h4>
			  <p> এই ব্যাচ টি ফিলাপ হয়ে গিয়েছে তাই এই ব্যাচে স্টুডেন্ট এড করা সম্ভব হচ্ছেনা!</p>
			  <hr></div>';	
			  //die();
				}
				
				
				
	
				}
				////}else {
				////echo ntf('Already Submitted!',0);		
				////}
					
				}			
				
				
					
				}
				
				
					
				
			  }
			  ?>
			  
			    <?php
				$unpaid = $oc_discunt_fee-$st_payment_paid ;
			  echo '
					<table class="table">
					<tr>
					<td>Student:</td>
					<td>'.$st_name .'</td>
					</tr>
					<tr>
					<td>Course:</td>
					<td>'.$oc_name .'</td>
					</tr>
					
					<tr>
					<td>Batch:</td>
					<td>
					<span class="label label-info">'.$batch_num .'</span>&nbsp;';
					if(check_batch_fillup($batch_num,$oc_id) == 'ongoing'){
					echo '<span class="label label-success">OnGoing</span>';}
					else {echo '<span class="label label-danger">Booked</span>';}
					
					//echo batch_students_count($batch_num,$oc_id,'paid');
					echo '</td>
					</tr>
					
					
					<tr>
					<td>Course Fee:</td>
					<td>'.$oc_discunt_fee .'/-</td>
					</tr>
					<tr>
					<td>Paid:</td>
					<td>'.$st_payment_paid .'/-</td>
					</tr>
					<tr>
					<td>UnPaid:</td>
					<td>'.$unpaid.'/-</td>
					</tr>
					</table>
					
					';
				
			  ?>
			   <form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Paid Amounts  <?php if($st_payment_fullpaid== '1'){echo '<span class="label label-success">FullPaid</span>';   } ?> <small>*</small></label>
                      <input name="Paid" value="" type="number" required="" class="form-control" aria-required="true">
                      <input name="previus_paid" value="<?php echo $st_payment_paid?>" type="hidden" required="" class="form-control" aria-required="true">
                      <input name="course_fee" value="<?php echo $oc_discunt_fee;?>" type="hidden" required="" class="form-control" aria-required="true">
                     </div>
                  </div> 
          
                </div>


				
				<div class="row">
       				  
				  <div class="col-sm-12">
               <div class="form-group">
                  <label>Note for Student <small>*</small></label>
                  <textarea name="note" class="form-control required" rows="5" placeholder="" aria-required="true"></textarea>
                </div>
                  </div>
                  </div>
				
   <div class="col-sm-12">
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" name="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">SUBMIT</button>
                </div>
				
				
				
				<div class="row">
                      <div class="col-sm-6">
                       <a href="admin/download-form.php?st=<?php echo $_GET['st']?>" target="_blank" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10 md-opjjpmhoiojifppkkcdabiobhakljdgm_doc">
					   DOWNLOAD FORM</a>
                      </div>
                      <div class="col-sm-6">
                       <a href="admin/invoice.php?st=<?php echo $_GET['st']?>" target="_blank" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10 md-opjjpmhoiojifppkkcdabiobhakljdgm_doc">
					   VIEW INVOICE</a>
                      </div>
                    </div>
				
                </div>
              </form>

			   </div>
			   
			   <div class="col-sm-6">
			   <h3 class="text-theme-colored mt-0 pt-5">Payment Log</h3>
              <?php
			  
			  $query = mysqli_query($np2con,"SELECT * FROM pay_log  WHERE pl_student = '{$_GET['st']}' order by pl_id DESC limit 10");
				//if(mysqli_num_rows($query) < 1){echo ntf('not found!',0);die();}
				echo '<table class="table">';
				echo '<tr><td>Log</td><td>Amount</td><td>Date</td></tr>';	
				while ($rowe = mysqli_fetch_array($query)) {
				echo '<tr><td>'.$rowe['pl_notes'] .'</td><td>'.$rowe['pl_amount'] .'/-</td><td>'.substr($rowe['pl_date'], 0, -9).'</td></tr>';	
				}
				echo '</table>';
			  
			  ?>
			   
			  </div>
			  </div>

                            
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