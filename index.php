<?php 
include('header.php');
$page = "homepage";
  
  // Total CV count query
  $select_query = "SELECT * FROM user_cv ";
  $cv_info = mysqli_query($np2con, $select_query);

  // Rendom number for Total CV, Job sekker, Job post, Live job
  $now = time(); // or your date as well
  $your_date = strtotime("2021-01-15");
  $datediff = $now - $your_date;
  $dd =  round($datediff / (60 * 60 * 24));
  $renge_cv = $dd*50+date('H');

  // all job post query 
  $sqlus = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id WHERE cmp_jp_status = 'active' ORDER BY id DESC LIMIT 10";
  $resultus = mysqli_query($np2con,$sqlus);


?>
<!--slider start-->
<?php include('banner.php') ?>

<!--HOW it work part er code --> 
 <div class="container" style="margin-top:40px; margin-bottom:40px;">
    <div class="heading-title">How it <span>works</span></div>
    <div class="headTxt">Online job portal featured jobs are shown here, You select the job according to your skill. Apply by clicking on & Apply Now If you have not created your CV at Online job portal, create a CV </div>
    <ul class="row works-service">
      <li class="col-md-4">
        <a href="dashboard/add-cv.php"><div class="worksIcon"><i class="fa fa-files-o" aria-hidden="true"></i></div></a>
        <h3>Create Your Resume</h3>
        <p>Online job portal is currently a Largest job site in Bangladesh, here you will find jobs according to your skills. To find the job of your choice from Online job portal, create a account and add Resume.</p>
      </li>
      <li class="col-md-4">
        <a href="company/cjp-manage.php"><div class="worksIcon"><i class="fa fa-paper-plane" aria-hidden="true"></i></div></a>
        <h3>Post Your Jobs</h3>
        <p>Online job portal is currently a Largest job site in Bangladesh, If you want to give your organization's recruitment notice, create an account for your organization. We will contact and help you.</p>
      </li>
      <li class="col-md-4">
        <a href="jobseeker-listing.php"><div class="worksIcon"><i class="fa fa-check-square-o" aria-hidden="true"></i></div></a>
        <h3>Hired Now</h3>
        <p>You can choose the candidate of your choice from Online job portal, we have <?php echo $cv_info->num_rows + $renge_cv; ?> + CV. Where you will get your candidate</p>
      </li>
    </ul>
  </div>
<!--Browse Job End-->

  <!--featured jobs er CODE-->
  <div class="featured-wrap">
    <div class="container">
      <div class="heading-title">Featured <span>Jobs</span></div>
      <div class="headTxt">Online job portal featured jobs are shown here, You select the job according to your skill. Apply by clicking on & Apply Now If you have not created your CV at Online job portal, create a CV .</div>
      <ul class="row">

      <?php
        foreach ($resultus as $cjp_single_info) {
          ?>
            <li class="col-md-6 col-sm-6">
              <div class="listWrpService">
                <div class="row">
                  <div class="col-md-3 col-sm-3 col-xs-3">
                    <div class="listImg">
                      <img src="company/images/company-img/<?=$cjp_single_info['ac_cmp_logo']?>" alt="company logo">
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
    <div class="read-btn"><a href="all-featured-job.php">View All Featured Jobs</a></div>
  </div>
</div>
<?php include('footer.php') ?>