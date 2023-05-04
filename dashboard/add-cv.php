<?php
    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

    $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
    $ucv_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));
    $ucv_status = $ucv_info['ucv_status'];

    if(isset($_POST['submit'])){
        $ucv_user_namne = htmlspecialchars($_POST['ucv_user_namne']);
        $ucv_title = htmlspecialchars($_POST['ucv_title']);
        $ucv_phone = htmlspecialchars($_POST['ucv_phone']);
        $ucv_email = htmlspecialchars($_POST['ucv_email']);

        $insert_query = "INSERT INTO `user_cv` (ucv_user_id, `ucv_user_name`, `ucv_title`, `ucv_phone`, `ucv_email`, ucv_status) VALUES ('$auth_user_id', '$ucv_user_namne', '$ucv_title', '$ucv_phone', '$ucv_email', '1')";
        if(mysqli_query($np2con, $insert_query)){
            echo reloader('dashboard/ucv-personal-info.php',0);
        }
        else {
            echo gen_notification('This information save failed, Send currect information & tray again','danger');
        }
    }
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
   </div>
   <!-- eBazar Left Side profile and menu -->
    <div class="row">
      <div class="col-md-3 col-sm-6 mt-4 grid-margin stretch-card">  	
         <?php include ('set-menu.php');?>
      </div>
      <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Resume Format</h4>
            </div>
            <div class="card-body">
                <?php
                    if($ucv_status == 1){
                        echo '<div class="alert alert-success mt-2">
                            Your Resume Format is Created, Please Make Your CV !
                        </div>
                        <div class="mt-5">
                            <a href="ucv-personal-info.php" class="btn btn-info btn-fill pull-right">Make/Edit Your CV </a>
                        </div>';
                    }else{
                        echo '<form action="" method="POST">
                            <div class="row">
                                <div class="col-md-6 px-2 p-2">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="write your name" value="" name="ucv_user_namne" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 px-2 p-2">
                                    <div class="form-group">
                                        <label>CV Title</label>
                                        <input type="text" class="form-control" placeholder="write your CV title" value="" name="ucv_title" required>
                                    </div>
                                </div>
                                <div class="col-md-6 px-2 p-2">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="phone" class="form-control" placeholder="phone number" value="" name="ucv_phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-2 p-2">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" placeholder="email address" value="" name="ucv_email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Save Resume Format</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>';
                    }
                ?>
                </div>
            </div>
        </div>
        <div class="row">
        </div>
        </div>
    </div>
</div>
<?php include ('footer.php');?>