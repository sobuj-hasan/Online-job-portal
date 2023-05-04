<?php
    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

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
    <div class="row">
      <div class="col-md-3 col-sm-6 mt-4 grid-margin stretch-card">  	
         <?php include ('set-menu.php');?>
      </div>
      <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Your Face Interview</h4>
            </div>
            <div class="card-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="text-center">
                        <img width="350px" height="350px" src="images/img-1.png" alt="">
                        <h6 class="pt-5">Did not participate in any job interviews</h6>
                    </div>
                </form>
            </div>
        </div>

      </div>

      <div class="row">
      </div>
    </div>
  </div>
</div>
<?php include ('footer.php');?>