<?php include('header.php');

include('admin-check.php');
require('super-admin-check.php');
$get_batch_id = $_GET['batch'];
$get_course_id = $_GET['course'];
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
                            <h4 class="page-title">Edit Batches</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="row">
                   <div class="col-6" style="margin: 0 auto;">
                        <div class="card">
                 <div class="card-body">
	<?php
				
				if(isset($_POST['edt_cours'])){
				 $Batche_Number =  $_POST['Batche_Number'];
	 $course_id =  $_POST['course_id'];
	 $Class_on_Week =  $_POST['Class_on_Week'];

	 $Duration =  $_POST['Duration'];
	 $Class_Time =  $_POST['Class_Time'];
	 $Class_Time_AMPM =  $_POST['Class_Time_AMPM'];
	 $Expected_Students =  $_POST['Expected_Students'];
	 $Mentor =  $_POST['Mentor'];	 
	 $Status =  $_POST['Status'];	 
	 $Visibility =  $_POST['Visibility'];	 
	  
$Class_on_Day =  $_POST['Class_on_Day'];
$Saturday = 0;
$Sunday= 0 ;
$Monday= 0 ;
$Tuesday= 0 ;
$Wednesday= 0 ;
$Thursday= 0 ;
$Friday= 0 ;
$daynams= '' ;
foreach ($Class_on_Day as $subject)  {
$daynams .= '['.$subject.']';	
if($subject == 'Saturday'){$Saturday = 1;}
if($subject == 'Sunday'){$Sunday = 1;}
if($subject == 'Monday'){$Monday = 1;}
if($subject == 'Tuesday'){$Tuesday = 1;}
if($subject == 'Wednesday'){$Wednesday = 1;}
if($subject == 'Thursday'){$Thursday = 1;}
if($subject == 'Friday'){$Friday = 1;}
	
}

$Start_Date =  $_POST['Start_Date'];		 
$Start_Date_a =  (explode("-",$Start_Date));
$Start_Date_year = $Start_Date_a[0];
$Start_Date_month = $Start_Date_a[1];
$Start_Date_day = $Start_Date_a[2];
		 
$End_Date =  $_POST['End_Date'];	
$End_Date_a =  (explode("-",$End_Date));
$End_Date_day = $End_Date_a[2];
$End_Date_month = $End_Date_a[1];
$End_Date_year = $End_Date_a[0];	
	

/* 		 $sql = "INSERT INTO batchs (`b_name`, `b_couse`, `b_creation_date`, `b_day`, `b_month`, `b_year`, `b_class_on_week`,
		 `bc_duration`, `b_end_day`, `b_end_month`, `b_end_year`, `b_class_time`, `b_class_time_ampm`, `b_mentor`, `b_ on_day_saturday`,
		 `b_ on_day_sunday`, `b_ on_day_tuesday`, `b_ on_day_wednesday`, `b_ on_day_thursday`, `b_ on_day_friday`, `b_ on_day_monday`, 
		 `b_terget`,`b_visibility`,`b_status`)
						VALUES ('".$Batche_Number."','".$course_id."','".$ctime."','".$Start_Date_day."','
						".$Start_Date_month."',						'".$Start_Date_year."','".$Class_on_Week."',
						'".$Duration."','".$End_Date_day."',
						'".$End_Date_month."','".$End_Date_year."',
						'".$Class_Time."','".$Class_Time_AMPM."','".$Mentor."','".$Saturday."','".$Sunday."',
						'".$Tuesday."','".$Wednesday."','".$Thursday."','".$Friday."','".$Monday."',
						'".$Expected_Students."','".$Visibility."','".$Status."')";
						 */
	
	$sql = "UPDATE batchs SET 
	
	 `b_name` = '".$Batche_Number."',  
	 `b_couse` = '".$course_id."',  
	 `b_creation_date` = '".$ctime."',  
	 `b_day` = '".$Start_Date_day."',  
	 `b_month` = '".$Start_Date_month."',  
	 `b_year` = '".$Start_Date_year."',  
	 `b_class_on_week` = '".$Class_on_Week."',  
	 `bc_duration` = '".$Duration."',  
	 `b_end_day` = '".$End_Date_day."',  
	 `b_end_month` = '".$End_Date_month."',  
	 `b_end_year` = '".$End_Date_year."',  
	 `b_class_time` = '".$Class_Time."',  
	 `b_class_time_ampm` = '".$Class_Time_AMPM."',  
	 `b_mentor` = '".$Mentor."',  
	 `b_on_day_saturday` = '".$Saturday."',  
	 `b_on_day_sunday` = '".$Sunday."',  
	 `b_on_day_tuesday` = '".$Tuesday."',  
	 `b_on_day_wednesday` = '".$Wednesday."',  
	 `b_on_day_thursday` = '".$Thursday."',  
	 `b_on_day_friday` = '".$Friday."',  
	 `b_on_day_monday` = '".$Monday."',  
	 `b_terget` = '".$Expected_Students."',  
	 `b_visibility` = '".$Visibility."',  
	 `b_status` = '".$Status."'
	
	WHERE b_id = '{$get_batch_id}' AND b_couse = '{$get_course_id}'";
			if (mysqli_query($np2con,$sql)){				
				echo ntf('UPDATED!',1);	
				notifier($Mentor,'Batch Info Updated! Batch('.$Batche_Number.') At - ('.$Start_Date.') Time: ('.$Class_Time.''.$Class_Time_AMPM.') OnDay - ('.$daynams.')');	
				notifier('Admin','Batch Info Updated! Batch('.$Batche_Number.') At - ('.$Start_Date.') Time: ('.$Class_Time.''.$Class_Time_AMPM.') OnDay - ('.$daynams.')');	
						
				//echo reloader('',1000);
				}else {
					
				echo ntf('FAILD!',0);
				//echo reloader('',1000);	
				}
				
				}
				

 $query = mysqli_query($np2con,"SELECT * FROM batchs where b_id = '".$get_batch_id."' AND  b_couse = '".$get_course_id."'");
