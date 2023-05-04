<?php include('header.php') ?>
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container"> 
    <!--Login Start-->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="login">
          <div class="contctxt">You'r Logout</div>
		
					
			<?php 
			if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true){
					$_SESSION['ejob_signed_in'] = false;
					$_SESSION['ejob_signed_in'] = NULL;
					$_SESSION['snm_ejob_user_id'] = NULL;
					session_regenerate_id();
					session_destroy();
					//echo reloader(http://localhost/online-job-portal,2000);
					echo gen_notification('You have successfully logged out.','success');
					echo reloader('',1500);
			}else {	
				echo '<div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="login.php" class="md-opjjpmhoiojifppkkcdabiobhakljdgm_doc">Login
				</a></div>';
			?>		
			<?php } ?>
		  
        </div>
      </div>
      <div class="col-md-3"></div>
    </div>
    
    <!--Login End--> 
</div>
</div>
<!--Inner Content End--> 
<?php include('footer.php') ?>