<?php include('header.php') ?>
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container"> 
    <!--Register Start-->
    <div class="row">
      <div class="col-md-3 col-sm-2"></div>
      <div class="col-md-6 col-sm-8">
	  
	  
        <div class="login">
          <div class="contctxt">Create Account</div>
		  <?php 
			if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true){
				echo ''.gen_notification('You are already logged in.','success').'';
			}else {
			?>

		  <?php
				if(isset($_POST['sbutn'])){
				$Firstname =  $_POST['Firstname'];
				$Lastname =  $_POST['Lastname'];
				$phone =  $_POST['phone'];
				$city =  $_POST['city'];
				$password =  sha1($_POST['password']);
				$confirm_password =  sha1($_POST['confirm_password']);
				$repeat =  11;
				
				
				$eror2 = array();

				/* if(strlen($password) < 4){
				$eror2[] = 'Password length must be of 4-15';
				}
				
				if($password != $repeat){
				$eror2[] = 'Password and confirm password don\'t match';
				}
				
				if(strlen($_POST['Firstname']) < 4){
				$eror2[] = 'Please Insert A valid Name!';
				}
				 */
				 
				 
				 
				/* //check dublitace account
				$query_notifi = 'SELECT COUNT(user_id) as `num` FROM users WHERE user_email = "'.$emailaddress.'" AND user_type = "'.$account.'"';
				$row = mysqli_fetch_array(mysqli_query($np2con,$query_notifi));
				$bacck = $row['num'];
				if($bacck > 0){
				if($account == 1){$tp ='Freelancer';}else{$tp='Employer';}
				$eror2[] = 'Email Already Registered as '.$tp.'';	
				} */
			
				if(!empty($eror2)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
				{
				/* $er_valu = '';
				foreach($eror2 as $value){
				$er_valu .= $value."<br>";
				}
			 	echo alert($er_valu,'error'); */
				}
				
				else {

					$select = "SELECT COUNT(*) as total FROM `users` WHERE user_phone = '$phone'";
			 			$account_check = mysqli_fetch_assoc(mysqli_query($np2con,$select))['total'];

			 		if($password == $confirm_password){

			 				if ($account_check < 1) {
								$sql = "INSERT INTO users(`user_first_name`, `user_last_name`, `user_pass`, `user_city`, `user_phone`) VALUES ('$Firstname','$Lastname','$password','$city','$phone')";
								if (mysqli_query($np2con,$sql)) {

									echo gen_notification('অভিনন্দন! আপনার রেজিস্ট্রেশন সফলভাবে সম্পন্ন হয়েছে ।','success');
									echo reloader('login.php',3500);
									//sendSMS('IT VisionBD',$_POST['Number'],'Your O.T.P is '.$otp.'');
						 			//echo '<script>
									//  setTimeout(function(){window.location = "sign-up-verify.php?tk='.bin2hex($_POST['Number']).'"},1000);
									// </script>';
								}
								else{
									echo gen_notification('Something is wrong','danger');
								}	
							}
							else{
								echo gen_notification('This Phone number or email already Have a account !','danger');
							}
					 
					}else{
						echo gen_notification("Password and Confirm Password don't match",'danger');
					}
			

			}		
				
			}
			
			?>
      <div class="formint conForm">
        <form method="post">
          <div class="input-wrap">
            <input type="text" name="Firstname" placeholder="First Name" class="form-control" required>
          </div>
          <div class="input-wrap">
            <input type="text" name="Lastname" placeholder="Last Name" class="form-control" required>
          </div>
	   			<div class="input-wrap">
            <input type="text" name="phone" placeholder="Phone Number or Email address" class="form-control" required>
          </div>
          <div class="input-wrap">
            <select name="city" class="form-control" required>
              <option>Select City </option>
							  <option value="Dhaka">Dhaka</option>
							  <option value="Chittagong">Chittagong</option>
							  <option value="Sylhet">Sylhet</option>
							  <option value="Rajshahi">Rajshahi</option>
							  <option value="Khulna">Khulna </option>
							  <option value="Barishal">Barishal</option>
							  <option value="Rangpur">Rangpur </option>
							  <option value="Mymenshingh">Mymenshingh</option>
            </select>
          </div>
          <div class="input-wrap">
            <input type="password" name="password" placeholder="Password" class="form-control" required>
          </div>
          <div class="input-wrap">
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
          </div>
          <div class="sub-btn">
            <input type="submit" name="sbutn"  class="sbutn" value="Register Now">
          </div>
          <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="login.php">Login Here</a></div>
        </form>	
			<?php } ?>  
      </div>
    </div>

	  </div>
      <div class="col-md-3 col-sm-2"></div>
    </div>
    <!--Register End--> 
</div>
</div>
<!--Inner Content End--> 
<?php include('footer.php') ?>