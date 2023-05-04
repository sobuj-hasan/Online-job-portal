<?php 
include ('header.php');

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
         // include ('part1.php');
         ?>
   </div>
   <!-- eBazar Left Side profile and menu -->
    <div class="row mt-5">
      <div class="col-md-6 mt-2 grid-margin m-auto">
        <div class="">
            <div class="">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Change Password</h4>
                    <form>
                        <div class="form-group">
                          <br>
                          <label for="exampleInputName1">Old Password</label>
                          <input type="password" class="form-control" id="exampleInputName1" placeholder="Old Password" name="old_password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">New Password</label>
                          <input type="password" class="form-control" id="exampleInputEmail3" placeholder="New Password" name="new_password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">Confirm Password</label>
                          <input type="Password" class="form-control" id="exampleInputEmail3" placeholder="Confirm Password" name="confirm_password">
                        </div>
                        <div class="mt-4">
                          <button type="submit" class="btn btn-info mr-2">Update</button>
                          <button class="btn btn-light">Cancel</button>
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
  </div>
</div>
<?php include ('footer.php');?>


