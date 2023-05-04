<?php
include ('header.php');
  // Total Company infomation
  $select_query = "SELECT * FROM all_company";
  $company_info = mysqli_query($np2con, $select_query);
  // Pending Company
  $select_query = "SELECT * FROM all_company WHERE ac_cmp_status = 'pending'";
  $pending = mysqli_query($np2con, $select_query);
  
  // pagination code start
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }

  $num_per_page = 04;
  $start_from = ($page - 1)*4;

  $select_query = "SELECT * FROM all_company ORDER BY ac_id DESC LIMIT $start_from,$num_per_page";
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
                         <p class="card-text mb-0"><a href="total-users.php" style="text-decoration:none;">Enrolled Company</a></p>
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
                       <i class="mdi mdi-store mr-1 text-primary mr-0 mr-sm-4 icon-lg"></i>
                       <div class="wrapper text-center text-sm-left">
                         <p class="card-text mb-0"><a href="pending-company.php" style="text-decoration:none;">Approval Pending</a></p>
                         <div class="fluid-container">
                           <h3 class="card-title mb-0"><?=$pending->num_rows;?></h3>
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
                         <p class="card-text mb-0"><a href="awaiting-payment.php" style="text-decoration:none;">Last Month Enrolled</a></p>
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
                       <i class="mdi mdi-cash-usd mr-0 mr-sm-4 icon-lg"></i>
                       <div class="wrapper text-center text-sm-left">
                         <p class="card-text mb-0">Recomand Company</p>
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
            <div class="col-md-12 m-auto">
              <div class="card">
                <div class="card-body">
                  <form action="" method="POST">
                    <h4 class="card-title">Total Company List</h4>
                    <div class="row grid-margin">
                      <div class="col-12">
                      <form action="" method="POST">
                        <?php
                          if (isset($_POST['submit'])) {
                            $search_value = $_POST['search_value'];
                            $select_query = "SELECT * FROM `all_company` WHERE ac_cmp_name LIKE '$search_value' OR ac_cmp_phone LIKE '$search_value'";
                            $company_info = mysqli_query($np2con, $select_query);
                          }
                        ?>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search with Company" name="search_value" required>
                          <span class="input-group-append">
                            <button type="submit" name="submit" class="file-upload-browse btn btn-dark" type="button">Search</button>
                          </span>
                        </div>
                      </form>
                      <?php
                        if(isset($_SESSION['company_delete'])){
                        ?>
                          <div class="alert alert-danger mt-2">
                            <?php
                                echo $_SESSION['company_delete'];
                                unset($_SESSION['company_delete']);
                            ?>
                          </div>
                          <?php
                          }
                        ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table id="order-listing" class="table">
                          <thead>
                            <tr class="bg-light">
                               <th>Company logo</th>
                               <th>Company Name</th>
                               <th>Contact person</th>
                               <th>Established</th>
                               <th>Company Size</th>
                               <th>Company Status</th>
                               <th>Action</th>
                            </tr>
                          </thead>
                          <?php
                            foreach ($pagi_info as $company_single_info) {
                               ?>
                               <tbody>
                                  <tr>
                                     <td><img src="../company/images/company-img/<?=$company_single_info['ac_cmp_logo'];?>" alt="company-logo" class="rounded"></td>
                                     <td><a href="#"><?=$company_single_info['ac_cmp_name'];?></a></td>
                                     <td><?=$company_single_info['ac_cmp_phone'];?></td>
                                     <td><?=$company_single_info['ac_cmp_establish'];?></td>
                                     <td><?=$company_single_info['ac_cmp_size'];?></td>
                                     <td>
                                       <label class="badge <?php echo ($company_single_info['ac_cmp_status'] == "active" ? "badge-success" : "badge-danger")?> p-2"><?=$company_single_info['ac_cmp_status'];?> </label>
                                     </td>
                                     <td class="text-center">
                                       <a href="company-view.php?ac_id=<?=$company_single_info['ac_id'];?>" class="btn btn-light mb-1">&nbsp;&nbsp;<i class="mdi mdi-eye text-primary"></i>View &nbsp;&nbsp;&nbsp;</a><br>
                                       <a href="company-delete.php?ac_id=<?=$company_single_info['ac_id'];?>" class="btn btn-light"><i class="mdi text-danger"></i><i class="fa fa-times"></i>Remove</a>
                                     </td>
                                  </tr>
                               </tbody>
                               <?php
                            }
                          ?>
                        </table>

                        <!-- Pagination Code 2nd part start -->
                        <ul class="pagination mt-4">
                            <?php
                              $per_query = "SELECT * FROM all_company";
                              $per_result = mysqli_query($np2con,$per_query);
                              $total_record = mysqli_num_rows($per_result);

                              $total_page = ceil($total_record/$num_per_page);

                              if ($page>1) {
                                ?>
                                  <li class="page-item">
                                    <a class="page-link" href="company-management.php?page=<?=$page-1;?>"><i class="mdi mdi-chevron-left"></i></a>
                                  </li>
                                <?php
                              }

                              for ($i=1; $i < $total_page ; $i++) { 

                                ?>
                                  <li class="page-item <?php echo ($i == $page ? "active" : "") ?>">
                                    <a class="page-link" href="company-management.php?page=<?=$i;?>"><?=$i;?></a>
                                  </li>
                                <?php
                              }

                              if ($i>$page) {
                                ?>
                                  <li class="page-item">
                                    <a class="page-link" href="company-management.php?page=<?=$page+1;?>"><i class="mdi mdi-chevron-right"></i></a>
                                  </li>
                                <?php
                              }

                            ?>
                        </ul>
                        <!-- Pagination Code 2nd part End -->
                        
                      </div>
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