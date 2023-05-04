  <?php
include ('header.php');
  // Total users infomation 
  $select_query = "SELECT * FROM contact_info ORDER BY id DESC";
  $contact_info = mysqli_query($np2con, $select_query);

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
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"></i><strong> <?=$contact_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> Total Message</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6" >
            <div class="card" style="border:1px solid red;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:red;"></i><strong> <?=$contact_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> This Month Message</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid green;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:green;"></i><strong> <?=$contact_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> This Week Message</div>
               </div>
            </div>
         </div>
         <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
            <div class="card" style="border:1px solid orange;">
               <div class="card-body text-center">
                  <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline" style="color:orange;"></i><strong> <?=$contact_info->num_rows;?></strong></div>
                  <div class="text-muted mb-2"> Reaply Pending Message</div>
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
                           <h4 class="card-title">Total Message</h4>
                           <div class="row">
                              <div class="col-12 table-responsive">
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
                                 <table class="table">
								  <thead class="bg-light">
								    <tr>
								      <th>SI No</th>
								      <th>Name</th>
								      <th>Phone</th>
								      <th>Email</th>
								      <th>Message</th>
								      <th>Status</th>
								      <th>Activities</th>
								    </tr>
								  </thead>
								  <tbody>
								  	<?php
								  		$serial = 1;
								  		foreach($contact_info as $single_info){
							  			?>
							  			<tr>
							      		<th><?php echo $serial++ ;?></th>
							      		<td><?=$single_info['name'];?></td>
							      		<td><?=$single_info['phone'];?></td>
							      		<td><?=$single_info['email'];?></td>
							      		<td><?=$single_info['message'];?></td>
                                 <td>
                                    <label class="badge <?php echo ($single_info['reaply_status'] == "active" ? "badge-success" : "badge-danger")?> p-2"><?=$single_info['reaply_status'];?> </label>
                                 </td>
							      		<td class="text-center">
							      			<a href="" class="text-center btn btn-light mt-1"><i class="mdi mdi-eye text-primary"></i>Reaply</a><br>
                                    <a href="" class="text-center btn btn-light mt-1"><i class="mdi mdi-close text-danger"></i>Delete</a>
							      		</td>
								    	</tr>
							  			<?php
								  		}
								  	?>
								  </tbody>
								</table>

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