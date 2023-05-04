<?php 
include('header.php');

  $jp_id = $_GET['jp_id'];

  // Job Post fully infomation
  $select_query = "SELECT * FROM company_jp WHERE id = '$jp_id'";
  $jobpost_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

  // Company Information select query
  $company_id = $jobpost_info['cjp_cmp_id'];
  $select_query = "SELECT * FROM all_company WHERE ac_id = '$company_id'";
  $company_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

    $author_id = $jobpost_info['cmp_author_id'];
    $cmp_id = $jobpost_info['cjp_cmp_id'];
    $job_post_id = $jobpost_info['id'];

    if(isset($_POST['submit'])){
      $name = htmlspecialchars($_POST['name']);
      $phone = htmlspecialchars($_POST['phone']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);

      $select = "SELECT count(*) as total FROM guest_apply WHERE author_id = '$author_id'";
      $apply_check = mysqli_fetch_assoc(mysqli_query($np2con, $select))['total'];

      if($apply_check > 0){
        $_SESSION['already_apply_status'] = "You Have Already Applied This Job!";
      }
      else{
        $insert_query = "INSERT INTO `guest_apply`(`author_id`, `cmp_id`, `job_post_id`, `name`, `phone`, `email`, `message`) VALUES ('$author_id', '$cmp_id', '$job_post_id', '$name', '$phone', '$email', '$message')";
        $guest_apply = mysqli_query($np2con, $insert_query);
        $_SESSION['apply_job_status'] = "Your Apply With Form Successfully Submitted!";
      }
    }
?>

<!--inner heading start-->
<div class="inner-heading">
  <div class="container">
    <h3>Job Details</h3>
  </div>
</div>
<!--inner heading end--> 

<!--Inner Content start-->
<div class="inner-content listing detail">
  <div class="container"> 
    
    <!--Detail page start-->
    <div class="inner-wrap">
      <div class="row">
        <div class="col-md-8">
          <div class="listWrpService jobdetail">
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="listImg"><img src="<?=http://localhost/online-job-portal?>/company/images/company-img/<?=$company_info['ac_cmp_logo'];?>" alt="company logo"></div>
              </div>
              <div class="col-md-9 col-sm-9 col-xs-9">
                <h3><?=$jobpost_info['pi_job_title'];?></h3>
                <p></p>
                <ul class="featureInfo">
                  <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$jobpost_info['mi_job_location'];?></li>
                  <?php 
                      $date = DateTime::createFromFormat('Y-m-d', $jobpost_info['cjp_created_at']);
                      $deadline = DateTime::createFromFormat('Y-m-d', $jobpost_info['pi_apply_deadline']);
                    ?>
                  <li>
                    <i class="fa fa-calendar" aria-hidden="true"></i> <?=$date->format('d M Y');?> - <?=$deadline->format('d M Y');?>
                  </li>
                </ul>
                <div class="time-btn"><?=$jobpost_info['pi_employe_status'];?></div>
                <div class="click-btn"><a href="job-view.php?jp_id=<?=$jobpost_info['id'];?>">Apply Now</a></div>
              </div>
            </div>
            <h2>Discription</h2>
            <p> <?=$jobpost_info['mi_job_context'];?>. <br/>
              <br/>
              <?=$jobpost_info['mi_job_response'];?>.</p>
            <h2>Education Requirements</h2>
            <p><?=$jobpost_info['ci_degree'];?>.</p>
            <ul class="featureLinks">
              <li><?=$jobpost_info['ci_trade_course'];?></li>
              <li><?=$jobpost_info['ci_profess_certificate'];?></li>
            </ul>
            <h2>Specification</h2>
            <p>Working knowledge in having the following Skills in these tools and technologies</p>
            <ul class="featureLinks">
              <li><?=$jobpost_info['ci_area_exp_one'];?></li>
              <li><?=$jobpost_info['ci_area_exp_two'];?></li>
              <li><?=$jobpost_info['ci_skill_one'];?></li>
              <li><?=$jobpost_info['ci_skill_two'];?></li>
              <li><?=$jobpost_info['ci_skill_three'];?></li>
            </ul>
            <h2>Rewards and Benefits</h2>
            <ul class="featureLinks benefits">
              <?php 
                $benefits = $jobpost_info['mi_other_benefits_option'];
                $jp_benefits = explode(",",$benefits);

                foreach ($jp_benefits as $jp_benefit) {
                  ?>
                    <li> <?=$jp_benefit;?></li>
                  <?php
                }
              ?>
            </ul>
            <div class="clearfix"></div>
          </div>
        </div>

        <!-- =========== About Company ========== -->
        <div class="col-md-4">
          <div class="sidebarWrp listWrpService jobdetail">
            <h3>About Company</h3>
            <p><?=$company_info['ac_cmp_discription'];?></p>
            <div class="companyInfo">Industry</div>
            <p><?=$company_info['ac_cmp_category'];?></p>
            <div class="companyInfo">No. of Employees/Company Size</div>
            <p><?=$company_info['ac_cmp_size'];?></p>
            <div class="companyInfo">Location</div>
            <p><?=$company_info['ac_cmp_address'];?></p>
            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.30593401584!2d-74.25986539089548!3d40.69714941954754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY!5e0!3m2!1sen!2sus!4v1506615745397" width="100" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <form action="" method="POST">
              <div class="contactWrp">
                <h3>Apply With Form</h3>
                  <?php
                    if(isset($_SESSION['apply_job_status'])){
                    ?>
                        <div class="alert alert-success">
                        <?php
                            echo $_SESSION['apply_job_status'];
                            unset($_SESSION['apply_job_status']);
                        ?>
                        </div>
                    <?php
                    }
                  ?>
                  <?php
                    if(isset($_SESSION['already_apply_status'])){
                    ?>
                        <div class="alert alert-danger">
                        <?php
                            echo $_SESSION['already_apply_status'];
                            unset($_SESSION['already_apply_status']);
                        ?>
                        </div>
                    <?php
                    }
                  ?>
                  <div class="input-wrap">
                    <input type="text" name="name" placeholder="Name:" class="form-control" required>
                  </div>
                  <div class="input-wrap">
                    <input type="text" name="phone" placeholder="Phone No.:" class="form-control" required>
                  </div>
                  <div class="input-wrap">
                    <input type="email" name="email" placeholder="Your Email" class="form-control" required>
                  </div>
                  <div class="input-wrap">
                    <textarea class="form-control" name="message" placeholder="Type Your Message here.." required></textarea>
                  </div>
                  <div class="contact-btn">
                    <button class="sub" type="submit" name="submit"> Submit Now</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--Detail page end--> 
    
  </div>
</div>
<!--Inner Content end-->
<?php include('footer.php') ?>
