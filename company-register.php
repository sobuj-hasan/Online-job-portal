<?php include('header.php') ?>
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container"> 
    <!--Register Start-->
    <div class="row">
      <div class="col-md-3 col-sm-2"></div>
      <div class="col-md-6 col-sm-8">
	  
	  
       <div class="login">
         <div class="contctxt">Create Company Author Account</div>
		  <?php 
				if(isset($_SESSION['ejob_comp_signed_in']) AND $_SESSION['ejob_comp_signed_in'] == true){
					echo ''.gen_notification('You are already logged in.','success').'';
				}else {
					
				?>	
			  
			  
			  <?php
						
					if(isset($_POST['sbutn'])){
						$cmp_name =  $_POST['cmp_name'];
						$cmp_first_name =  $_POST['cmp_first_name'];
						$cmp_last_name =  $_POST['cmp_last_name'];
						$cmp_phone =  $_POST['cmp_phone'];
						$cmp_email =  $_POST['cmp_email'];
						$cmp_city =  $_POST['cmp_city'];
						//$country =  $_POST['country'];
						$cmp_pass =  sha1($_POST['cmp_pass']);
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
						$query_notifi = 'SELECT COUNT(cmp_id) as `num` FROM users WHERE cmp_email = "'.$emailaddress.'" AND cmp_type = "'.$account.'"';
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
								$select = "SELECT COUNT(*) as total FROM `company_author` WHERE cmp_email = '$cmp_email' OR cmp_phone = '$cmp_phone'";
								$account_check = mysqli_fetch_assoc(mysqli_query($np2con,$select))['total'];

									if($account_check < 1){
									$sql = "INSERT INTO company_author(`cmp_name`, `cmp_first_name`, `cmp_last_name`, `cmp_phone`, `cmp_email`, `cmp_city`, `cmp_pass`) VALUES ('$cmp_name','$cmp_first_name','$cmp_last_name','$cmp_phone','$cmp_email','$cmp_city','$cmp_pass')";
									if (mysqli_query($np2con,$sql)) {
										// 'sdsadsd';
									
									echo gen_notification('Account successfully created','success');
									//sendSMS('IT VisionBD',$_POST['Number'],'Your O.T.P is '.$otp.'');
									 echo reloader('company-login.php',1000);
									}
									else{
									echo gen_notification('Something is wrong','danger');
									}
								}
								else{
									echo gen_notification('This Email or Phone number already Have a account!','danger');
								}
							}
						}
					?>
	        <div class="formint conForm">
		        <form method="post">
		        	<div class="input-wrap">
		            <input type="text" name="cmp_name" placeholder="Company Name" class="form-control">
		          </div>
              <div class="input-wrap">
                <input type="text" name="cmp_first_name" placeholder="Company Author First Name" class="form-control">
              </div>
              <div class="input-wrap">
                <input type="text" name="cmp_last_name" placeholder="Company Author Last Name" class="form-control">
              </div>
					    <div class="input-wrap">
		              <input type="text" name="cmp_phone" placeholder="Phone Number" class="form-control">
		          </div>
					  	<div class="input-wrap">
		            <input type="email" name="cmp_email" placeholder="Email" class="form-control">
		          </div>
		          <div class="input-wrap">
		            <select name="cmp_city" class="form-control">
				          <option>Select City </option>
								  <option value="Dhaka">Dhaka</option>
								  <option value="Chittagong">Chittagong</option>
								  <option value="Sylhet">Sylhet</option>
								  <option value="Rajshahi">Rajshahi</option>
								  <option value="Khulna">Khulna </option>
								  <option value="Barisal">Barisal</option>
								  <option value="Rangpur">Rangpur</option>
								  <option value="Mymenshingh">Mymenshingh</option>
						  	</select>
		          </div>
		            <div class="input-wrap">
		              <input type="password" name="cmp_pass" placeholder="Enter a Strong Password" class="form-control">
		            </div>
		            <div class="sub-btn">
		               <input type="submit" name="sbutn"  class="sbutn" value="Register Now">
		            </div>
		             <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> You have already a account? <a href="company-login.php">Login Here</a></div>
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