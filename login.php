<?php include('header.php') ?>
<!--Inner Content start-->
<div class="inner-content loginWrp">
  <div class="container"> 
    <!--Login Start-->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="login">
          <div class="contctxt">User Login</div>
		  		<?php
					
					if(isset($_POST['submit'])){
						$user_phone =  $_POST['user_phone'];
						$password =  $_POST['password'];
						//recent post info 
						$sqlus = "SELECT * FROM	users where user_phone = '".$user_phone."' AND user_pass = '".sha1($password)."' limit 1";
						
						$resultus = mysqli_query($np2con,$sqlus);
						if(mysqli_num_rows($resultus) < 1){
							
						echo gen_notification('Don\'t found any account!!','danger');
						}
						while($row = mysqli_fetch_assoc($resultus)){
							$user_type = $row['user_type'];
						
						echo gen_notification('Log in successfully.','success');
						session_regenerate_id();
						$_SESSION['ejob_signed_in'] = true;
						$_SESSION['snm_ejob_user_id'] 	= $row['user_id'];
						echo reloader('dashboard/',1000);
						
						
						}
					}
					 
				?>
					
			<?php 
			if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true){
				if(isset($_POST['user_phone'])){}else{
				echo gen_notification('You are already logged in.','success');}
			}else {
        ?>			
            
            <div class="formint conForm">
              <form action="" method="post">
                <div class="input-wrap">
                  <label class="input-group-addon">Email</label>
                  <input type="text" name="user_phone" placeholder="Phone number or email address" class="form-control">
                </div>
                <div class="input-wrap">
                  <label class="input-group-addon">Password <span><a href="#">Forgot Password?</a></span></label>
                  <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <div class="sub-btn">
                  <input type="submit" name="submit" class="sbutn" value="Login">
                </div>
                <div class="newuser"><i class="fa fa-user" aria-hidden="true"></i> New User? <a href="register.php">Register Here</a></div>
              </form>
            </div>
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