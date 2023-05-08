<?php
   include ('header.php');
   $auth_user_id = $_SESSION['snm_ejob_user_id'];
   ?>
</head>
<body>
   <div class="container-scroller">
   <?php include ('nav.php');?>
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
   <div class="main-panel">
      <div class="content-wrapper">
         <div class="row">
            <?php
               // include ('part1.php');
               ?>
         </div>
         <!-- eBazar Left Side profile and menu -->
         <div class="row">
            <div class="col-md-3 col-sm-12 mt-4 grid-margin stretch-card">      
               <?php include ('set-menu.php');?>
            </div>
            <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card">
               <!--Inner Content start-->
               <div class="inner-content listing">
                  <div class="container">
                     <!--Job Listing Start-->
                     <div class="row">
                        <div class="col-md-12 col-sm-12">
                           <ul class="listService">
                              <?php
                                 // all job post show query 
                                 $select_query = "SELECT * FROM applied_job INNER JOIN company_jp  on company_jp.id = applied_job.job_post_id INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id INNER JOIN job_category on company_jp.pi_job_category = job_category.jb_id WHERE ucv_user_id = $auth_user_id";
                                 $cjp_info = mysqli_query($np2con, $select_query);
                                 
                                 foreach ($cjp_info as $cjp_single_info) {
                                    ?>
                              <li>
                                 <div class="listWrpService featured-wrap">
                                    <div class="row">
                                       <div class="col-md-2 col-sm-3 col-xs-3">
                                          <div class="listImg"><img src="company/images/company-img/<?=$cjp_single_info['ac_cmp_logo']?>" alt="company logo"></div>
                                       </div>
                                       <div class="col-md-10 col-sm-9 col-xs-9">
                                          <div class="row">
                                             <div class="col-md-9">
                                                <h3><a href="job-details.php?jp_id=<?=$cjp_single_info['id']?>"><?=$cjp_single_info['pi_job_title']?></a></h3>
                                                <p><a href="category-wise-job.php?cat_id=<?=$cjp_single_info['pi_job_category']?>"><?=$cjp_single_info['jb_cat_name']?></a></p>
                                                <ul class="featureInfo innerfeat">
                                                   <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$cjp_single_info['mi_job_location']?></li>
                                                   <?php 
                                                      $date = DateTime::createFromFormat('Y-m-d', $cjp_single_info['created_at']);
                                                      ?>
                                                   <li><i class="fa fa-calendar" aria-hidden="true"> Applied: <?=$date->format('d M Y');?></i>
                                                   <li><?=$cjp_single_info['pi_employe_status']?></li>
                                                </ul>
                                                <p class="para"><?=$cjp_single_info['pi_instraction_job_seeker']?></p>
                                             </div>
                                             <div class="col-md-3">
                                                <div class="click-btn apply"><a style="cursor: not-allowed; color: white;">Applied</a></div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </li>
                              <?php
                                 if ($cjp_single_info = "") {
                                  
                                 ?>
                                 <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card">
                                    <div class="card">
                                       <div class="card-header">
                                          <h4 class="card-title">Applied Jobs</h4>
                                       </div>
                                       <div class="card-body">
                                          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                             <div class="text-center">
                                                <img width="350px" height="350px" src="images/img-1.png" alt="">
                                                <h6 class="pt-5">Not applied for any job</h6>
                                             </div>
                                          </form>
                                       </div>
                                    </div>
                                 </div>
                                 <?php
                                 }
                              }
                              ?>
                           </ul>
                        </div>
                     </div>
                     <!--Job Listing End-->
                     
                  </div>
               </div>
               <!--Inner Content End--> 
            </div>
            <div class="row">
            </div>
         </div>
      </div>
   </div>
   <?php include ('footer.php');?>