<div class="container"> 
    <!--row start-->
    <div class="row"> 
      <!--col-md-3 start-->
      <div class="col-md-2 col-sm-3">
        <div class="logo"><a href=""><img src="images/logo.png" alt=""></a></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <!--col-md-3 end-->
      <!--col-md-7 end-->
      <div class="col-md-6 col-sm-9 m-auto">
        <!--Navegation start-->
        <div class="navigationwrape">
          <div class="navbar navbar-default" role="navigation">
            <div class="navbar-header"> </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav  navbar-expand-md navbar-dark fixed-top bg-dark">
                <li class="dropdown"> <a href="" class=""> Home </a></li>
                <!--<?php echo ($page = 'homepage' ? 'active' : '')?>-->
                <li> <a href="job-listing.php" class="" >Job Listing</a></li>
                <li> <a href="jobseeker-listing.php">Resume</a></li>
              </ul>
            </div>
            <div class="clearfix"></div>
          </div>
        </div>
        <!--Navegation start--> 
      </div>
      <!--col-md-3 end--> 
      <!--col-md-2 start-->
      <div class="col-md-4 col-sm-12 mr-auto">
      
        <div class="row">
          <div class="col-md-6 col-sm-12 m-auto">
            <div class="header-right">
              <div class="user-wrap">

                  <?php 
                    if(isset($_SESSION['ejob_signed_in']) AND $_SESSION['ejob_signed_in'] == true){
                      // admin checking start
                      $auth_user_id = $_SESSION['snm_ejob_user_id'];
                      $select_query = "SELECT user_level FROM users WHERE user_id = '$auth_user_id'";
                      $admin_check = mysqli_fetch_assoc(mysqli_query($np2con,$select_query));
                      $author_type = $admin_check['user_level'];
                      if($author_type == '1'){
                        echo '<div style="margin-right: 10px;" class="register-btn"><a style="font-size: 13px;" href="admin">Admin</a></div>';
                      }
                      // admin checking End
                    echo '<div class="register-btn"><a style="font-size: 13px;" href="dashboard">Dashboard</a></div>';
                    }
                    else {
                      echo '
                      <div class="login-btn"><a href="login.php">Login</a></div>
                      <div class="register-btn"><a href="register.php">Register</a></div>
                      ';
                    }
                  ?>
                <div class="clearfix"></div>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
          <!-- Responsive CSS -->
          <style type="text/css">
            @media only screen and (max-width: 600px) {
              .custom-post-btn {
                padding: 7px 12px;
                margin-top: -47px;
              }
              .custom-post-btn a {
                padding: 6px 10px;
              }
            }

            @media only screen and (max-width: 1200px) {
              .custom-post-btn {
                padding: 16px 20px;
                margin-top: -59px;
              }
              .custom-post-btn a {
                padding: 10px 14px;
              }
            }
          </style>
          <!-- Responsive CSS -->
          <div class="col-md-6 col-sm-12 m-auto">
            <div style="margin-left: 10px;" class="post-btn custom-post-btn">
              <a href="company-login.php">Post A Job</a>
            </div>
          </div>
        </div>
        
      </div>
      
      <!--col-md-2 end--> 
    </div>
    <!--row end--> 
  </div>