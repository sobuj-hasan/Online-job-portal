<?php include ('header.php');?>
</head>
<body>
<div class="container-scroller">

<?php include ('nav.php');?>

    

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
		    <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
             <div class="card" style="border:1px solid black;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"></i><strong> 1015</strong></div> <div class="text-muted mb-2"> Total Users</div> </div> </div> 
          </div>
		  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6" >
             <div class="card" style="border:1px solid red;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:red;"></i><strong> 67</strong></div> <div class="text-muted mb-2"> Pending Users</div> </div> </div> 
          </div>
		  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
             <div class="card" style="border:1px solid green;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline text-pink"  style="color:green;"></i><strong> 67</strong></div> <div class="text-muted mb-2"> User This Week</div> </div> </div> 
          </div>
		  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
             <div class="card" style="border:1px solid orange;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-account-multiple-outline" style="color:orange;"></i><strong> 67</strong></div> <div class="text-muted mb-2"> Suspended Users</div> </div> </div> 
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
				<div class="input-group">
						              <input type="text" class="form-control" placeholder="Search with phone number, User Number">
                        <span class="input-group-append">
						
                          <button class="file-upload-browse btn btn-dark" type="button">Search</button>
                        </span>
						</div>
						<br>
                      <table id="order-listing" class="table">
                        <thead>
                          <tr class="bg-light">
                              <th>User Image</th>
                              <th>User Name</th>
                              <th>Phone Number</th>
                              <th>Joining Date</th>
                              <th>Ranking</th>
                              <th>Status</th>
                              <th>Activities</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td><img src="../images/team-img-3.jpg" alt="image"></td>
                              <td>Sadman Ahmed</td>
                              <td>01911686324</td>
                              <td>05.10.2019</td>
                              <td>Silver</td>
                              <td>
                                <label class="badge badge-success">Active</label>
                              </td>
                              <td class="text-center">
                                <button class="btn btn-light">
                                  <i class="mdi mdi-eye text-primary"></i>View
                                </button>
                               
                              </td>
                          </tr>

                        </tbody>
                      </table>
					  <ul class="pagination">
                      <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-left"></i></a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#"><i class="mdi mdi-chevron-right"></i></a></li>
                    </ul>
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
       
<?php include ('footer.php');?>