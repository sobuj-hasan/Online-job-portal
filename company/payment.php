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
             <div class="card" style="border:1px solid black;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-cash-usd text-pink"></i><strong> 10,015.00</strong></div> <div class="text-muted mb-2"> Total Payment</div> </div> </div> 
          </div>
		  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6" >
             <div class="card" style="border:1px solid red;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-account-box text-pink"  style="color:red;"></i><strong> 67</strong></div> <div class="text-muted mb-2"> Pending Payment Users</div> </div> </div> 
          </div>
		  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
             <div class="card" style="border:1px solid green;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-cash-usd text-pink"  style="color:green;"></i><strong> 50001.00</strong></div> <div class="text-muted mb-2"> Total Awaiting Payment</div> </div> </div> 
          </div>
		  <div class="card-col col-xl-3 col-lg-3 col-md-3 col-6">
             <div class="card" style="border:1px solid orange;"> <div class="card-body text-center"> <div class="h3 m-0"><i class="mdi mdi-cash-usd" style="color:orange;"></i><strong> 11</strong></div> <div class="text-muted mb-2">Payment Hold</div> </div> </div> 
          </div>
          </div>
		  
		  <!-- eBazar Orders and menu -->
          
          <div class="container-fluid page-body-wrapper">
      <div class="">
        <div class="content-wrapper">
          <div class="row mb-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Awaiting Payment</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr class="bg-light">
                              <th>Shop ID</th>
                              <th>Shop Name</th>
                              <th>Pay TO</th>
                              <th>Pay Amount</th>
                              <th>Payment Date</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>eb61</td>
                              <td>Ruchita Fashin House</td>
                              <td><button class="btn btn-outline-info" onclick="showSwal('basic')">Details</button></td>
                              <td>BDT 575</td>
                              <td>05.10.2019</td>
                              <td>
                                <label class="badge badge-outline-danger">Awaiting</label>
								
                              </td>
                              <td class="text-center">
                                <button class="btn btn-outline-info" onclick="showSwal('basic')">Pay Now</button>
								<button class="btn btn-info" onclick="showSwal('basic')">
                                  <i class="mdi mdi-account-card-details"></i>
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
       
    <div class="row mb-4">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Payment Hold</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr class="bg-light">
                              <th>Shop ID</th>
                              <th>Shop Name</th>
                              <th>Pay To</th>
                              <th>Payment Amount</th>
                              <th>Payment Date</th>
                              <th>Status</th>
                              <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>eb61</td>
                              <td>Afsana Makeup World</td>
                              <td><button class="btn btn-outline-info" onclick="showSwal('basic')">Details</button></td>
                              <td>575</td>
                              <td>05.10.2019</td>
                              <td>
                                <label class="badge badge-outline-danger">Hold</label>
								
                              </td>
                              <td class="text-center">
                                <button class="btn btn-info">
                                  <i class="mdi mdi-cash-usd"></i>Unhold
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
         <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Total Payment</h4>
                  <div class="row grid-margin">
                    <div class="col-12">
                      
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 table-responsive">
                      <table id="order-listing" class="table">
                        <thead>
                          <tr class="bg-light">
                              <th>Shop ID</th>
                              <th>Shop Name</th>
                              <th>Pay To</th>
                              <th>Payment Amount</th>
                              <th>Payment Date</th>
                              <th>Status</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                              <td>eb61</td>
                              <td>Ruchita Fashin House</td>
                              <td>
							
                        <button class="btn btn-outline-info" onclick="showSwal('basic')">Details</button></td>
                              <td>BDT 575</td>
                              <td>05.10.2019</td>
                              <td>
                                <label class="badge badge-outline-success">Completed</label>
								
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