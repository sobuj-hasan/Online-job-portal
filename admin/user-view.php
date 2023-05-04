<?php
include ('header.php');


  $user_id = $_GET['user_id'];

  // Single user profile
  $select_query = "SELECT * FROM users WHERE user_id = '$user_id'";
  $user_profile = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

  // Total users infomation 
  $select_query = "SELECT * FROM users";
  $user_info = mysqli_query($np2con, $select_query);

  if(isset($_POST['submit'])){
    $user_level = htmlspecialchars($_POST['user_level']);

    $update_query = "UPDATE users SET user_level = '$user_level' WHERE user_id = '$user_id'";
    $profile_update = mysqli_query($np2con, $update_query);
    $_SESSION['user_role_update'] = "This user has been successfully Updated!";
  }


?>
</head>
<body>
   <div class="container-scroller">
    <?php 
      include ('nav.php');
    ?>  
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
   <div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid black;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"></i><strong> <?=$user_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> Total Users</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6" >
            <div class="card" style="border:1px solid red;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:red;"></i><strong> <?=$user_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> This Month Users</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid green;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:green;"></i><strong> <?=$user_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> This Week Users</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid orange;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline" style="color:orange;"></i><strong> 00</strong></div>
                  <div class="text-muted mb-2"> Suspended Users</div>
               </div>
            </div>
         </div>
      </div>
      <!-- eBazar Orders and menu -->
      <div class="container-fluid page-body-wrapper">
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <div class="col-12">
                     
                    <div class="card">
                      <div class="card-header">
                          <h4 class="card-title"><?=$user_profile['user_first_name'];?> <?=$user_profile['user_last_name'];?> Profile</h4>
                      </div>
                      <div class="card-body">
                        <?php
                          if(isset($_SESSION['user_role_update'])){
                          ?>
                            <div class="alert alert-success">
                              <?php
                                  echo $_SESSION['user_role_update'];
                                  unset($_SESSION['user_role_update']);
                              ?>
                            </div>
                            <?php
                            }
                          ?>
                          <form action="" method="POST">
                              <div class="row mb-4">
                                  <div class="col-md-4 px-1">
                                      <div class="form-group">
                                          <h6>User Name:</h6>
                                          <p><?=$user_profile['user_first_name'];?> <?=$user_profile['user_last_name'];?></p>
                                      </div>
                                  </div>
                                  <div class="col-md-4 pr-1">
                                      <div class="form-group">
                                          <h6>User Phone</h6>
                                          <p><?=$user_profile['user_phone'];?></p>
                                      </div>
                                  </div>
                                  <div class="col-md-4 pl-1">
                                      <div class="form-group">
                                          <h6 for="exampleInputEmail1">Email address</h6>
                                          <p><?=$user_profile['user_email'];?></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row mb-4">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <h6>Address</h6>
                                          <p><?=$user_profile['user_location'];?></p>
                                      </div>
                                  </div>
                                  <div class="col-md-4 pr-1">
                                      <div class="form-group">
                                          <h6>City</h6>
                                          <p><?=$user_profile['user_city'];?></p>
                                      </div>
                                  </div>
                                  <div class="col-md-4 px-1">
                                      <div class="form-group">
                                          <h6>Country</h6>
                                          <p><?=$user_profile['user_country'];?></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row mb-4">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <h6>About Me</h6>
                                          <p><?=$user_profile['user_about'];?></p>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <h6>Varified At</h6>
                                          <p><?=$user_profile['user_verified'];?></p>
                                      </div>
                                  </div>
                              </div>
                              <div class="row mb-4">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <h6>Profile Photo</h6>
                                          <br>
                                          <img height="100px" width="100px" src="../dashboard/images/profile_image/<?=$user_profile['user_photo'];?>" alt="img not found">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                          <h6>Role Management</h6>
                                          <select type="text" class="form-control" name="user_level">
                                            <option value="<?=$user_profile['user_level'];?>"> <?php echo ($user_profile['user_level'] == "0" ? "User" : "Admin")?> </option>
                                            <option value="0">User</option>
                                            <option value="1">Admin</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="text-right mt-4">
                                  <a href="total-users.php" class="btn btn-info btn-fill pull-right ml-4"><i class="fa fa-angle-double-left"></i> Back</a>
                                  <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Save Now</button>
                              </div>
                              <div class="clearfix"></div>
                          </form>
                      </div>
                  </div>

                  </div>
               </div>
            </div>
         </div>
         <!-- main-panel ends -->
      </div>
      <div class="row">
      </div>
   </div>
<?php include ('footer.php');?>