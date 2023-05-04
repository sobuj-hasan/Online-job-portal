<?php include('header.php');
    	$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
    	$limit = 10;
    	$startpoint = ($page * $limit) - $limit;
    	$startpoint = ($page * $limit) - $limit;
    	$startpoint = ($page * $limit) - $limit;
    	$startpoint = ($page * $limit) - $limit;

?>

  <body>

    <!-- Pre-loader end -->
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

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Due Amount</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                              This Month Due Amount</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                   

                    </div>
												   </div>
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                               
                            </div>
                            <h4 class="page-title">ONLINE STUDENTS DUE AMOUNT</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
         <!-- content here -->
		 
		<div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                            <div class="general-label" style="background:black; padding:10px; margin-bottom:20px;">
                                    <form class="form-inline" role="form">
                                        <div class="form-group m-2"><input type="text" placeholder="STUDENT ID" name="REG_no" class="form-control"> </div>
                                        <div class="form-group"><input type="text" placeholder="MOBILE NUMBER" name="REG_no" class="form-control"> </div>
                                        <div class="form-group  m-2"><input type="text" placeholder="STUDENT NAME" name="REG_no" class="form-control"> </div>
                                        <div class="form-group"><input type="text" placeholder="BATCH NUMBER" name="REG_no" class="form-control"> </div>                       
                                        <button type="submit" class="btn btn-success ml-2">SEARCH</button>
                                    </form>           
                                </div>
                             
                                <div class="table-rep-plugin">
                                    <div class="table-wrapper"><div class="table-responsive b-0" data-pattern="priority-columns">
                                        <div class="sticky-table-header fixed-solution">
										<table id="tech-companies-1-clone" class="table  table-striped">
                                            <thead class="thead-dark">
                                            <tr>
                                                <th id="tech-companies-1-col-0-clone">J.DATE</th>
                                                <th id="tech-companies-1-col-0-clone">ID</th>
												<th data-priority="1" id="tech-companies-1-col-1-clone">STD.ID</th>
                                                <th data-priority="1" id="tech-companies-1-col-1-clone">NAME</th>
                                                <th data-priority="3" id="tech-companies-1-col-2-clone">COURSE</th>
                                                <th data-priority="1" id="tech-companies-1-col-3-clone">PAYMENT</th>
                                                <th data-priority="3" id="tech-companies-1-col-4-clone">GATEWAY</th>
                                                <th data-priority="3" id="tech-companies-1-col-5-clone">REF</th>
                                                <th data-priority="6" id="tech-companies-1-col-6-clone">NUMBER</th>
                                                <th data-priority="6" id="tech-companies-1-col-7-clone">OPT</th>
                                            </tr>
                                            </thead>
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
		$author = $di_stf_id;
		if($author == 'Admin' OR $author == 'Rahim'){
		$author_setment = "where st_id > 0";	
		}else {$author_setment = "where st_reference_name = '$author'";}
		   $query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id $author_setment  and st_payment_fullpaid = '0' AND st_payment_paid > 100 $Serch_setment  $setment_today  order by st_id DESC LIMIT {$startpoint}, {$limit}");
		   while ($row = mysqli_fetch_array($query)) {
$st_payment_paid = $row['st_payment_paid'];
$oc_discunt_fee = $row['oc_discunt_fee'];	
$unpaidamount = $oc_discunt_fee-$st_payment_paid;
if($row ['st_photo'] != ''){
$usrimg = 'upload/students/'.$row ['st_photo'].'';	
}	
else {
$usrimg = '../img/11.png';
}
	echo '<tr> 
		  <th scope="row">'.$row ['st_join_date'].'</th> 
		  <th >'.$row ['st_id'].'</th> 
		  <th >'.$row ['st_registration_number'].'</th> 
		  <td>'.$row ['st_name'].'</td> 
		  <td>'.$row ['oc_name'].'</td> 
		  <td>';
		  
		  
		 if($row ['st_payment_status']== '1'){
			 
			if($st_payment_paid < $oc_discunt_fee ){
			  echo '<span class="badge p-1 badge-info">Due ('.$unpaidamount .')</span><br><span class="badge p-1 badge-success">Paid ('.$st_payment_paid .')</span>';
			  }else {
				  echo '<span class="badge p-1 badge-success">FullPaid</span>';  
			  }
			 }else{
				  echo '<span class="badge p-1 badge-danger">Unpaid</span>';
			  } 
		  
		  
			  
			  echo'</td> 
		  <td>'.$row ['st_payment_method'].'</td>
		  <td>'.$row ['st_reference_name'].'</td>
		  <td>'.$row ['st_phone'].'</td>
			  <td>
		  ';
		 /*  if($row ['st_payment_fullpaid']== '0'){
			  echo '<a href="admin/online-students.php?stdntpaid='.$row ['st_id'].'">
			  <button type="button" class="btn btn-success btn-sm">Full Paid?</button></a>';}
			  
		  else{echo '<a href="admin/online-students.php?stdntunpaid='.$row ['st_id'].'">
		  <button type="button" class="btn btn-danger btn-sm" >Unpaid?</button></a>';} */
		  
		  echo '
		  <button type="button" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" data-toggle="modal" data-target=".bs-example-modal-lg-'.$row ['st_registration_number'].'">View</button>
		  <a href="admin/edit-payment.php?st='.$row ['st_id'].'" class="btn btn-success  btn-sm" >Payment</a>
		  <a href="admin/edit-online-student.php?st='.$row ['st_id'].'" class="btn btn-dark btn-transparent btn-theme-colored btn-sm" >Edit</a>
<a href="admin/delete-form.php?st='.$row ['st_id'].'" class="btn btn-danger  btn-sm" >Delete</a>

<div class="modal fade bs-example-modal-lg-'.$row ['st_registration_number'].'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" style="min-width: 890px;">
   
   
   
   <div data-example-id="contextual-table" style="background: #FFF;
margin: 0 auto;
border-top: 5px solid #51504d;
border-radius: 4px;" class="bs-example col-md-8 col-md-push-2">
<h3 style="text-align:center;" class="pt-3">IT  DUE STUDENTS</h3>	
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
			echo '<span class="badge p-1 badge-danger btn-sm">Pending</span>';}else{
			echo '<span class="badge p-1 badge-success btn-sm">Paid</span>';} 
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
                       <a href="download-form.php?st='.$row ['st_id'].'" target="_blank"  class="btn btn-block btn-info btn-sm mt-20 pt-10 pb-10">
					   DOWNLOAD FORM</a>
                      </div>
                      <div class="col-sm-6">
                       <a href="invoice.php?st='.$row ['st_id'].'" target="_blank" class="btn btn-block btn-success btn-sm mt-20 pt-10 pb-10">
					   VIEW INVOICE</a>
                      </div>
                    </div><br>
 
              </div>
   
   
   
   
   
   
  </div>
</div></td> 
		  </tr> ';
}
		  
		  ?>
		  
		   
											
											
											
                                               
                                        
                                            </tbody>
                                        </table>
										<nav aria-label="...">
                             <?php
			$querycnt = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id $author_setment  and st_payment_fullpaid = '0' AND st_payment_paid > 100 $Serch_setment  $setment_today  order by st_id DESC");
			$countrow = mysqli_num_rows($querycnt);
		  echo pagination_all($countrow,$limit,$page);
		  ?>
                                </nav>
                                   
                                    </div></div>

                                </div>

                            </div>
                        </div>
                    </div>
                   </div><!--end row-->

              
             </div>
		 
		 
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