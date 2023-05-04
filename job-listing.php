<?php 
include('header.php');
$page = "joblisting";

   // pagination code start
   if(isset($_GET['page'])){
    $page = $_GET['page'];
   }
   else{
    $page = 1;
   }

   $num_per_page = 02;
   $start_from = ($page - 1)*2;

   $select_query = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company  on all_company.ac_id = company_jp.cjp_cmp_id WHERE cmp_jp_status = 'active' ORDER BY id DESC LIMIT $start_from,$num_per_page";
   $pagi_info = mysqli_query($np2con, $select_query);
   // pagination code End
?>

<!--inner heading start-->
<div class="inner-heading">
   <div class="container">
      <h3>Job Listing</h3>
   </div>
</div>
<!--inner heading end--> 
<!--Inner Content start-->
<div class="inner-content listing">
   <div class="container">
      <!--Job Listing Start-->
      <div class="row">
         <div class="col-md-3 col-sm-4">
            <div class="leftSidebar">
               <div class="filter">Search Listings</div>
               <div class="sidebarpad">
                  <form>
                     <h4>Job Search</h4>
                     <div class="input-wrap">
                        <input type="text" name="job search" placeholder="Job title or Compnay name:" class="form-control">
                     </div>
                     <h4>Categories</h4>
                     <div class="input-wrap">
                        <select name="category" class="form-control">
                           <option>Select category </option>
                           <?php
                              $select = "SELECT * FROM job_category";
                              $resultus = mysqli_query($np2con, $select);

                              foreach ($resultus as $result) {
                                 ?>
                                 <option value="<?=$result['jb_id']?>"><?=$result['jb_cat_name']?></option>
                                 <?php
                              }
                           ?>
                        </select>
                     </div>
                     <h4>City</h4>
                     <div class="input-wrap">
                        <select name="city" class="form-control">
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
                     <h4>Salary Range</h4>
                     <div class="input-wrap">
                        <ul class="check">
                           <li>
                              <input type="checkbox" value="Almost Like New" name="price" id="price">
                              <label for="price">৳8000 to ৳10000<span>23</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="price" id="price2">
                              <label for="price2">৳10000 to ৳15000<span>34</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="price" id="price3">
                              <label for="price3">৳15000 to ৳20000<span>21</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="price" id="price4">
                              <label for="price4">৳20000 to ৳30000<span>12</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="price" id="price5">
                              <label for="price5">৳30000 to ৳50000<span>05</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="price" id="price5">
                              <label for="price5">৳50000 to ৳100000<span>02</span></label>
                           </li>
                        </ul>
                     </div>
                     <h4>Contract</h4>
                     <div class="input-wrap">
                        <ul class="check">
                           <li>
                              <input type="checkbox" value="Almost Like New" name="contract" id="contract2">
                              <label for="contract2">Full Time<span>241</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="contract" id="contract3">
                              <label for="contract3">Part Time<span>159</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="contract" id="contract4">
                              <label for="contract4">Intership<span>172</span></label>
                           </li>
                           <li>
                              <input type="checkbox" value="Almost Like New" name="contract" id="contract5">
                              <label for="contract5">Freelance<span>322</span></label>
                           </li>
                        </ul>
                     </div>
                     <div class="sub-btn">
                        <input type="submit" name="submit" class="sbutn" value="Search Filter">
                     </div>
                  </form>
                  <div class="ad"><img width="220px" height="600px" src="images/ad-6.png"></div>
               </div>
            </div>
         </div>
         <div class="col-md-9 col-sm-8">
            <div class="sortbybar">
               <div class="sortbar listingSearch">
                  <div class="form-wrap">
                     <!-- Search bar dynamic -->
                        <?php
                           if(isset($_POST['submit'])){
                           $cmp_name_job_title = $_POST['cmp_name_job_title'];
                           $city_name = $_POST['city_name'];
                           $job_category = $_POST['job_category'];

                           $select_query = "SELECT * FROM `company_jp` INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id WHERE ac_cmp_name LIKE '%$cmp_name_job_title%' OR pi_job_title LIKE '%$cmp_name_job_title%' OR mi_job_location LIKE '%$city_name%' OR pi_job_category LIKE '$job_category'";
                           $pagi_info = mysqli_query($np2con, $select_query);

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
            <ul class="listService">
               <?php

                  foreach ($pagi_info as $cjp_single_info) {
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
                                              $date = DateTime::createFromFormat('Y-m-d', $cjp_single_info['cjp_created_at']);
                                              $deadline = DateTime::createFromFormat('Y-m-d', $cjp_single_info['pi_apply_deadline']);
                                            ?>
                                          <li>
                                            <i class="fa fa-calendar" aria-hidden="true"></i> <?=$date->format('d M Y');?> - <?=$deadline->format('d M Y');?>
                                          </li>
                                          <li><?=$cjp_single_info['pi_employe_status']?></li>
                                       </ul>
                                       <p class="para"><?=$cjp_single_info['pi_instraction_job_seeker']?></p>
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
                     <div class="showreslt">Showing 1-10</div>
                  </div>
                  <div class="col-md-8 col-sm-8">
                     <!-- Pagination Code 2nd part start -->
                     <ul class="pagination mt-4">
                        <?php
                          $per_query = "SELECT * FROM company_jp";
                          $per_result = mysqli_query($np2con,$per_query);
                          $total_record = mysqli_num_rows($per_result);

                          $total_page = ceil($total_record/$num_per_page);

                          if ($page>1) {
                            ?>
                              <li class="">
                                <a class="page-link" href="job-listing.php?page=<?=$page-1;?>"><i class="fa fa-chevron-left"></i></a>
                              </li>
                            <?php
                          }

                          for ($i=1; $i < $total_page ; $i++) { 

                            ?>
                              <li class="<?php echo ($i == $page ? "active" : "") ?>">
                                <a class="page-link" href="job-listing.php?page=<?=$i;?>"><?=$i;?></a>
                              </li>
                            <?php
                          }

                          if ($i>$page) {
                            ?>
                              <li class="">
                                <a class="page-link" href="job-listing.php?page=<?=$page+1;?>"><i class="fa fa-chevron-right"></i></a>
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
<?php include('footer.php') ?>
