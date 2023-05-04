<?php
  // Total users infomation 
  $select_query = "SELECT * FROM users";
  $user_info = mysqli_query($np2con, $select_query);

  // Total Company infomation 
  $select_query = "SELECT * FROM all_company";
  $company_info = mysqli_query($np2con, $select_query);

  // Total Job Post infomation 
  $select_query = "SELECT * FROM company_jp";
  $jobpost_info = mysqli_query($np2con, $select_query);

  // Total Resume infomation 
  $select_query = "SELECT * FROM user_cv";
  $resume_info = mysqli_query($np2con, $select_query);

?>

<div class="col-12 ">
   <div class="card card-statistics">
      <div class="row">
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i class="mdi mdi-account text-primary mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0"><a href="total-users.php" style="text-decoration:none;">Total Users</a></p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0"><?=$user_info->num_rows;?></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i class="mdi mdi-store mr-1 text-primary mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0"><a href="company-management.php" style="text-decoration:none;">Total Companies</a></p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0"><?=$company_info->num_rows;?></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i style="color: #8a2268;" class="fa fa-archive text-primary mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0"><a href="job-management.php" style="text-decoration:none;">Total Jobpost</a></p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0"><?=$jobpost_info->num_rows;?></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <!-- <i class="mdi mdi-cash-usd mr-0 mr-sm-4 icon-lg"></i> -->
                  <i style="color: #8a2268;" class="fa fa-file mr-0 mr-sm-4 icon-lg"></i>

                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0"><a href="cv-management.php" style="text-decoration:none;">Total Resume</a></p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0"><?=$resume_info->num_rows;?></h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="col-12 mb-4">
   <div class="card card-statistics">
      <div class="row">
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i class="mdi mdi-cart-plus text-primary mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0">Today Orders</p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0">0.00</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i class="mdi mdi-telegram mr-1 text-primary mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0"><a href="order-management.php#awd" style="text-decoration:none;">Awaiting Orders</a></p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0">0.00</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i class="mdi mdi-credit-card-multiple text-primary mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0"><a href="payment.php" style="text-decoration:none;">Weekly SMS Payment</a></p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0">0.00 ৳</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card-body">
               <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                  <i class="mdi mdi-cash-usd mr-0 mr-sm-4 icon-lg"></i>
                  <div class="wrapper text-center text-sm-left">
                     <p class="card-text mb-0">Job Post Payment</p>
                     <div class="fluid-container">
                        <h3 class="card-title mb-0">0.00 ৳</h3>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>