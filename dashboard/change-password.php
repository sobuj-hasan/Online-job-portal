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
      <?php
         // include ('part1.php');
         ?>
   </div>
   <!-- eBazar Left Side profile and menu -->
    <div class="row">
      <div class="col-md-3 col-sm-6 mt-4 grid-margin stretch-card">	
         <?php include ('set-menu.php');?>
      </div>
      <div class="col-md-9 mt-4 grid-margin">
        <div class="">
            <div class="">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Change Your Password</h4>
                    <form class="forms-sample">
                        <div class="form-group">
                          <br>
                          <label for="exampleInputName1">Old Password</label>
                          <input type="password" class="form-control" id="exampleInputName1" placeholder="Old Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">New Password</label>
                          <input type="password" class="form-control" id="exampleInputEmail3" placeholder="New Password">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail3">Confirm Password</label>
                          <input type="Password" class="form-control" id="exampleInputEmail3" placeholder="Confirm Password">
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
  </div>
</div>
<?php include ('footer.php');?>


