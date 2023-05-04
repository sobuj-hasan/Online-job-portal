<?php include('header.php');

include('admin-check.php');
    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 50;
    	$startpoint = ($page * $limit) - $limit;
		
		
		 if($di_stf_desiganation == '5' OR $di_stf_desiganation == '7' OR $di_stf_desiganation == '8'){
	$getbatch = $_GET['batch'];
		$getcmd = $_GET['cmd'];
		$course_id = $_GET['course'];
		
		
		
		if($getcmd == 'paid'){
		$paid_setment = "AND st_payment_status = '1'";	
		}
		else{
		$paid_setment = "AND st_payment_status = '0'";	
		}
		
		$Serch_setment = '';
		$setment_today = ''; 
	 
 }else {
	 die();
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

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                               
                            </div>
                            <h4 class="page-title">STUDENTS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								    <section>
      <div class="row" style="color:black;">

          <div data-example-id="hoverable-table" class="bs-example" style="margin:0 auto;"> 
		  
		<center><h2>Batch - <?php echo $getbatch ?> | <a href="<?php echo http://localhost/online-job-portal ?>/admin/manage-batch-admin.php">BACK</a></h2></center>
		  
		  <table class="table table-hover justify-content-center"> 
		  <thead class="thead-dark">
		  <tr> <th>SL</th> <th>Full Name</th><th>REG ID</th> <th>Course Name</th> <th>Payment</th> <th>Method</th><th>Number</th> <th>View Details</th></tr> </thead> 
		  
		  <tbody>
		  
		  
		<?php
		
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
		$author = $_SESSION['pix_user_id'];
		/* if($author == 'Admin'){
		$author_setment = "where st_id > 0";	
		}else {$author_setment = "where st_reference_name = '$author'";} */
		$author_setment = "where st_id > 0";
		$sl = 1;
		   $query = mysqli_query($np2con,"
			SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id $author_setment AND st_batch_number = '".$getbatch."'  AND st_course_name = '".$course_id."' $paid_setment $Serch_setment  $setment_today  order by st_join_date asc");
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
		  <th scope="row">'.$sl.'</th> 
		  <td>'.$row ['st_name'].'</td> 
		  <th>'.$row ['st_registration_number'].'</th> 
		  <td>'.$row ['oc_name'].'</td> 
		  <td>';
		  
		  
		  if($row ['st_payment_fullpaid']== '1'){
			echo '<span class="badge badge-success">FullPaid</span>';  
		  }else {
			if($row ['st_payment_status']== '1'){
			  echo '<span class="badge badge-info">Due ('.$unpaidamount .')</span><br><span class="badge badge-success">Paid ('.$st_payment_paid .')</span>';
			  }
			  else{
				  echo '<span class="badge badge-danger">Unpaid</span>';
			  }   
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
		  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-'.$row ['st_registration_number'].'">View Details</button>
		  <a href="admin/edit-invoice.php?st='.$row ['st_id'].'" class="btn btn-success  btn-sm" >Payment</a>


<div class="modal fade bs-example-modal-lg-'.$row ['st_registration_number'].'" tabindex="-1" role="dialog" aria-badgeledby="myLargeModalbadge">
  <div class="modal-dialog modal-lg">
   
   
   
   <div data-example-id="contextual-table" style="background: #31697a;
    border-radius: 10px" class="bs-example col-md-8 col-md-push-2">
<h3 style="text-align:center;padding:10px;">IT VISION Online Students</h3>	
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
			<td><span class="badge">';
			if($row ['st_payment_status']== '0'){
			echo '<span class="badge badge-danger btn-sm">Pending</span>';}else{
			echo '<span class="badge badge-success btn-sm">Paid</span>';} 
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
		  $sl++;
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