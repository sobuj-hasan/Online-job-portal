<?php
include ('header.php');
  // Total users infomation 
  $select_query = "SELECT * FROM users";
  $user_info = mysqli_query($np2con, $select_query);

  // pagination code start
  if(isset($_GET['page'])){
    $page = $_GET['page'];
  }
  else{
    $page = 1;
  }

  $num_per_page = 20;
  $start_from = ($page - 1)*20;

  $select_query = "SELECT * FROM users ORDER BY user_id DESC LIMIT $start_from,$num_per_page";
  $pagi_info = mysqli_query($np2con, $select_query);
  // pagination code End

?>
</head>
<body>
   <div class="container-scroller">
    <?php 
      include ('nav.php');
    ?>  
   <!-- partial -->
   <div class="container-fluid page-body-wrapper">
   <div class="main-panel">
   <div class="content-wrapper">
      <div class="row">
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid black;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"></i><strong> <?=$user_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> Total Users</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6" >
            <div class="card" style="border:1px solid red;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:red;"></i><strong> <?=$user_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> Last Month Users</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid green;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:green;"></i><strong> <?=$user_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> Last Week Users</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid orange;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline" style="color:orange;"></i><strong> 00</strong></div>
                  <div class="text-muted mb-2"> Suspended Users</div>
               </div>
            </div>
         </div>
      </div>
      <!-- eBazar Orders and menu -->
      <div class="container-fluid page-body-wrapper">
         <div class="main-panel">
            <div class="content-wrapper">
               <div class="row">
                  <div class="col-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="card-title">Total User</h4>
                           <div class="row grid-margin">
                              <div class="col-12">
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-12 table-responsive">
                                <form action="" method="POST">

                                  <?php
                                    if (isset($_POST['submit'])) {
                                      $user_name_or_phone = $_POST['user_name_or_phone'];
                                      $select_query = "SELECT * FROM `users` WHERE user_phone LIKE '$user_name_or_phone' OR user_first_name LIKE '$user_name_or_phone' OR user_last_name LIKE '$user_name_or_phone'";
                                      $user_info = mysqli_query($np2con, $select_query);
                                    }
                                  ?>
                                  <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search with User Phone Number" name="user_name_or_phone" required>
                                    <span class="input-group-append">
                                      <button type="submit" name="submit" class="file-upload-browse btn btn-dark" type="button">Search</button>
                                    </span>
                                  </div>

                                </form>
                                 <br>
                                 <?php
                                  if(isset($_SESSION['user_delete'])){
                                  ?>
                                    <div class="alert alert-danger">
                                      <?php
                                          echo $_SESSION['user_delete'];
                                          unset($_SESSION['user_delete']);
                                      ?>
                                    </div>
                                    <?php
                                    }
                                  ?>
                                 <table id="order-listing" class="table">
                                    <thead>
                                       <tr class="bg-light">
                                          <th>User Image</th>
                                          <th>User Name</th>
                                          <th>Phone Number</th>
                                          <th>Joining Date</th>
                                          <th>User City</th>
                                          <th>Activities</th>
                                       </tr>
                                    </thead>

                                    <?php
                                      foreach ($pagi_info as $user_single_info) {
                                        ?>
                                          <tbody>
                                            <tr>
                                              <td><img src="../dashboard/images/profile_image/<?=$user_single_info['user_photo']?>" alt="image"></td>
                                              <td><?=$user_single_info['user_first_name']?> <?=$user_single_info['user_last_name']?></td>
                                              <td><?=$user_single_info['user_phone']?></td>
                                              <td>
                                                  <?php 
                                                    $date = DateTime::createFromFormat('Y-m-d', $user_single_info['user_join_date']);
                                                    echo $date->format('d M Y');
                                                  ?>
                                              </td>
                                              <td><?=$user_single_info['user_city']?></td>
                                              <td class="text-center">
                                                <a href="user-view.php?user_id=<?=$user_single_info['user_id'];?>" class="btn btn-light mt-1"><i class="mdi mdi-eye text-primary ml-2"></i>View &nbsp;&nbsp;&nbsp;</a><br>
                                                <a href="user-delete.php?user_id=<?=$user_single_info['user_id'];?>" class="btn btn-light mt-1"><i class="mdi mdi-close text-danger"></i>Suspend</a>
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
                                      $per_query = "SELECT * FROM users";
                                      $per_result = mysqli_query($np2con,$per_query);
                                      $total_record = mysqli_num_rows($per_result);

                                      $total_page = ceil($total_record/$num_per_page);

                                      if ($page>1) {
                                        ?>
                                          <li class="page-item">
                                            <a class="page-link" href="total-users.php?page=<?=$page-1;?>"><i class="mdi mdi-chevron-left"></i></a>
                                          </li>
                                        <?php
                                      }

                                      for ($i=1; $i < $total_page ; $i++) { 

                                        ?>
                                          <li class="page-item <?php echo ($i == $page ? "active" : "") ?>">
                                            <a class="page-link" href="total-users.php?page=<?=$i;?>"><?=$i;?></a>
                                          </li>
                                        <?php
                                      }

                                      if ($i>$page) {
                                        ?>
                                          <li class="page-item">
                                            <a class="page-link" href="total-users.php?page=<?=$page+1;?>"><i class="mdi mdi-chevron-right"></i></a>
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
         </div>
         <!-- main-panel ends -->
      </div>
      <div class="row">
      </div>
   </div>
  </div>
</div>
<?php include ('footer.php');?>