<?php 
include('header.php');
$page = "homepage";
  
  $job_type = $_GET['page'];

  // Total CV count query
  $select_query = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id WHERE pi_service_type = '$job_type' AND cmp_jp_status = 'active' ORDER BY id DESC";
  $private_job = mysqli_query($np2con, $select_query);
  $assoc = mysqli_fetch_assoc($private_job);

?>
  <!--featured jobs-->
  <div class="featured-wrap">
    <div class="container">
      <div class="heading-title"><span><?=$assoc['pi_service_type']?></span>'s</div>
      <div class="headTxt">eJobs featured jobs are shown here, You select the job according to your skill. Apply by clicking on & Apply Now If you have not created your CV at eJobs, create a CV .</div>
      <ul class="row">

      <?php
        foreach($private_job as $cjp_single_info) {
          ?>
            <li class="col-md-6 col-sm-6">
              <div class="listWrpService">
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="listImg">
                      <img src="#" alt="company logo">
                    </div>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-9">
                    <h3><a href="job-details.php?jp_id=<?=$cjp_single_info['id']?>"><?=$cjp_single_info['pi_job_title']?></a></h3>
                    <p><a href="category-wise-job.php?cat_id=<?=$cjp_single_info['pi_job_category']?>"><?=$cjp_single_info['jb_cat_name']?></a></p>
                    <ul class="featureInfo">
                      <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$cjp_single_info['mi_job_location']?></li>
                      <?php 
                          $date = DateTime::createFromFormat('Y-m-d', $cjp_single_info['cjp_created_at']);
                          $deadline = DateTime::createFromFormat('Y-m-d', $cjp_single_info['pi_apply_deadline']);
                        ?>
                      <li>
                        <i class="fa fa-calendar" aria-hidden="true"></i> <?=$date->format('d M Y');?> - <?=$deadline->format('d M Y');?>
                      </li>
                    </ul>
                    <div class="time-btn"><?=$cjp_single_info['pi_employe_status']?></div>
                    <div class="click-btn"><a href="job-view.php?jp_id=<?=$cjp_single_info['id']?>">Apply Now</a></div>
                  </div>
                </div>
              </div>
            </li>
          <?php
        }
      ?>

    </ul>
  </div>
</div>
<!--app start-->
<div class="app-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-7 col-sm-6 pull-right"> 
        <!--app info Start-->
        <h1>Get eJobs App for your mobile</h1>
        <p>ejobs is a Largest job site in Bangladesh. We have created apps for you to use, You can download our apps if you want. Download the apps to the Play Store now.</p>
        <div class="appbtn">
          <div class="row">
            <div class="col-md-5 col-sm-6 col-xs-6"><a href="https://play.google.com/store/search?q=ejobs&c=apps"><img src="images/apple.png" alt=""></a></div>
            <div class="col-md-5 col-sm-6 col-xs-6"><a href="https://play.google.com/store/search?q=ejobs&c=apps"><img src="images/andriod.png" alt=""></a></div>
          </div>
        </div>
        <!--app info end--> 
      </div>
      <div class="col-md-5 col-sm-6"> 
        <!--app image Start-->
        <div class="appimg"><img src="images/app-mobile.png" alt="Your alt text here"></div>
        <!--app image end--> 
      </div>
    </div>
  </div>
</div>
<!--app end--> 
<?php include('footer.php') ?>