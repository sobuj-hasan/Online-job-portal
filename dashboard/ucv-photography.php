<?php
$page = "photographypage";
    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

    $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
    $ucv_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

    if(isset($_POST['submit'])){
        if($_FILES['ucv_picture']['name']){
        
            $user_image_name = $_FILES['ucv_picture']['name'];
            $after_explode = explode(".", $user_image_name);
            $image_extension = end($after_explode);
            $accepted_extension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'webp', 'WEBP', 'GIF', 'gif'];
            
            if(!in_array($image_extension, $accepted_extension)){
                $_SESSION['image_extention_missing'] = "This image formate is not accepted!";
                header("location: ucv-photography.php");
                die();
            } 
            if($_FILES['ucv_picture']['size'] > 1000000){
                $_SESSION['file_size_not_accepting'] = "This file size greater than 1 MB!";
                header("location: ucv-photography.php");
                die();
            }
            $user_image_query = "SELECT ucv_picture FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
            $old_image_name = mysqli_fetch_assoc(mysqli_query($np2con, $user_image_query))['ucv_picture'];

            if($old_image_name != "default.png"){
                unlink("images/profile_image/" . $old_image_name);
            }
            // image uploade start
            $image_new_name = random_int(123123, 2345234) . "EJOBS" . "." . $image_extension;

            $user_temp_location = $_FILES['ucv_picture']['tmp_name'];    
            $new_location = "images/profile_image/" . $image_new_name;
            move_uploaded_file($user_temp_location, $new_location);
            // image uploade End

            // Database image update start
            $update_query = "UPDATE user_cv SET ucv_picture = '$image_new_name' WHERE ucv_user_id = '$auth_user_id'";
            mysqli_query($np2con, $update_query);
            $_SESSION['picture_update_status'] = "Your CV Picture successfull!";
            header("location: ucv-photography.php");
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
        
<section id="add-course">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div id="msg-container" class="card pl-4 pt-4 pb-2 bg-white">
                    <div class="row">
                        <div class="col-md-6">
                            <p> <strong id="message" class="text-dark h5">Photography</strong></p>
                        </div>
                    </div>
                </div>
                    
                <div id="lukochuri" class="card-body bg-white">

                    <div class="row  w-100">
                        <div class="col-xl-12">
                            <div class="notice-part p pb-2">
                                <p>Here you can edit your resume in five different steps (Personal, Education, Training, Employment and Photography). To enrich your resume provide authentic information.</p>
                            </div>
                            <form class="required-form" action="" method="POST" enctype="multipart/form-data">
                                <div data-select2-id="basicwizard">
                                    <!-- CV update Nav -->
                                    <?php include ('ucv-nav.php'); ?>

                                    <div class="tab-content b-0 mb-0" data-select2-id="13">
                                        <div class="tab-pane active" id="basic" data-select2-id="basic">
                                            <div class="row justify-content-center" data-select2-id="12">
                                                
                                                <div class="card-body">
                                                    <?php
                                                        if(isset($_SESSION['profile_update_status'])){
                                                        ?>
                                                            <div class="alert alert-success">
                                                            <?php
                                                                echo $_SESSION['profile_update_status'];
                                                                unset($_SESSION['profile_update_status']);
                                                            ?>
                                                            </div>
                                                        <?php
                                                        }
                                                    ?>
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-6 py-1 text-center m-auto">
                                                                <div class="form-group">
                                                                    <style>
                                                                        article, aside, figure, footer, header, hgroup, 
                                                                        menu, nav, section { display: block; }
                                                                    </style>
                                                                    <img src="images/profile_image/<?=$ucv_info['ucv_picture']?>" id="imgone" class="img-sm mt-2 mb-4" style="width: 124px; height:124px !important; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="http://demo.activeitzone.com/shop/uploads/product_image/default.jpg" alt="your image" /><br>
                                                                    <input class="form-control" type='file' onchange="setThumbnail_Image(this); " name="ucv_picture" />
                                                                    <?php
                                                                        if(isset($_SESSION['image_extention_missing'])){
                                                                        ?>
                                                                            <span class="text-danger mt-2">
                                                                            <?php
                                                                                echo $_SESSION['image_extention_missing'];
                                                                                unset($_SESSION['image_extention_missing']);
                                                                            ?>
                                                                            </span>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                    <?php
                                                                        if(isset($_SESSION['file_size_not_accepting'])){
                                                                        ?>
                                                                            <span class="text-danger mt-2">
                                                                            <?php
                                                                                echo $_SESSION['file_size_not_accepting'];
                                                                                unset($_SESSION['file_size_not_accepting']);
                                                                            ?>
                                                                            </span>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                    <?php
                                                                        if(isset($_SESSION['picture_update_status'])){
                                                                        ?>
                                                                            <div class="alert alert-success">
                                                                            <?php
                                                                                echo $_SESSION['picture_update_status'];
                                                                                unset($_SESSION['picture_update_status']);
                                                                            ?>
                                                                            </div>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <script>
                                                            function setThumbnail_Image(input) {
                                                                if (input.files && input.files[0]) {
                                                                    var reader = new FileReader();
                                                                    reader.onload = function (e) {
                                                                    $('#imgone')
                                                                    .attr('src', e.target.result)
                                                                    .width(124)
                                                                    .height(124);
                                                                    };
                                                                    reader.readAsDataURL(input.files[0]);
                                                                }
                                                            }
                                                        </script>
                                                        
                                                        <div class="row mt-2">
                                                            <div class="col-md-12 text-center py-1">
                                                                <button type="submit" name="submit" class="btn btn-info mr-3">Save Photo</button>
                                                                <a class="btn btn-danger mr-3" href="ucv-photo-delete.php">Delete Photo</a>
                                                                <a class="btn btn-success" href="my-cv-view.php?personal_cv_id=<?=$ucv_info['ucv_id'];?>">View Resume</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div> <!-- end col -->
                                        </div> <!-- end row -->
                                    </div> <!-- end tab pane -->

                                </div>
                            </div>
                        </form>
                    </div>
                    </div><!-- end row-->
                    </div>
                </div>
        </div>

    </div>
</section>

      </div>

      <div class="row">
      </div>
    </div>
</div>
</div>
<?php include ('footer.php');?>