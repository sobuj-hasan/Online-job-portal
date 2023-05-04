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

 <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-4">            
                        <!-- Simple card -->
                     </div><!-- end col -->
                 <div class="col-md-6 col-lg-6 col-xl-4">            
                        <!-- Simple card -->
                        <div class="card">
                            <div class="card-body">
							<form method="post" enctype="multipart/form-data">
                                <h4 class="card-title font-20 mt-0">Setting</h4>
                                <p class="font-14">Change your information</p>
								
								<?php
									  if(isset($_POST['submitpaass'])){
										$Password = $_POST['Password'];
										$Passwordhash = sha1($Password);
										$Repeatpass = $_POST['Repeatpass']; 
										if($Password != ''){
										if($Password == $Repeatpass){
										$stmt2 = $np2con->prepare("UPDATE `staff` SET 
										stf_pass = ? Where stf_id = ?");					  
										 $stmt2->bind_param('ss',$Passwordhash,$di_stf_id);
										if ($stmt2->execute()) {
										echo ntf('password updated successfully!',1);
										//echo reloader(http://localhost/online-job-portal.'/admin/profile.php',1000);
										} 
											
										}else {echo ntf('Passwords do not match!',0);}	
										}else {echo ntf('Insert Password!',0);}
									  }
									  
									  
									  
									  if(isset($_POST['submit'])){
										  //    
												  
										$name = $_POST['name'];
										$Phone = $_POST['Phone'];
										$Password = $_POST['Password'];
										$Repeatpass = $_POST['Repeatpass'];
										$Address = $_POST['Address'];
										$mail = $_POST['mail'];
										$discription = $_POST['discription'];
										
										$stmt2 = $np2con->prepare("UPDATE `staff` SET 
										stf_name = ?,
										stf_phone = ?,
										stf_email = ?,
										stf_discription = ?,
										stf_address = ?	Where stf_id = ?");					  
										 $stmt2->bind_param('ssssss',$name,$Phone,$mail,$discription,$Address,$di_stf_id);
										if ($stmt2->execute()) {
										echo ntf('Profile Uploaded!',1);
										echo reloader(http://localhost/online-job-portal.'/admin/profile.php',1000);
										} 
									  
									  if(isset($_FILES['p_img']) && isset($_FILES['p_img']['name'])){
										  $filename = $_FILES["p_img"]["name"];
										  if($filename !=''){
											$imageFileType = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
											$target_file = ''.date('Ymd').'_'.rand(0000,9999);
											$thumb_image = $target_file.'.'.$imageFileType;	
									  image_thumb($_FILES['p_img']['name'],$_FILES['p_img']['size'],$_FILES['p_img']['type'],$_FILES['p_img']['tmp_name'],$actual_image_name = $thumb_image,$save_path = '../upload/staff/',$imgresize = '500x500',$imgquality = 90,$watermark ='');
									 
									 if($di_stf_photo != ''){
										$file_pointer = '../upload/staff/'.$di_stf_photo.''; 
									if (!unlink($file_pointer)) {  
										echo ("$file_pointer cannot be deleted due to an error");  
									}  
									else {  
										 
									} 	 
									 }
									 $stmt2 = $np2con->prepare("UPDATE `staff` SET 
										stf_photo = ? Where stf_id = ?");					  
										 $stmt2->bind_param('ss',$thumb_image,$di_stf_id);
										if ($stmt2->execute()) {
										echo ntf('Photo Uploaded successfully!',1);
										echo reloader(http://localhost/online-job-portal.'/admin/profile.php',1000);
										} 
									  }
									  }
									  
									  
									  
									  }
									
								?> 
								
                                <div class="row">
                                    <div class="col-12">
									
									<div class="text-center">
									<img class="card-img-top img-thumbnail mx-auto" style="width:200px" src="<?php echo $de_user_profile?>" alt="Card image cap">
									
									</div>
									 
									 <div class="form-group">
                                            <label class="text-center">image size 500x500</label>
                                            <input type="file" name="p_img" id="input-file-now-custom-2" class="dropify">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Name</label>
                                                <input type="text" name="name" value="<?php echo $di_stf_name?>" class="form-control" id="inputname1" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Phone</label>
                                                <input type="text" name="Phone" value="<?php echo $di_stf_phone?>"  class="form-control" id="inputnom2" placeholder="Phone">
                                            </div>
                                        </div>
                                        
										 <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="mail"  value="<?php echo $di_stf_email?>"  class="form-control" id="inputnom4" placeholder="e-mail">
                                        </div> 
										<div class="form-group">
                                            <label>Address</label>
                                            <input type="text" name="Address"  value="<?php echo $di_stf_address?>"  class="form-control" id="inputnom4" placeholder="Address">
                                        </div>
										<div class="form-group">
                                            <label>About</label>
                                            <textarea name="discription" rows="5" class="form-control" id="inputnom4"><?php echo $di_stf_dis?></textarea>
                                        </div>
										
                                       
                                        <div class="col-auto p-0">
                                            <button type="submit" name="submit" class="btn btn-block btn-info">Update</button>
                                        </div>
                                    </div>                                           
                                </div>
								<br>
								<br>
								<h4 class="card-title font-20 mt-0">Change Password</h4>
								<div class="row">
                                    <div class="col-12">
                               
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>Password</label>
                                                <input type="password" name="Password" class="form-control" id="inputname3" placeholder="Password">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>Repeat Password</label>
                                                <input type="password" name="Repeatpass" class="form-control" id="inputnom4" placeholder="Password">
                                            </div>
                                        </div>
									
                                        <div class="col-auto p-0">
                                            <button type="submit" name="submitpaass" class="btn btn-block btn-success">Change Password</button>
                                        </div>
                                    </div>                                           
                                </div>    
							</form>								
                            </div>
                        </div>            
                    </div>  
                    <div class="col-md-6 col-lg-6 col-xl-4">            
                        <!-- Simple card -->
                     
                    </div><!-- end col -->
                </div>
		
		
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