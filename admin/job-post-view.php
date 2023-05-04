<?php
include ('header.php');

  $jp_id = $_GET['jp_id'];

   // Total Job Post infomation 
   $select_query = "SELECT * FROM company_jp INNER JOIN all_company  on all_company.ac_id = company_jp.cjp_cmp_id";
   $jobpost_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

   if(isset($_POST['submit'])){
   
      $update_query = "UPDATE company_jp SET cmp_jp_status = 'active' WHERE id = '$jp_id'";
      $profile_update = mysqli_query($np2con, $update_query);
      $_SESSION['Job_post_status'] = "This Job Successfully Approved!";
    }

?>
<body>
   <div class="container-scroller">
   <?php include ('nav.php');?>
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
   <div class="main-panel">
   <div class="content-wrapper">

      <!-- eBazar Left Side profile and menu -->
      <div class="row">
         <div class="col-md-12 grid-margin">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">(<?=$jobpost_info['pi_job_title']?>) &nbsp;Job View</h4>
                </div>
                <?php
                  if(isset($_SESSION['Job_post_status'])){
                  ?>
                    <div class="alert alert-success mt-2">
                      <?php
                          echo $_SESSION['Job_post_status'];
                          unset($_SESSION['Job_post_status']);
                      ?>
                    </div>
                    <?php
                    }
                  ?>
                <div class="card-body">
                  
                  <div id="job-preview" class="job-preview">
                   <!-- Main Content Start-->
                   <div class="row">
                      <div class="col-md-12 col-sm-12">
                         <div class="pull-right ">
                            <p class="category"><strong>Category: </strong>Data Entry/Computer Operator</p>
                         </div>
                      </div>

                      <!------------------****---------------------->
                      <!------------------****1---------------------->
                      <div class="col-md-8 col-sm-8">
                         <div class="left">
                            <div class="row">
                               <div class="col-sm-3 col-sm-push-9">
                                 <img width="120" height="90" src="../company/images/company-img/<?=$jobpost_info['ac_cmp_logo']?>" alt="company logo">
                               </div>
                               <div class="col-sm-9 col-sm-pull-3">
                                  <h5>
                                    Company Name:
                                  </h5>
                                  <h6>
                                    <?=$jobpost_info['ac_cmp_name']?>
                                  </h6>
                               </div>
                            </div>
                            <div class="vac">
                               <h6>
                                  Vacancy:
                               </h6>
                               <p>
                                  <?=$jobpost_info['pi_vacancie']?>
                               </p>
                            </div>
                            <div class="job_des">
                               <h6>
                                  Job Context:
                               </h6>
                               <ul>
                                  <?=$jobpost_info['mi_job_context']?>
                               </ul>
                            </div>
                            <div class="job_des">
                               <h6>
                                  Job Responsibilities:
                               </h6>
                               <ul>
                                  <?=$jobpost_info['mi_job_response']?>
                               </ul>
                            </div>
                            <div class="job_nat">
                               <h6>
                                  Employment Status:
                               </h6>
                               <p>
                                  <?=$jobpost_info['pi_employe_status']?>
                               </p>
                            </div>
                            <!--Educational Requirements Details:-->
                            <div class="edu_req">
                               <h6>
                                  Educational Requirements:
                               </h6>
                               <ul>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_degree']?> </li>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_trade_course']?> </li>
                                  <li style="padding-bottom:5px"><?=$jobpost_info['ci_profess_certificate']?> </li>
                               </ul>
                            </div>
                            <div class="job_req">
                               <h6>
                                  Year of Experience:
                               </h6>
                               <ul>
                                  <li>Age <?=$jobpost_info['ci_min_experience']?> to <?=$jobpost_info['ci_max_experience']?> years  </li>
                                  <?php
                                    if($jobpost_info['ci_fresher_allow'] == 1){
                                       ?>
                                          Fresher also Allowed!
                                       <?php
                                    }
                                  ?>
                               </ul>
                            </div>
                            <div class="job_req">
                               <h6>
                                  Age Range:
                               </h6>
                               <ul>
                                  <li>Age <?=$jobpost_info['ci_min_age']?> to <?=$jobpost_info['ci_max_age']?> years  </li>
                               </ul>
                            </div>
                            <div class="job_loc" style="line-height: 24px;">
                               <h6>
                                  Workplace:
                               </h6>
                               <ul>
                                  <li>
                                     <?=$jobpost_info['mi_workplace']?>
                                  </li>
                               </ul>
                            </div>
                            <div class="job_loc" style="line-height: 24px;">
                               <h6>
                                  Job Location:
                               </h6>
                                  <?=$jobpost_info['mi_job_location']?>
                            </div>
                            <div class="salary_range">
                               <h6>
                                  Salary:
                               </h6>
                               <!--<p></p>-->
                               <ul>
                                  <li>Tk. 12000 - 20000 (Monthly)</li>
                               </ul>
                            </div>
                            <div class="job_source">
                               <h6>
                                  Job Source
                               </h6>
                               <p>
                                  Bdjobs.com Online Job Posting.
                               </p>
                            </div>
                         </div>
                      </div>
                      <!------------------****1---------------------->
                      <!---------------------->
                      <!-- Job Summary part -->
                      <!---------------------->
                      <div class="col-md-4 col-sm-4">
                         <!------------------****4---------------------->
                         <div style="border-radius: 5px;" class="right bg-light p-3">
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                   <h6>Job Summary :</h6>
                               </div>
                               <div class="panel-body">
                                  <p>
                                     <strong>Posted on:</strong> 23 May 2021
                                  </p>
                                  <p>
                                     <strong>Vacancy:</strong>
                                     Not specific
                                  </p>
                                  <p>
                                     <strong>Job Nature:</strong>
                                     Full-time
                                  </p>
                                  <p>
                                     <strong>Age:</strong> Age 31 to 33 years
                                  </p>
                                  <p style="line-height: 24px;">
                                     <strong>Job Location:</strong>
                                     <!--New Location-->
                                     Anywhere in Bangladesh
                                  </p>
                                  <p>
                                     <strong>Salary:</strong> Tk. 12000 - 20000 (Monthly)
                                  </p>
                                  <p>
                                     <strong>Application Deadline:</strong>
                                     16 Jun 2021
                                  </p>
                               </div>
                            </div>
                         </div>
                         <a id="btnPrint" href="javascript:printPreview()" class="btn btn-default" style="width: 100%;">
                         <span class="icon-print"></span>
                         Print this Preview
                         </a>                                            
                      </div>
                      <!--Edited Print Preview-->
                      <!------------------****4---------------------->
                   </div>
                   <!---------------------------->   
                   <!-- Apply Instruction Part -->
                   <!------------------****2---------------------->
                   <div class="row">
                      <!------------------****3---------------------->           
                      <div class="co-md-12 col-sm-12">
                         <div class="guide text-center ">
                            <!--strCVREceivingOptions:1-->
                            <div class="rba">
                               <h4>
                                  Read Before Apply
                               </h4>
                               <div class="rba-title-divider-l"></div>
                               <div class="s-sug-txt">sdfgas fsdf sdf agfdsg sdfg sdfg sdfgsdf gdsfg sdfg</div>
                            </div>
                            <!--strHardCopyCV:0-->
                            <div class="apto">
                               <h3>
                                  Apply Procedure
                                  <span style="display:none;">Only for test</span>
                               </h3>
                            </div>
                            <div class="apply text-center">
                               <a class="btn btn-success" href="javascript:void(0);" onclick="void(0)">Apply Online</a>
                            </div>
                            <br>
                            <!-- Apply Online For Company URL-->                      
                            <br>

                            <div>
                               <span class="date">
                               Application Deadline: <strong>16 Jun 2021</strong>
                               </span>
                            </div>
                            <!--</div>-->     
                         </div>
                         <!------------------****3---------------------->
                         <!--Company Details-->
                         <div class="company-info">
                            <h3 style="font-size: 14px;color:black;">
                               Company Information
                            </h3>
                            <span>
                            Web saiful
                            </span>
                            <span>
                            Zigatola kacha bazar, Dhaka Bangladesh
                            </span>
                            <span>
                            Web: <a href="http://fiverr.com/web_saiful">fiverr.com/web_saiful</a>
                            </span>   
                         </div>
                         
                      </div>
                   </div>
                </div>

                <form action="" method="POST">
                  <div class="text-center">
                    <?php
                      // Total Company infomation 
                      $select_query = "SELECT cmp_jp_status FROM company_jp WHERE id = '$jp_id'";
                      $job_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));
                      if ($job_info['cmp_jp_status'] == "pending") {
                        echo '.<button type="submit" name="submit" class="btn btn-info p-3 mt-4 mr-2"> Approved Job </button>.';
                      }else{
                        echo '.<a href="job-management.php" class="btn btn-success p-3 mt-4"><i class="fa fa-angle-double-left"></i> Back </a>.';
                      }
                    ?>
                    <a href="#" class="btn btn-danger p-3 mt-4"> Delete Job <i class="icon-angle-right"></i></a>
                  </div>
                </form>

                </div>
              </div>
            </div>
         </div>
      </div>
      <div class="row">
      </div>
   </div>
   </div>
</div>
<?php include ('footer.php');?>