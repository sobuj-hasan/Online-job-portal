<?php 
include ('header.php');
  // pagination code start
   if(isset($_GET['page'])){
    $page = $_GET['page'];
   }
   else{
    $page = 1;
   }

   $num_per_page = 10;
   $start_from = ($page - 1)*10;

   $select_query = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company  on all_company.ac_id = company_jp.cjp_cmp_id WHERE cmp_jp_status = 'active' ORDER BY id DESC LIMIT $start_from,$num_per_page";
   $pagi_info = mysqli_query($np2con, $select_query);
   // pagination code End
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
      <div class="col-md-3 col-sm-6 mt-4 grid-margin stretch-card">  	
         <?php include ('set-menu.php');?>
      </div>
      <div class="col-md-9 col-sm-12 grid-margin stretch-card">
         
        <!--Inner Content start-->
        <div class="inner-content listing">
          <div class="container">
              <!--Job Listing Start-->
              <div class="row">

                <div class="col-md-12 col-sm-12">
                    <div class="sortbybar">
                      <div class="sortbar listingSearch">
                          <div class="form-wrap">
                            <form>
                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="input-group">
                                        <input type="text" name=" job title" placeholder="Job title, skills, or company" class="form-control">
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="input-group">
                                        <select name="location" class="form-control">
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
                                        <select name="category" class="form-control">
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
                                        <input type="submit" class="sbutn" value="Search">
                                      </div>
                                  </div>
                                </div>
                            </form>
                          </div>
                      </div>
                    </div>
                    <ul class="listService">
                      <?php
                        foreach ($pagi_info as $cjp_single_info) {
                          ?>
                            <li>
                              <div class="listWrpService featured-wrap">
                                <div class="row">
                                    <div class="col-md-2 col-sm-3 col-xs-3">
                                      <div class="listImg"><img src="#" alt="company logo"></div>
                                    </div>
                                    <div class="col-md-10 col-sm-9 col-xs-9">
                                      <div class="row">
                                          <div class="col-md-9">
                                              <h3><a href="job-details.php?jp_id=<?=$cjp_single_info['id']?>"><?=$cjp_single_info['pi_job_title']?></a></h3>
                                            <p><a href="category-wise-job.php?cat_id=<?=$cjp_single_info['pi_job_category']?>"><?=$cjp_single_info['jb_cat_name']?></a></p>
                                            <ul class="featureInfo innerfeat">
                                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?=$cjp_single_info['mi_job_location']?></li>
                                                <?php 
                                                  $date = DateTime::createFromFormat('Y-m-d', $cjp_single_info['cjp_created_at']);
                                                  $deadline = DateTime::createFromFormat('Y-m-d', $cjp_single_info['pi_apply_deadline']);
                                                ?>
                                                <li>
                                                    <i class="fa fa-calendar" aria-hidden="true"></i> <?=$date->format('d M Y');?> - <?=$deadline->format('d M Y');?>
                                                </li>
                                                <li><?=$cjp_single_info['pi_employe_status']?></li>
                                            </ul>
                                            <p class="para">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ultricies dictum ex, nec ullamcorper orci luctus eget. Integer mauris arcu, pretium eget elit vel, posuere consectetur massa.</p>
                                          </div>
                                          <div class="col-md-3">
                                            <div class="click-btn apply"><a href="job-view.php?jp_id=<?=$cjp_single_info['id']?>">Apply Now</a></div>
                                          </div>
                                      </div>
                                    </div>
                                </div>
                              </div>
                            </li>
                          <?php
                        }
                      ?>
                    </ul>
                    <div class="pagiWrap">
                      <div class="row">
                          <div class="col-md-4 col-sm-4">
                            
                          </div>
                          <div class="col-md-8 col-sm-8">
                            <!-- Pagination Code 2nd part start -->
                             <ul class="pagination mt-4">
                                <?php
                                  $per_query = "SELECT * FROM company_jp WHERE cmp_jp_status = 'active'";
                                  $per_result = mysqli_query($np2con,$per_query);
                                  $total_record = mysqli_num_rows($per_result);

                                  $total_page = ceil($total_record/$num_per_page);

                                  if ($page>1) {
                                    ?>
                                      <li class="">
                                        <a class="page-link" href="dashboard/?page=<?=$page-1;?>"><i class="fa fa-chevron-left"></i></a>
                                      </li>
                                    <?php
                                  }

                                  for ($i=1; $i < $total_page ; $i++) { 

                                    ?>
                                      <li class="<?php echo ($i == $page ? "active" : "") ?>">
                                        <a class="page-link" href="dashboard/?page=<?=$i;?>"><?=$i;?></a>
                                      </li>
                                    <?php
                                  }

                                  if ($i>$page) {
                                    ?>
                                      <li class="">
                                        <a class="page-link" href="dashboard/?page=<?=$page+1;?>"><i class="fa fa-chevron-right"></i></a>
                                      </li>
                                    <?php
                                  }

                                ?>
                            </ul>
                            <!-- Pagination Code 2nd part End -->
                          </div>
                      </div>
                    </div>
                </div>
              </div>
              <!--Job Listing End--> 
          </div>
        </div>
        <!--Inner Content End-->

        <div class="row">
        </div>
      </div>
    </div>
  </div>
</div>
<?php include ('footer.php');?>