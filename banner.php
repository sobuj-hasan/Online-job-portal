<?php
// Rendom number for Total CV, Job sekker, Job post, Live job
  $now = time(); // or your date as well
  $your_date = strtotime("2021-01-15");
  $datediff = $now - $your_date;
  $dd =  round($datediff / (60 * 60 * 24));

  $renge_cv = $dd*50+date('H');
  $job_sekker = $dd*80+date('H');
  $total_job = $dd*10+date('H');
  $live_job = $dd*5+date('H');
?>
<style>    
.fs{font-size:28px; text-align:center; color:#14f314; font-weight: 600;}
    .cs-t {color:#effdfd; font-size:39px; font-weight: 500; font-family: 'adornoirrit', sans-serif !important;}
</style>
<div class="slider-wrap">
  <div class="container">
    <div class="sliderTxt">
   <!--   <p>FIND YOUR WISH IN A MINUTE</p> -->
        <div class="row icon-main mt-5">
            <div class="col-md-2 col-sm-6 col-xs-0 fs">
             
            </div>
            <?php
              // Total job seeker count query
              $select_query = "SELECT * FROM users ";
              $user_info = mysqli_query($np2con, $select_query);
            ?>
             <div class="col-md-2 col-sm-6 col-xs-6 fs">
                <span class="fs" aria-hidden="true"><?php echo $user_info->num_rows + $job_sekker . " +"; ?></span>
                <h6 class="mt-3 font-weight-bold cs-t">Job Seeker</h6>
            </div>
            
            <?php
              // Total CV count query
              $select_query = "SELECT * FROM user_cv ";
              $cv_info = mysqli_query($np2con, $select_query);
            ?>
           <div class="col-md-2 col-sm-6 col-xs-6 fs">
                <span class="fs" aria-hidden="true"><?php echo $cv_info->num_rows + $renge_cv; ?></span>
                <h6 class="mt-3 font-weight-bold cs-t">Total CV</h6>
            </div>
            
            <?php
              // Total job post count query
              $select_query = "SELECT * FROM company_jp ";
              $cjp_info = mysqli_query($np2con, $select_query);
            ?>
             <div class="col-md-2 col-sm-6 col-xs-6 fs">
                <span class="fs" aria-hidden="true"><?php echo $cjp_info->num_rows + $total_job; ?></span>
                <h6 class="mt-3 font-weight-bold cs-t">Job Post</h6>
            </div>
              <div class="col-md-2 col-sm-6 col-xs-6 fs">
                <span class="fs" aria-hidden="true"> <?php echo $cjp_info->num_rows + $live_job; ?> </span>
                <h6 class="mt-3 font-weight-bold cs-t">Live Job</h6>
            </div>
              <div class="col-md-2 col-sm-6 col-xs-0 fs">
            
            </div>
            
        </div>
   <br>
      <div class="form-wrap">
        <!-- Search bar dynamic -->
        <?php
          if(isset($_POST['submit'])){
            $cmp_name_job_title = $_POST['cmp_name_job_title'];
            $city_name = $_POST['city_name'];
            $job_category = $_POST['job_category'];

            $select_query = "SELECT * FROM `company_jp` INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id WHERE ac_cmp_name LIKE '%$cmp_name_job_title%' OR pi_job_title LIKE '%$cmp_name_job_title%' OR mi_job_location LIKE '$city_name' OR pi_job_category LIKE '$job_category'";
            $resultus = mysqli_query($np2con, $select_query);
          }

        ?>
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-4">
              <div class="input-group">
                <input type="text" placeholder="Job title or Company name" class="form-control" name="cmp_name_job_title">
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <select class="form-control" class="dropdown" name="city_name">
                  <option value="">Select Divission</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Khulna">Khulna</option>
                  <option value="Barishal">Barishal</option>
                  <option value="Chittagong">Chittagong</option>
                  <option value="Mymenshingh">Mymenshingh</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Rangpur">Rangpur</option>
                  <option value="Sylhet">Sylhet</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <select class="form-control" name="job_category">
                    <option value="">Select Category </option>
                  <?php
                    // Category select query from database
                    $select_query = "SELECT * FROM job_category ";
                    $categories = mysqli_query($np2con, $select_query);
                    foreach ($categories as $category) {
                      ?>
                        <option value="<?=$category['jb_id']?>"><?=$category['jb_cat_name']?> </option>
                      <?php
                    }
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="input-btn">
                <button type="submit" name="submit" class="sbutn">Search</button>
              </div>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
