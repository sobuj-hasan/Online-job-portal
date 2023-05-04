<?php
include ('header.php');
  // Total Job Post infomation 
  $select_query = "SELECT * FROM company_jp";
  $jobpost_info = mysqli_query($np2con, $select_query);
  // pagination code start
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }

  $num_per_page = 10;
  $start_from = ($page - 1)*10;

  $select_query = "SELECT * FROM company_jp INNER JOIN job_category  on job_category.jb_id = company_jp.pi_job_category INNER JOIN all_company on company_jp.cjp_cmp_id = all_company.ac_id ORDER BY id DESC LIMIT $start_from,$num_per_page";
  $pagi_info = mysqli_query($np2con, $select_query);
  // pagination code End

?>
<body>
   <div class="container-scroller">
   <?php include ('nav.php');?>
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
   <div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="col-12 mb-4">
           <div class="card card-statistics">
             <div class="row">
               <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                 <div class="card-body">
                     <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                       <i class="mdi mdi-account text-primary mr-0 mr-sm-4 icon-lg"></i>
                       <div class="wrapper text-center text-sm-left">
                         <p class="card-text mb-0"><a href="total-users.php" style="text-decoration:none;">Total Post</a></p>
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
                       <i class="mdi mdi-store mr-1 text-primary mr-0 mr-sm-4 icon-lg"></i>
                       <div class="wrapper text-center text-sm-left">
                         <p class="card-text mb-0"><a href="total-shops.php" style="text-decoration:none;">Total Draft Post</a></p>
                         <div class="fluid-container">
                           <h3 class="card-title mb-0">00</h3>
                         </div>
                       </div>
                     </div>
                   </div>
               </div>
               <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
                 <div class="card-body">
                     <div class="d-flex align-items-center justify-content-center flex-column flex-sm-row">
                       <i class="mdi mdi-cart text-primary mr-0 mr-sm-4 icon-lg"></i>
                       <div class="wrapper text-center text-sm-left">
                         <p class="card-text mb-0"><a href="awaiting-payment.php" style="text-decoration:none;">This Month Post</a></p>
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
                       <i class="mdi mdi-cash-usd mr-0 mr-sm-4 icon-lg"></i>
                       <div class="wrapper text-center text-sm-left">
                         <p class="card-text mb-0">Featured Post</p>
                         <div class="fluid-container">
                           <h3 class="card-title mb-0">00</h3>
                         </div>
                       </div>
                     </div>
                   </div>
               </div>
             </div>
           </div>
         </div>

      </div>
      <!-- eBazar Left Side profile and menu -->
      <div class="row">
         <div class="grid-margin">
            <div style="margin-left: -4%; margin-right: 4%;" class="">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Job List</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search with Company name or Job title">
                          <span class="input-group-append">
                    
                            <button class="file-upload-browse btn btn-dark" type="button">Search</button>
                          </span>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <?php
                        if(isset($_SESSION['job_post_delete'])){
                        ?>
                          <div class="alert alert-danger">
                          <?php
                              echo $_SESSION['job_post_delete'];
                              unset($_SESSION['job_post_delete']);
                          ?>
                          </div>
                      <?php
                      }
                    ?>
                      <table id="order-listing" class="table">
                        <thead>
                          <tr class="bg-light">
                              <th>Company</th>
                              <th>Job Title</th>
                              <th>Vacancies</th>
                              <th>Employe Status</th>
                              <th>Apply Deadline</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                           <?php
                              foreach ($pagi_info as $single_job_info) {
                                 ?>
                                    <tr>
                                       <td><?= $single_job_info['ac_cmp_name'] ?></td>
                                       <td><?= $single_job_info['pi_job_title'] ?></td>
                                       <td><?= $single_job_info['pi_vacancie'] ?></td>
                                       <td><?= $single_job_info['pi_employe_status'] ?></td>
                                       <td>
                                        <?php
                                            $date = DateTime::createFromFormat('Y-m-d', $single_job_info['pi_apply_deadline']);
                                            echo $date->format('d M Y');
                                        ?>
                                       </td>
                                       <td>
                                         <label class="badge <?php echo ($single_job_info['cmp_jp_status'] == "active" ? "badge-success" : "badge-danger")?> p-2"><?= $single_job_info['cmp_jp_status'] ?> </label>
                                       </td>
                                       <td class="text-center">
                                         <a href="job-post-view.php?jp_id=<?= $single_job_info['id']?>" class="btn btn-light mb-1">&nbsp;<i class="mdi mdi-eye text-primary"></i> View&nbsp;&nbsp;&nbsp;</a><br>
                                         <a href="job-post-delete.php?jp_id=<?= $single_job_info['id']?>" class="btn btn-light"><i class="fa fa-times mt-1"></i>Remove</a>
                                       </td>
                                    </tr>
                                 <?php
                              }
                           ?>
                          
                        </tbody>
                      </table>
                      <!-- Pagination Code 2nd part start -->
                      <ul class="pagination mt-4">
                        <?php
                            $per_query = "SELECT * FROM company_jp";
                            $per_result = mysqli_query($np2con,$per_query);
                            $total_record = mysqli_num_rows($per_result);

                            $total_page = ceil($total_record/$num_per_page);

                            if ($page>1) {
                              ?>
                                <li class="page-item">
                                  <a class="page-link" href="job-management.php?page=<?=$page-1;?>"><i class="mdi mdi-chevron-left"></i></a>
                                </li>
                              <?php
                            }

                            for ($i=1; $i < $total_page ; $i++) { 

                              ?>
                                <li class="page-item <?php echo ($i == $page ? "active" : "") ?>">
                                  <a class="page-link" href="job-management.php?page=<?=$i;?>"><?=$i;?></a>
                                </li>
                              <?php
                            }

                            if ($i>$page) {
                              ?>
                                <li class="page-item">
                                  <a class="page-link" href="job-management.php?page=<?=$page+1;?>"><i class="mdi mdi-chevron-right"></i></a>
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
         </div>
      </div>
      <div class="row">
      </div>
  </div>
</div>
<?php include ('footer.php');?>