

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
          <div class="col-md-9 grid-margin">
           
		 
              <div class="">
                <div class="">
                   <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Submit Report</h4>
                  <p class="card-description">
                   যেকোনো ধরনের পরামর্শ বা বাজে অভিজ্ঞতা হলে আমাদের সার্ভিস বা অন্য  কোন কারনে তাহলে এই ফর্ম এর মাধ্যমে জানাতে পারেন । ধন্যবাদ 
                  </p>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="exampleInputName1">Subject</label>
                      <input type="text" class="form-control" id="exampleInputName1" placeholder="Subject">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Contact Number</label>
                      <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Contact Number">
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
                      <label for="exampleTextarea1">Description</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>
                    <button type="submit" class="file-upload-browse btn btn-info mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
			  
			  <br>
			  <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Report status</h4>
				
                            <i class="card-icon mdi mdi-message-text-outline"></i> How can I deactivate my account?
                       
                  <p class="card-description">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley not only five centuries, 
                  </p>
                
				<div class="wrapper d-flex align-items-center py-2 border-bottom">
										<img class="img-sm rounded-circle" src="https://img.icons8.com/cotton/64/000000/online-support.png" alt="profile">
										<div class="wrapper ml-3">
											<h6 class="ml-1 mb-1">eBazar Support Manager</h6>
											<small class="text-muted mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley not only five centuries, Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley not only five centuries, </small>
										</div>
										<div class="badge badge-outline-primary ml-3">Solved</div>
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
       
<?php include ('footer.php');?>