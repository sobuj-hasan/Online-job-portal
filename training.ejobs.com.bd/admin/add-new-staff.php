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
                   <div class="col-9" style="margin:0 auto;">
                        <div class="card">
<div class="card-body">
                  <h3 class="text-theme-colored mt-0 pt-5">Add Staff</h3>
  
    <?php
			 /*   
			
			
			Source
			
			 */
			 //echo str_replace(" ","",'Sayed Amin');
			if(isset($_POST['subfrm'])){
			$Name = $_POST['Name'];
			$email = $_POST['email'];
			$Phone = $_POST['Phone'];
			$Sex = $_POST['Sex'];
			$Department = $_POST['Department'];
			$Joining = $_POST['Joining'];
			$Facebook = $_POST['Facebook'];
			$Desiganation = $_POST['Desiganation'];
			$Address = $_POST['Address'];
			$Notes = $_POST['Notes'];
			$Password = $_POST['Password'];
			$Offline_Online = $_POST['Offline_Online'];
			$type= $_POST['show_on_form']; //teacher
			
			// $staff_working = $_POST['staff_working'];
			
			// if($staff_working == 'Online'){
			// $staff_db = 'staff';	
			// }
			// if($staff_working == 'Offline'){
			// $staff_db = 'staff_offline';		
			// }
			
			$Username = $_POST['Username'];
			$uid = preg_replace('/\s+/', ' ', $Username);
			$uid = strtolower(str_replace(" ","",$uid));
			$uid = ucfirst(str_replace(" ","",$uid));
			
			
			$sql = "INSERT INTO staff (`stf_id`,`stf_name`, `stf_pass`, `stf_type`, `stf_phone`,`stf_email`, `stf_sex`, `stf_joining_date`, `stf_facebook`, `stf_desiganation`,`stf_online_offline`, `stf_address`, `stf_notes`)
						VALUES ('".$uid."','".$Name."','".$Password."','".$type."','".$Phone."','".$email."','".$Sex."','".$Joining."','".$Facebook."','".$Desiganation."','".$Offline_Online."','".$Address."','".$Notes."')";
						if ($np2con->query($sql) === TRUE) {
						echo ntf('Staff ID Created!',1);
						echo ntf('UserName: '.$uid.'',1);
						echo ntf('Password: '.$Password.'',1);
						//echo  reloader('',1000);						
			}else {
				echo ntf('Faild!',0);
				
			}
			
			}
			   ?>
              <form id="job_apply_form" name="job_apply_form" action="" method="post" enctype="multipart/form-data" >
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Name <small>*</small></label>
                      <input name="Name" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Email (User ID)<small>*</small></label>
                      <input name="email" class="form-control required email" type="email" placeholder="Enter Email" aria-required="true">
                    </div>
                  </div>
                </div>
				 <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Phone Number <small>*</small></label>
                      <input name="Phone" type="text" placeholder="Enter Name" required="" class="form-control" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Source <small>*</small></label>
                      <input name="Source" class="form-control required email" type="text" placeholder="" aria-required="true">
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Sex <small>*</small></label>
                      <select name="Sex" class="form-control required" aria-required="true">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Department <small>*</small></label>
                      <select name="Department" class="form-control required" aria-required="true">
                        <option value="" selected>Select Department</option>
                          
					
							<?php
			$query = mysqli_query($np2con,"
			SELECT * FROM courses ");
			$cntnum = mysqli_num_rows($query );
			while ($row = mysqli_fetch_array($query)) {
	
			echo '<option value="'.$row['c_id'].'">'.$row['c_name'].'</option>';
			}
					  ?>
                      </select>
                    </div>
                  </div>
                </div>
								 <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Joining Date<small>*</small></label>
                      <input name="Joining" class="form-control required email" type="text" placeholder="YYYY-MM-DD" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Facebook<small>*</small></label>
                     <input name="Facebook" class="form-control required email" type="text" placeholder="" aria-required="true">
                    </div>
                  </div>
                </div>
				
				
				 <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Desiganation<small>*</small></label>
                      <select name="Desiganation" class="form-control required" aria-required="true">
                        <option value="" selected>Select Desiganation</option>
                          
					
							<?php
			$query = mysqli_query($np2con,"
			SELECT * FROM desiganation ");
			$cntnum = mysqli_num_rows($query );
			while ($row = mysqli_fetch_array($query)) {
	
			echo '<option value="'.$row['d_id'].'">'.$row['d_name'].'</option>';
			}
					  ?>
                      </select>
					  </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Address<small>*</small></label>
                     <input name="Address" class="form-control required email" type="text" placeholder="" aria-required="true">
                    </div>
                  </div>
                </div>

				<div class="row">               
                       <div class="col-sm-6">
                    <div class="form-group">
                      <label>Login Username<small>*</small></label>
                     <input name="Username" class="form-control required email" type="text" placeholder="" aria-required="true">
                    </div>
                  </div>
				  
				  
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Password<small>*</small></label>
                     <input name="Password" class="form-control required email" type="text" placeholder="" aria-required="true">
                    </div>
                  </div>
				  
                </div>
				
				<div class="row">               
                       <div class="col-sm-6">
                    <div class="form-group">
                      <label>Stuff Working in Offline/Online?<small>*</small></label>
                     <select name="Offline_Online" class="form-control required" aria-required="true" required>
                        <option value="" selected>Select</option>
                        <option value="0" >Offline</option>
                        <option value="1" >Online</option>
                          
					 </select>
					 </div>
                  </div> 
				  
				  
				 
				  
				  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Show on admission  form?<small>*</small></label>
                     <select name="show_on_form" class="form-control required" aria-required="true" required>
                        <option value="" selected>Select</option>
                        <option value="1" >Yes</option>
                        <option value="2" >No</option>
                          
					 </select>
					 </div>
                  </div>
				
                </div>
				
                <div class="form-group">
                  <label>Notes For Staff <small>*</small></label>
                  <textarea name="Notes" class="form-control required" rows="5" placeholder="Your cover letter/message sent to the employer" aria-required="true"></textarea>
                </div>
                <div class="form-group">
                  <label>Photo</label>
                  <input name="form_attachment" class="file" type="file" multiple="" data-show-upload="false" data-show-caption="true">
                  <small>Maximum upload file size: 12 MB</small>
                </div>
                <div class="form-group">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
                  <button type="submit" name="subfrm" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10" >Add New Staff</button>
                </div>
              </form>
        
  
  </div>
				 </div>
               </div>
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