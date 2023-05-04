<?php 
include ('header.php');
   
   // Total Company infomation 
   $select_query = "SELECT * FROM all_company";
   $company_info = mysqli_query($np2con, $select_query);
   
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
          include ('part1.php');
         ?>

      </div>
      <!-- eBazar Left Side profile and menu -->
      <div class="row">
         <div class="col-md-3 col-sm-6 grid-margin stretch-card">

            <?php 
               include ('set-menu.php');
            ?>

         </div>
         <div class="col-md-9 col-sm-6 grid-margin stretch-card">
            <div class="card">
               <div class="card-body pb-0">
                  <div class="wrapper border-bottom">
                     <h5 class="mb-0 text-gray">Payment Histroy</h5>
                     <h1 class="mb-0">00.00</h1>
                  </div>
                  <div class="pt-4 wrapper">
                     <h5 class="mb-0 text-gray">New Payment</h5>
                     <h1 class="mb-0">00.00</h1>
                  </div>
               </div>
               <canvas id="product-area-chart" height="200"></canvas>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
               <div class="card-body">
                  <h4 class="card-title">Recent Added Company</h4>
                  <table id="order-listing" class="table">
                     <thead>
                        <tr class="bg-light">
                           <th>Company logo</th>
                           <th>Company Name</th>
                           <th>Company Contact person</th>
                           <th>Established</th>
                           <th>Company Size</th>
                           <th>Company Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <?php
                        foreach ($company_info as $company_single_info) {
                           ?>
                           <tbody>
                              <tr>
                                 <td><img src="../company/images/company-img/<?=$company_single_info['ac_cmp_logo'];?>" alt="company-logo" class="rounded"></td>
                                 <td><a href="#"><?=$company_single_info['ac_cmp_name'];?></a></td>
                                 <td><?=$company_single_info['ac_cmp_phone'];?></td>
                                 <td><?=$company_single_info['ac_cmp_establish'];?></td>
                                 <td><?=$company_single_info['ac_cmp_size'];?></td>
                                 <td>
                                   <label class="badge <?php echo ($company_single_info['ac_cmp_status'] == "active" ? "badge-success" : "badge-danger")?>"><?=$company_single_info['ac_cmp_status'];?></label>
                                 </td>
                                 <td class="text-center">
                                    <a href="company-view.php?ac_id=<?=$company_single_info['ac_id'];?>" class="btn btn-light mb-1">&nbsp;&nbsp;&nbsp;<i class="mdi mdi-eye text-primary"></i>View &nbsp;&nbsp;&nbsp;</a><br>
                                    <a href="company-delete.php?ac_id=<?=$company_single_info['ac_id'];?>" class="btn btn-light"><i class="mdi text-danger"></i> <i class="fa fa-times"></i>Remove</a>
                                 </td>
                              </tr>
                           </tbody>
                           <?php
                        }
                     ?>
                     
                  </table>
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