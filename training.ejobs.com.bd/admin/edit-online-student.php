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

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                               
                            </div>
                            <h4 class="page-title">EDIT STUDENTS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-12">
                        <div class="card">
                            <div class="card-body">


								 <div class="border-1px p-30 mb-0">
         
              <hr>
             <?php

				
			  if(isset($_POST['submit'])){
				  
				          
				$st_id = $_POST['st_id'];
				$form_name = $_POST['form_name'];
				$form_email = $_POST['form_email'];
				$form_Phone = $_POST['form_Phone'];
				$form_Birth = $_POST['form_Birth'];
				$form_nid = $_POST['form_nid'];
				$form_sex = $_POST['form_sex'];
				$form_Course_Name = $_POST['form_Course_Name'];
				$form_Course_Duration = $_POST['form_Course_Duration'];
				$form_Note_Student = $_POST['form_Note_Student'];
				 $form_registration_number = $_POST['form_registration_number'];
				$form_Reference_Name = $_POST['form_Reference_Name'];
				
				$form_father_name = $_POST['form_father_name'];
				$form_mother_name = $_POST['form_mother_name'];
				$form_address_Student = $_POST['form_address_Student'];
				$form_education = $_POST['form_education'];
				$form_batch_number = $_POST['form_batch_number'];
				
				


				//$form_attachment = $_FILES['thamb_img_1']['name'];
				
				$stmt2 = $np2con->prepare("UPDATE `online_students` SET st_name = ?,
				st_father_name = ?,
				st_mother_name = ?,
				st_email = ?,
				st_phone = ?,
				st_address = ?,
				st_db = ?,
				st_nid = ?,
				st_course_name= ?,
				st_course_duration= ?,
				st_sex = ?,
				st_note = ?,
				st_batch_number = ?,
				st_reference_name = ?,
				st_education = ?
				Where st_id = ?");
				$stmt2->bind_param('ssssssssssssssss',$form_name,$form_father_name,$form_mother_name,$form_email,$form_Phone,$form_address_Student,$form_Birth,$form_nid,$form_Course_Name,$form_Course_Duration,$form_sex,$form_Note_Student,$form_batch_number,$form_Reference_Name,$form_education,$st_id);
				if ($stmt2->execute()) {
				echo ntf('Uploaded!',1);
				echo reloader(http://localhost/online-job-portal.'/admin/edit-online-student.php?st='.$st_id.'',1000);
				}
				
				
					
				
				
			  }
			  
			  ?>
			  <?php	 
			  if(isset($_GET['st'])){$query = mysqli_query($np2con,"SELECT * FROM online_students INNER JOIN online_courses on online_students.st_course_name = online_courses.oc_id where st_id = '".$_GET['st']."' limit 1");		
			  $stc = mysqli_num_rows($query);		if($stc < 1){die('<h1><center>NOT FOUND!</center></h1>');}
			  while ($row = mysqli_fetch_array($query)) { 
			  $course_fee = $row ['oc_discunt_fee'];	 
			  if($row ['st_payment_status'] == 0){			
			  $paid = '0';  			$unpaid = $course_fee;  
			  }		  if($row ['st_payment_status'] == 1){		
			  $paid = $course_fee ;  			$unpaid = 0;  	
			  }		  		  	
			  //`st_name`, `st_father_name`, `st_mother_name`, `st_email`, `st_phone`, `st_join_date`, `st_address`, `st_db`, `st_nid`, `st_course_name`, 			  `st_course_duration`, `st_course_result`, `st_sex`, `st_note`, `st_batch_number`, `st_facebook`, `st_payment_method`, `st_payment_status`, `st_payment_invoice`, `st_education`, `st_certificate`, `st_registration_number`, `st_reference_name`, `st_photo`	  
			  ?>	  			  
              <form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data" novalidate="novalidate">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Full Name as Certificate  <small>*</small></label>
                      <input name="form_name" value="<?php echo $row ['st_name']?>" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                      <input name="st_id" value="<?php echo $row ['st_id']?>" type="hidden" required="" class="form-control" aria-required="true">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email <small></small></label>
                      <input name="form_email"  value="<?php echo $row ['st_email']?>" class="form-control email" type="email" placeholder="Enter Email" aria-required="true">
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Father Name <small>*</small></label>
                      <input name="form_father_name" value="<?php echo $row ['st_father_name']?>" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                      <input name="st_id" value="<?php echo $row ['st_id']?>" type="hidden" required="" class="form-control" aria-required="true">
                    </div>
                  </div> 
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Mother Name <small></small></label>
                      <input name="form_mother_name"  value="<?php echo $row ['st_mother_name']?>" class="form-control email" type="text" aria-required="true">
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Phone Number  <small>*</small></label>
                      <input name="form_Phone"  value="<?php echo $row ['st_phone']?>" type="text" placeholder="Enter Phone Number" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Date of Birth <small></small></label>
                      <input name="form_Birth" value="<?php echo $row ['st_db']?>" class="form-control " type="text" placeholder="YY-MM-DD" aria-required="true">
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>National ID/Birth Certificate/ Student ID<small>*</small></label>
                      <input name="form_nid" type="text"  value="<?php echo $row ['st_nid']?>" placeholder="" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Course Duration<small></small></label>
                     <select name="form_Course_Duration" class="form-control required" aria-required="true" required>
                        <option value="">Select</option>
                        <option value="1d" <?php if($row['st_course_duration'] == '1d'){echo 'selected';}?>>1 Days</option>
                        <option value="3d" <?php if($row['st_course_duration'] == '3d'){echo 'selected';}?>>3 Days</option>
                        <option value="7d" <?php if($row['st_course_duration'] == '7d'){echo 'selected';}?>>7 Days</option>
                        <option value="15d" <?php if($row['st_course_duration'] == '15d'){echo 'selected';}?>>15 Days</option>
                        <option value="1m" <?php if($row['st_course_duration'] == '1m'){echo 'selected';}?>>1 Month</option>
                        <option value="2m" <?php if($row['st_course_duration'] == '2m'){echo 'selected';}?>>2 Months</option>
                        <option value="3m" <?php if($row['st_course_duration'] == '3m'){echo 'selected';}?>>3 Months</option>
                        <option value="4m" <?php if($row['st_course_duration'] == '4m'){echo 'selected';}?>>4 Months</option>
                        <option value="6m" <?php if($row['st_course_duration'] == '6m'){echo 'selected';}?>>6 Months</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sex <small>*</small></label>
                      <select name="form_sex" class="form-control required" aria-required="true" required>
                        <option value="">Select</option>
                        <option value="1" <?php if($row['st_sex'] == 1){echo 'selected';}?>>Male</option>
                        <option value="0" <?php if($row['st_sex'] == 0){echo 'selected';}?>>Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Course Name  <small>*</small></label>
                      <select name="form_Course_Name" class="form-control required valid" aria-required="true" aria-invalid="false" required>
		
					  <?php
			$queryoc = mysqli_query($np2con,"
			SELECT * FROM online_courses ");
			//$cntnum = mysqli_num_rows($queryoc );
			echo '<option value="">Select</option>';	
			while ($rowoc = mysqli_fetch_array($queryoc)) {
			if($row['st_course_name'] == $rowoc['oc_id']){$csel = 'selected';}else{$csel = '';}
			echo '<option value="'.$rowoc['oc_id'].'" '.$csel.'>'.$rowoc['oc_name'].'</option>';	
			}
					  
					  ?>

                      </select>
                    </div>
                  </div>
                </div> 
				
				<div class="row">
                  <div class="col-sm-6">
                   <div class="form-group">
                  <label>Address<small>*</small></label>
                  <textarea name="form_address_Student" class="form-control required" rows="5" placeholder="" aria-required="true"><?php echo $row ['st_address'];?></textarea>
                </div>
                  </div>
				  
				  <div class="col-sm-6">
               <div class="form-group">
                  <label>Note for Student <small>*</small></label>
                  <textarea name="form_Note_Student" class="form-control required" rows="5" placeholder="" aria-required="true"><?php echo $row ['st_note'];?></textarea>
                </div>
                  </div>
                  </div>
				
   
				<div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Education<small>*</small></label>
                      <input name="form_education" value="<?php echo $row ['st_education'];?>" type="text" placeholder=""  required="" class="form-control" aria-required="true" />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Batch number<small></small></label>
                      <input name="form_batch_number" class="form-control" value="<?php echo $row ['st_batch_number'];?>"  type="text" placeholder="" aria-required="true" />
                    </div>
                  </div>
                </div>
				<div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Registration Number <small>*</small></label>
                      <input name="form_registration_number" value="<?php echo $row ['st_registration_number'];?>" type="text" placeholder="" readonly required="" class="form-control"  />
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Reference Name<small></small></label>
					  
					  <?php
					  $author = $di_stf_id;
					  if($author == 'Ejob-Admin'){
					//$cntnum = mysqli_num_rows($queryoc );
			echo '<select name="form_Reference_Name" class="form-control required valid" aria-required="true" aria-invalid="false" required>
			option value="">Select</option>';	
			$queryvx = mysqli_query($np2con,"SELECT * FROM staff where stf_type = '1'");
			//$cntnum = mysqli_num_rows($queryvx);
			while ($rowv = mysqli_fetch_array($queryvx)) {
			
			if($rowv['stf_id'] == $row['st_reference_name']){$refc = 'Selected style="background: #8bc78b;"';}else{$refc = '';}
			echo '<option value="'.$rowv['stf_id'].'" '.$refc.'>'.$rowv['stf_name'].'</option>';
			
			}
			echo '</select>';
					 }else {
				echo '<input name="form_Reference_Name" class="form-control email" 
				value="'.$row['st_reference_name'].'" readonly type="text" placeholder="" aria-required="true">'; 
					  }
					  ?>
					  
					  
                    </div>
                  </div>
                </div>
				
				
				
                <div class="form-group">
                  <label>Photo Upload (50x50)</label>
                  <input name="thamb_img_1" class="file" type="file" multiple="" data-show-upload="false" data-show-caption="true">
                  <small>Maximum upload file size: 12 MB</small>
                </div>
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" name="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" data-loading-text="Please wait...">SUBMIT</button>
                </div>
              </form>
<?php } }else {die('<h1><center>NOT FOUND!</center></h1>');}	 		  	 ?>	
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