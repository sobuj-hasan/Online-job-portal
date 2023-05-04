<?php include('header.php');

include('admin-check.php');
//include('super-admin-check.php');

IF($di_stf_desiganation == 11 or $di_stf_desiganation == 5 or $di_stf_desiganation == 7){
include_once('admin-functions.php');    
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
                                 <!-- content here -->
                                 <div class="row">
                                    <div class="col-md-9 mx-auto">
                                       <div class="card">
                                          <div class="card-body">
                                           
										   <h3 class="text-theme-colored mt-0">Create Batches</h3>
              <hr>
				<?php
	 if(isset($_POST['creat_cours'])){
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


	 $queryc = mysqli_query($np2con,"SELECT b_name FROM batchs where b_name = '".$Batche_Number."' AND b_couse = '".$course_id."'");	
	$cnt = mysqli_num_rows($queryc);
	 $one = '1';
	 //if(1== 21){
	 if($cnt < 1){
		 $sql = "INSERT INTO batchs (`b_name`, `b_couse`, `b_creation_date`, `b_day`, `b_month`, `b_year`, `b_class_on_week`,
		 `bc_duration`, `b_end_day`, `b_end_month`, `b_end_year`, `b_class_time`, `b_class_time_ampm`, `b_mentor`, `b_on_day_saturday`,
		 `b_on_day_sunday`, `b_on_day_tuesday`, `b_on_day_wednesday`, `b_on_day_thursday`, `b_on_day_friday`, `b_on_day_monday`, 
		 `b_terget`,`b_visibility`,`b_status`)
						VALUES ('".$Batche_Number."','".$course_id."','".$ctime."','".$Start_Date_day."','".$Start_Date_month."',
						'".$Start_Date_year."','".$Class_on_Week."','".$Duration."','".$End_Date_day."','".$End_Date_month."','".$End_Date_year."',
						'".$Class_Time."','".$Class_Time_AMPM."','".$Mentor."','".$Saturday."','".$Sunday."','".$Tuesday."','".$Wednesday."','".$Thursday."','".$Friday."','".$Monday."','".$Expected_Students."','".$Visibility."','".$Status."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf('Batch Created!',1);
						notifier($Mentor,'Your New Batch Started! Batch('.$Batche_Number.') At - ('.$Start_Date.') Time: ('.$Class_Time.''.$Class_Time_AMPM.') OnDay - ('.$daynams.')');	
						notifier('Admin','New Batch Started! Batch('.$Batche_Number.') At - ('.$Start_Date.') Time: ('.$Class_Time.''.$Class_Time_AMPM.') OnDay - ('.$daynams.')');	
						//echo reloader('admin/manage-batchs.php');	
						} 	 
	 }else {
		echo ntf('Already Added!',0); 
	 }
//Class_on_Day[]


/*
ALTER TABLE `batchs`  ADD `b_class_on_week` INT NOT NULL  AFTER `b_year`,  ADD `bc_duration` TEXT NOT NULL  AFTER `b_class_on_week`,  ADD `b_start_day` TEXT NOT NULL  AFTER `bc_duration`,  ADD `b_start_month` INT NOT NULL  AFTER `b_start_day`,  ADD `b_start_year` INT NOT NULL  AFTER `b_start_month`,  ADD `b_end_day` INT NOT NULL  AFTER `b_start_year`,  ADD `b_end_month` INT NOT NULL  AFTER `b_end_day`,  ADD `b_end_year` INT NOT NULL  AFTER `b_end_month`,  ADD `b_class_time` INT NOT NULL  AFTER `b_end_year`,  ADD `b_class_time_ampm` INT NOT NULL  AFTER `b_class_time`,  ADD `b_mentor` INT NOT NULL  AFTER `b_class_time_ampm`,  ADD `b_on_day_saturday` INT NOT NULL  AFTER `b_mentor`,  ADD `b_on_day_sunday` INT NOT NULL  AFTER `b_on_day_saturday`,  ADD `b_on_day_tuesday` INT NOT NULL  AFTER `b_on_day_sunday`,  ADD `b_on_day_wednesday` INT NOT NULL  AFTER `b_on_day_tuesday`,  ADD `b_on_day_thursday` INT NOT NULL  AFTER `b_on_day_wednesday`,  ADD `b_on_day_friday` INT NOT NULL  AFTER `b_on_day_thursday`,  ADD `b_on_day_monday` INT NOT NULL  AFTER `b_on_day_friday`;
ALTER TABLE `batchs` CHANGE `b_start_month` `b_start_month` TEXT NOT NULL, CHANGE `b_start_year` `b_start_year` TEXT NOT NULL, CHANGE `b_end_day` `b_end_day` VARCHAR(11) NOT NULL, CHANGE `b_end_month` `b_end_month` VARCHAR(11) NOT NULL, CHANGE `b_end_year` `b_end_year` VARCHAR(11) NOT NULL, CHANGE `b_class_time` `b_class_time` VARCHAR(11) NOT NULL, CHANGE `b_class_time_ampm` `b_class_time_ampm` VARCHAR(11) NOT NULL, CHANGE `b_mentor` `b_mentor` VARCHAR(11) NOT NULL, CHANGE `b_on_day_saturday` `b_on_day_saturday` VARCHAR(11) NOT NULL, CHANGE `b_on_day_sunday` `b_on_day_sunday` VARCHAR(11) NOT NULL, CHANGE `b_on_day_tuesday` `b_on_day_tuesday` VARCHAR(11) NOT NULL, CHANGE `b_on_day_wednesday` `b_on_day_wednesday` VARCHAR(11) NOT NULL, CHANGE `b_on_day_thursday` `b_on_day_thursday` VARCHAR(11) NOT NULL, CHANGE `b_on_day_friday` `b_on_day_friday` VARCHAR(11) NOT NULL, CHANGE `b_on_day_monday` `b_on_day_monday` VARCHAR(11) NOT NULL;
*/

	
	
		/*  $sql = "INSERT INTO online_courses (`oc_name`, `oc_name_short`, `oc_orginal_fee`, `oc_discunt_fee`, `oc_discunt_percent`, `oc_date`)
						VALUES ('".$full_name."','".$short_name."','".$orginal_fee."','".$discunt_fee."','".$discunt_percent."','".$ctime."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf('Course Offer Created!',1);
						echo reloader('admin/manage-courses.php');	
						}  */
						
						// Retrieving each selected option 
           // foreach ($_POST['subject'] as $subject)  {
              //  print "You selected $subject<br/>"; }
	 }

				
				?>
              <form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data">
                 <div class="row">
				
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>Batche Number <small>*</small></label>
                      <input name="Batche_Number" type="number" placeholder="Batche Number"  class="form-control" aria-required="true">
                    </div>
                  </div>
				

				  
				  
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>Course Name<small>*</small></label>
                      	<select name="course_id" class="form-control required" >
						  <option value="" selected>Select Course</option>
                          
				
							<?php
			$query = mysqli_query($np2con,"
			SELECT * FROM online_courses ");
			$cntnum = mysqli_num_rows($query );
			while ($row = mysqli_fetch_array($query)) {
			if($row['oc_status'] == 0){$status = 'disabled';$boostatus = ' (Booked)';}else{$status = '';$boostatus = '';}	
			if($row['oc_visibility'] == 1){
			echo '<option value="'.$row['oc_id'].'" '.$status.'>'.$row['oc_name'].''.$boostatus.'</option>';}
			}
					  ?>
                          </select>
                    </div>
                  </div>
				

				  
				  
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>Class on Week <small>*</small></label>
                     <select name="Class_on_Week" class="form-control required" aria-required="true" >
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                    </select>
                    </div>
                  </div>  
				  
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>Duration <small>*</small></label>
                     <select name="Duration" class="form-control required" aria-required="true" >
                      <option value="1m">1 Month</option>
                      <option value="2m">2 Month</option>
                      <option value="3m">3 Month</option>
                    </select>
                    </div>
                  </div>
				  

				
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>Start Date<small>*</small></label>
                      <input name="Start_Date" type="date" placeholder="Orginal Fee" " class="form-control" aria-required="true">
                    </div>
                </div>

				
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>End Date<small>*</small></label>
                      <input name="End_Date" type="date" placeholder="Orginal Fee"  class="form-control" aria-required="true">
                    </div>
                </div>

				<div class="col-sm-6">
				<label>Class Time<small>*</small></label>
				<div class="input-group mb-3">
    <input type="number" name="Class_Time" class="form-control" placeholder="Time">
    <div class="input-group-append">
      <select  class="form-control required" name="Class_Time_AMPM">
	  <option value="AM">AM </option>
	  <option value="PM">PM </option>
      </select>
    </div>
  </div>
  </div>
				
				
				<div class="col-sm-6">
                    <div class="form-group">
                      <label>Expected Students<small>*</small></label>
                      <input name="Expected_Students" type="number" placeholder="Expected Students"
					   class="form-control" aria-required="true">
                    </div>
                </div>
				
				
				
				
				 <div class="col-sm-6">
                    <div class="form-group">
                      <label>Mentor<small>*</small></label>
                      <select name="Mentor" class="form-control required" aria-required="true" >
                        <option value="">Select Staff Name</option>
                        	 <?php
			$queryv = mysqli_query($np2con,"
			SELECT * FROM staff where stf_desiganation = '1'");
			//$cntnum = mysqli_num_rows($queryv);
			while ($rowv = mysqli_fetch_array($queryv)) {
			
			echo '<option value="'.$rowv['stf_id'].'">'.$rowv['stf_name'].'</option>';
		
			}
					  ?>
                      </select>
                    </div>
                  </div>

				  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Visibility<small>*</small></label>
                      <select name="Visibility" class="form-control required" aria-required="true" required>
                        <option value="">Select </option>
                        <option value="0">Hidden</option>
                        <option value="1">Visible</option>
                        	 
                      </select>
                    </div>
                  </div>
				  
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status<small>*</small></label>
                      <select name="Status" class="form-control required" aria-required="true" required>
                        <option value="">Select </option>
                        <option value="0">Booked</option>
                        <option value="1">OnGoing</option>
                        	 
                      </select>
                    </div>
                  </div>
        		
				
							  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Class on Day <small>*</small></label>
                     <select class="form-control required" aria-required="true"  name = 'Class_on_Day[]' multiple>   
                      
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
										  // Retrieving each selected option 
            foreach ($days as $daysn)   {
                echo "<option value='$daysn'>$daysn</option>"; }
					  
					  ?>
					  
                    </select>
                    </div>
                  </div>
				
             <div class="col-sm-12">
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <input type="submit" name="creat_cours"  value="Create" class="btn btn-block btn-info p-2 btn-theme-colored 
				  btn-sm mt-20 pt-10 pb-10" >
                </div>
                </div>
                
				
				
				</div>
				 </form>
        
            
										   
										   </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- content here -->
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
        </div>

   <?php include('footer.php') ?>