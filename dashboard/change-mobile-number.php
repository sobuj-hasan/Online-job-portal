

<?php include ('header.php');?>

<body>
  <div class="container-scroller">

<?php include ('nav.php');?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <?php include ('part1.php');?>
            
          </div>
		  
		  <!-- eBazar Left Side profile and menu -->
          <div class="row">
          <div class="col-md-3 col-sm-6">
						
							<?php include ('set-menu.php');?>
						</div>
						
						<!-- order section -->
          <div class="col-md-9">
           
		 
              <div class="">
                <div class="">
                   <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Change Your Mobile Number</h4>
                  <div class="card text-center">
								
								<div class="border-top pt-3">
										<div class="row">
											<div class="col-2">
												<h6></h6>
												<p></p>
											</div>
											<div class="col-8">
												<h6>Current Mobile Number</h6>
												<p>01911686324 <span class="badge badge-pill badge-success">Verified</span></p>
											</div>
											<div class="col-2">
												<h6></h6>
												<p></p>
											</div>
											
										</div>
										<div>
									
				  </div>
									</div>
					
							</div>
                  <form class="forms-sample">
                  
					   <div class="form-group">
					   <br>
                      <label>New Mobile Number</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" placeholder="Put your mobile number">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Send OTP</button>
                        </span>
                      </div>
                    </div>
					
                    <div class="form-group">
                      <label for="exampleInputCity1">Check Your Mobile Message & Put OTP Code</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="OTP Code">
                    </div>
					
					
                  
                    <button type="submit" class="btn btn-info mr-2">Update</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
				  
				  
                </div>
              </div>
                </div>
              </div>
     
		   
            </div>    
          </div>
         
          
          <div class="row">
           
          </div>
        </div>
       
<?php include ('footer.php');?>