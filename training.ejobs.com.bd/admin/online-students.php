<?php include('header.php');

include('admin-check.php');
    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 50;
    	$startpoint = ($page * $limit) - $limit;
		
		

																	  $admnb = $di_stf_id;
																	  IF($di_stf_desiganation == 11 or $di_stf_desiganation == 7){
																		 $admnb = 'admin';  
																	  }
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
                                                            <div class="col-lg-4 col-xl-3 col-sm-12">
                                                                <div class="badge-box">
                                                                    <div class="sub-title">Total Students

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-primary">
																	  <?php echo student_count_author($admnb,'all') ;?>
																	  </label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                                                  <div class="badge-box">
                                                                    <div class="sub-title">Admission This Month

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-success">
																	  <?php echo round(get_counselor_amount_collection($admnb,0,'this_month_Collection')/1000);?>
																	  </label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                                                <div class="badge-box">
                                                                    <div class="sub-title">Pending Students

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-danger">
																	  <?php echo student_count_author($admnb,'pending_admission') ;?>
																	  </label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                                                  <div class="badge-box">
                                                                    <div class="sub-title">TODAY FORM

                                                                    </div>

                                                                   
                                                                    <div>
                                                                      <h2>  <label class="badge badge-primary">
																	  <?php echo student_count_author($admnb,'today_form') ;?>
																	  </label>
                                                                </h2>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                     
                                                         
                                                        </div>
                                                    </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                               
                            </div>
                            <h4 class="page-title">ONLINE STUDENTS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								    <section>
      <div class="">
	 
	 <div class="" style="color:black;">
	

	<div class="row p-2 mb-2 m-1" style="background:#ccc; padding-top:10px; padding-left:10px;">
	 <form class="form-inline" method="post" name="searchfrm">
	 <div class="form-group"><input type="text" placeholder="REG NO" name="REG_no" class="form-control"/> </div> 
	 <div class="form-group">  <input type="text" placeholder="Mobile Number" name="Mobile"class="form-control"/> 
	 <input type="text" placeholder="Student Name" name="Student_Name" class="form-control"> 
	 <input type="text" placeholder="Batch Number" name="Batch_Number" 	 class="form-control"></div> 
	 <input type="submit" name="subserch" class="btn btn-info btn-transparent btn-theme-colored btn-sm" value="Search" />
	 <input type="submit" name="subtodayserch" class="btn btn-success btn-transparent btn-theme-colored btn-sm"  value="Today" />
	 
	 </form> 
	 </div>
   
	 
	 
          <div data-example-id="hoverable-table" class="bs-example"> 
		  
		  <?php
		  
		 
		  //set_pay_log(4,'wqewqeqw');
		  
		  if(isset($_GET['stdntpaid'])){
			$stdntpaid = $_GET['stdntpaid'];
			 $query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id  WHERE st_id = {$stdntpaid}");
			while ($row = mysqli_fetch_array($query)) {
			$cours_fee = $row['oc_discunt_fee'];
			}
			$sql = "UPDATE online_students SET st_payment_status = '1',st_payment_paid = '{$cours_fee}',st_payment_fullpaid = '1' WHERE st_id = {$stdntpaid}";
			if (mysqli_query($np2con,$sql)){
			echo ntf('Marked As FullPaid!',1);
			set_pay_log($stdntpaid,'Payment Full Paid by ('.$_SESSION['ejb_user_id'].')');
			echo reloader('admin/online-students.php');	
			}  
		  }
		  
		  
		  if(isset($_GET['stdntunpaid'])){
			$stdntunpaid = $_GET['stdntunpaid'];
			
			$sql = "UPDATE online_students SET st_payment_status = '0',st_payment_paid = '0',st_payment_fullpaid = '0' WHERE st_id = {$stdntunpaid}";
			if (mysqli_query($np2con,$sql)){
			echo ntf('Marked As UnPaid!',0);
			set_pay_log($stdntunpaid,'Payment Marked UnPaid by ('.$_SESSION['ejb_user_id'].')');
			echo reloader('admin/online-students.php');	
			}		  }
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
		if($author == 'Ejob-Admin' OR $author == 'Rahim'  OR $author == 'Fahimahmed' OR $di_stf_desiganation == 11 or $di_stf_desiganation == 8){
		$author_setment = "where st_id > 0";	
		}else {$author_setment = "where st_reference_name = '$author'";}
		   $query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id $author_setment  $Serch_setment  $setment_today  order by st_id DESC LIMIT {$startpoint}, {$limit}");
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
		  <button type="button" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-'.$row ['st_registration_number'].'">View Details</button>
		  <a href="admin/edit-invoice.php?st='.$row ['st_id'].'" class="btn btn-success  btn-sm" >Payment</a>
		  <a href="admin/edit-online-student.php?st='.$row ['st_id'].'" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" >Edit</a>
		  <a href="admin/send-sms.php?st='.$row ['st_id'].'" class="btn btn-info btn-transparent btn-theme-colored btn-sm" >SMS</a>


<div class="modal fade bs-example-modal-lg-'.$row ['st_registration_number'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" >
   
   
   
   <div data-example-id="contextual-table" style="background: #FFF;
margin: 0 auto;
border-top: 5px solid #51504d;
border-radius: 4px;" class="bs-example col-md-8 col-md-push-2">
<br>
<h3 style="text-align:center;">Online Students</h3>	
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
		  <div class="pagination-filter-container">
		  <?php
			$querycnt = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id $author_setment  $Serch_setment  $setment_today  order by st_id DESC");
			$countrow = mysqli_num_rows($querycnt);
		  echo pagination_all($countrow,$limit,$page);
		  ?>

              </div>
	 </div>
	 
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