while ($rowx = mysqli_fetch_array($query)) {


				?>
				
				
              <form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data">
                
				
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>Batche Number <small>*</small></label>
                      <input name="Batche_Number" value="<?php echo $rowx['b_name'];?>" type="number" placeholder="Batche Number" 
					  class="form-control" aria-required="true">
                    </div>
                  </div>
				

				  
				  
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>Course Name<small>*</small></label>
                      	<select name="course_id" class="form-control required" >
						  <option value="" selected>Select Course</option>
                          
				
							<?php
			$query = mysqli_query($np2con,"
			SELECT * FROM online_courses ");
			$cntnum = mysqli_num_rows($query );
			while ($rowc = mysqli_fetch_array($query)) {
			if($rowc['oc_status'] == 0){$status = 'disabled';$boostatus = ' (Booked)';}else{$status = '';$boostatus = '';}	
			if($rowc['oc_visibility'] == 1){
			if($rowx['b_couse'] == $rowc['oc_id']){
			$csel = 'selected';	}else {$csel = '';}
				
			echo '<option value="'.$rowc['oc_id'].'" '.$status.' '.$csel.'>'.$rowc['oc_name'].''.$boostatus.'</option>';}
			}
					  ?>
                          </select>
                    </div>
                  </div>
				

				  
				  
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>Class on Week <small>*</small></label>
                     <select name="Class_on_Week" class="form-control required" aria-required="true" >
					 
					 <?php
					 for($x = 1; $x <= 7;$x++){
					if($rowx['b_class_on_week'] == $x){
					$csel = 'selected';	}else {$csel = '';}
					echo '<option value="'.$x.'" '.$csel.'>'.$x.'</option>';	 
						 
					 }
					 ?>
                    </select>
                    </div>
                  </div>  
				  
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>Duration <small>*</small></label>
                     <select name="Duration" class="form-control required" aria-required="true" >
					 <?php
					 if($rowx['bc_duration'] == '1m'){$one_m = 'selected';	}else {$one_m = '';}
					 if($rowx['bc_duration'] == '2m'){$two_m = 'selected';	}else {$two_m = '';}
					 if($rowx['bc_duration'] == '3m'){$three_m = 'selected';	}else {$three_m = '';}
					 ?>
                      <option value="1m" <?php echo $one_m?>>1 Month</option>
                      <option value="2m" <?php echo $two_m?>>2 Month</option>
                      <option value="3m" <?php echo $three_m?>>3 Month</option>
                    </select>
                    </div>
                  </div>
				  

				
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>Start Date<small>*</small></label>
                      <input name="Start_Date" type="date" value="<?php echo $rowx['b_year']?>-<?php echo $rowx['b_month']?>-<?php echo $rowx['b_day']?>" placeholder="Orginal Fee" 
					  class="form-control" aria-required="true">
                    </div>
                </div>

				
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>End Date<small>*</small></label>
                      <input name="End_Date" type="date"  value="<?php echo $rowx['b_end_year']?>-<?php echo $rowx['b_end_month']?>-<?php echo $rowx['b_end_day']?>"
					  placeholder="Orginal Fee"  class="form-control" aria-required="true">
                    </div>
                </div>

				<div class="col-sm-12">
				<label>Class Time<small>*</small></label>
				<div class="input-group mb-3">
    <input type="number" name="Class_Time" value="<?php echo $rowx['b_class_time']?>" class="form-control" placeholder="Time">
    <div class="input-group-append">
      <select  class="form-control required" name="Class_Time_AMPM">
	  <?php
					 if($rowx['b_class_time_ampm'] == 'AM'){$AM = 'selected';	}else {$AM = '';}
					 if($rowx['b_class_time_ampm'] == 'PM'){$PM = 'selected';	}else {$PM = '';}
					 ?>
	  <option value="AM"  <?php echo $AM?>>AM </option>
	  <option value="PM"  <?php echo $PM?>>PM </option>
      </select>
    </div>
  </div>
  </div>
				
				
				<div class="col-sm-12">
                    <div class="form-group">
                      <label>Expected Students<small>*</small></label>
                      <input name="Expected_Students" value="<?php echo $rowx['b_terget']?>" type="number" placeholder="Expected Students"
					   class="form-control" aria-required="true">
                    </div>
                </div>
				
				
				
				
				 <div class="col-sm-12">
                    <div class="form-group">
                      <label>Mentor<small>*</small></label>
                      <select name="Mentor" class="form-control required" aria-required="true" >
                        <option value="">Select Staff Name</option>
                        	 <?php
			$queryv = mysqli_query($np2con,"
			SELECT * FROM staff  where stf_desiganation = '1'");
			//$cntnum = mysqli_num_rows($queryv);
			while ($rowv = mysqli_fetch_array($queryv)) {
			if($rowx['b_mentor'] == $rowv['stf_id']){
			$mnt = 'selected';	}else {$mnt = '';}
			echo '<option value="'.$rowv['stf_id'].'" '.$mnt.'>'.$rowv['stf_name'].'</option>';
		
			}
					  ?>
                      </select>
                    </div>
                  </div>

				  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Visibility<small>*</small></label>
                      <select name="Visibility" class="form-control required" aria-required="true" required>
                        <option value="">Select </option>
						<?php
					 if($rowx['b_visibility'] == '0'){$b_ves_zero = 'selected';	}else {$b_ves_zero = '';}
					 if($rowx['b_visibility'] == '1'){$b_ves_one = 'selected';	}else {$b_ves_one = '';}
					 ?>
                        <option value="0" <?php echo $b_ves_zero?>>Hidden</option>
                        <option value="1" <?php echo $b_ves_one?>>Visible</option>
                        	 
                      </select>
                    </div>
                  </div>
				  
				   <div class="col-sm-12">
                    <div class="form-group">
                      <label>Class on Day <small>*</small></label>
                     <select style="height: 175px;" class="form-control required" aria-required="true"  name = 'Class_on_Day[]' required multiple>   
                      
					  <?php
					  $days = [
						'Saturday',
						'Sunday',
						'Monday',
						'Tuesday',
						'Wednesday',
						'Thursday',
						'Friday'
						
					];
			$ondsel = '';							  // Retrieving each selected option 
            foreach ($days as $daysn)  {
			if($daysn == 'Saturday'){if($rowx['b_on_day_saturday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
			if($daysn == 'Sunday'){if($rowx['b_on_day_sunday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
			if($daysn == 'Monday'){if($rowx['b_on_day_monday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
			if($daysn == 'Tuesday'){if($rowx['b_on_day_tuesday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
			if($daysn == 'Wednesday'){if($rowx['b_on_day_wednesday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
			if($daysn == 'Thursday'){if($rowx['b_on_day_thursday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
			if($daysn == 'Friday'){if($rowx['b_on_day_friday'] == 1){$ondsel = 'selected';}else {$ondsel = '';}}
            echo  "<option value='$daysn' $ondsel>$daysn</option>"; 
			}	  
					  ?>
					  
                    </select>
                    </div>
                  </div>
				  
				  <div class="col-sm-12">
                    <div class="form-group">
                      <label>Status<small>*</small></label>
                      <select name="Status" class="form-control required" aria-required="true" required>
					  <?php
					 if($rowx['b_status'] == '0'){$Booked = 'selected';	}else {$Booked = '';}
					 if($rowx['b_status'] == '1'){$OnGoing = 'selected';	}else {$OnGoing = '';}
					 ?>
                        <option value="">Select </option>
                        <option value="0" <?php echo $Booked?>>Booked</option>
                        <option value="1" <?php echo $OnGoing?>>OnGoing</option>
                        	 
                      </select>
                    </div>
                  </div>
        		
				
							 
				
             
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <input type="submit" name="edt_cours" value="Update"  class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" />
                </div>
              </form>
			  
			  <?php } ?>
        
            

               </div>
               </div>
               </div>
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