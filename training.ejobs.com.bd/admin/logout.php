<?php include('header.php') ?>

 		  <?php
			   if(isset($_SESSION['ejb_signed_in']) AND $_SESSION['ejb_signed_in'] == true)
				{		
			$_SESSION['ejb_signed_in'] = null;
			$_SESSION['ejb_signed_in'] = false;
			$_SESSION['ejb_user_id'] 	=  null;	
			echo ntf('Logged Out',1);
			echo reloader(http://localhost/online-job-portal.'/admin/login.php',100);
			die();
			}
				
			  
			  ?>
   <?php include('footer.php') ?>