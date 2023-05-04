

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
          <div class="col-md-3 col-sm-6 grid-margin">
						
							<?php include ('set-menu.php');?>
						</div>
						
						<!-- order section -->
          <div class="col-md-9 grid-margin">
           
		 
              <div class="">
                <div class="">
                   <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Information</h4>
                  <div class="card text-center">
								<div class="">
									<img src="http://www.bay-coders.com/wp-content/uploads/2019/02/ovi-sheikh.jpg" class="img-lg rounded mb-2 mt-4" alt="profile image">
									<h4>Ovi Sheikh</h4>
								</div>
								<div class="border-top pt-3">
										<div class="row">
											<div class="col-4">
												<h6>ovi81</h6>
												<p>UserID</p>
											</div>
											<div class="col-4">
												<h6>S.M.Rashedul Alam Ovi</h6>
												<p>ovi0088@gmail.com</p>
											</div>
											<div class="col-4">
												<h6>Khulna</h6>
												<p>01911686324</p>
											</div>
											
										</div>
										<div>
									
				  </div>
									</div>
					
							</div>
                  <form class="forms-sample">
                    <div class="form-group">
					<br>
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
                    </div>
                   
                    <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled="" placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputCity1">City</label>
                      <input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
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