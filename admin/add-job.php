
<?php include ('header.php');?>


<body>
  <div class="container-scroller">

<?php include ('nav.php');?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="main-panel">
        <div class="content-wrapper">
          
		  
		  <!-- eBazar Left Side profile and menu -->
          <div class="row">
		   <div class="col-md-3 col-sm-6 grid-margin">
         <?php include ('set-menu.php');?>
						</div>
						<!-- order section -->
          <div class="col-md-9 grid-margin">
            <div class="card">
      <div class="card-body">
                 
                  <div class="tab-content tab-content-solid">
                    <div class="tab-pane fade show active" id="home-5-1" role="tabpanel" aria-labelledby="tab-5-1">
                 <form class="form-sample">
                   
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                         
                          <div class="col-sm-12">
						  <span>Write Job Title</span>
                            <input type="text" class="form-control">
                          </div>
                        </div>
                      </div>
                   
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                         
                          <div class="col-sm-12">
						  <span>Job Category</span>
                            <select class="form-control">
                              <option>Car</option>
                              <option>Bike</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                         
                          <div class="col-sm-12">
                             <span>Type</span>
                            <select class="form-control">
                              <option>None</option>
                              <option>Featured</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                         
                          <div class="col-sm-12">
						  <span>Job Category</span>
                            <select class="form-control">
                              <option>Car</option>
                              <option>Bike</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                         
                          <div class="col-sm-12">
                             <span>Job Sub Category</span>
                            <select class="form-control">
                              <option>Fzs</option>
                              <option>BMW</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                       
                          <div class="col-sm-12">
						  <span>Job Description</span>
                         <div class="input-group">
						             <textarea rows="20" class="form-control"></textarea>
						</div>
                          </div>
                        </div>
                      </div>
               
                    </div>
                  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                       
                          <div class="col-sm-12">
						  <span>Job Tags</span>
                         <div class="input-group">
						              <input type="text" class="form-control" placeholder="">
                        <span class="input-group-append">
						
                          <button class="file-upload-browse btn btn-dark" type="button">Add</button>
                        </span>
						</div>
                          </div>
                        </div>
                      </div>
               
                    </div>
                 
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                       
                          <div class="col-sm-12">
						  <span></span>
                         <div class="input-group">
						              <input type="text" class="form-control" placeholder="">
                        <span class="input-group-append">
						
                          <button class="file-upload-browse btn btn-dark" type="button">Add Feature Image</button>
                        </span>
						</div>
                          </div>
                        </div>
                      </div>
               
                    </div>
                  
                    <div class="row">
                      <div class="col-md-6">
                       <span class="input-group-append">
                          <button class="btn btn-success btn-block" type="button">Draft</button>
                        </span>
                      </div>
                        <div class="col-md-6">
                       <span class="input-group-append">
                          <button class="btn btn-info btn-block" type="button">Publish</button>
                        </span>
                      </div>
                    </div>
              
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