<?php
    include ('header.php');

    // company author id
    $cmp_author_id = $_SESSION['snm_ejob_cmp_id'];

    $select_query = "SELECT * FROM company_author WHERE cmp_id = '$cmp_author_id'";
    $user_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

    if(isset($_POST['submit'])){

    $cmp_name = $_POST['cmp_name'];    
    $cmp_first_name = $_POST['cmp_first_name'];
    $cmp_last_name = htmlspecialchars($_POST['cmp_last_name']);
    $cmp_email = htmlspecialchars($_POST['cmp_email']);
    $cmp_about = htmlspecialchars($_POST['cmp_about']);
    $cmp_location = htmlspecialchars($_POST['cmp_location']);
    $cmp_city = htmlspecialchars($_POST['cmp_city']);
    $cmp_phone = htmlspecialchars($_POST['cmp_phone']);
    $cmp_country = htmlspecialchars($_POST['cmp_country']);

    if(isset($_FILES['cmp_photo'])){
      $user_image_name = $_FILES['cmp_photo']['name'];
      $after_explode = explode(".", $user_image_name);
      $image_extension = end($after_explode);
      $accepted_extension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'webp', 'WEBP', 'GIF', 'gif'];
      
      if(!in_array($image_extension, $accepted_extension)){
          $_SESSION['image_extention_missing'] = "This image formate is not accepted!";
          header("location: profile.php");
          die();
      } 
      if($_FILES['cmp_photo']['size'] > 1000000){
          $_SESSION['cmp_photo'] = "This file size greater than 1 MB!";
          header("location: profile.php");
          die();
      }
      $user_image_query = "SELECT company_author FROM cmp_photo WHERE cmp_id = '$cmp_author_id'";
      $old_image_name = mysqli_fetch_assoc(mysqli_query($np2con, $user_image_query))['cmp_photo'];

      if($old_image_name != "default.png"){
          unlink("images/profile_image/" . $old_image_name);
      }
      // image uploade start
      $image_new_name = random_int(123123, 2345234) . "EJOBS" . "." . $image_extension;


      $user_temp_location = $_FILES['cmp_photo']['tmp_name'];    
      $new_location = "images/profile_image/" . $image_new_name;
      move_uploaded_file($user_temp_location, $new_location);
      // image uploade End

      // Database image update start
      $update_query = "UPDATE company_author SET cmp_photo = '$image_new_name' WHERE cmp_id = '$cmp_author_id'";
      $profile_photo = mysqli_query($np2con, $update_query);
    }

    $update_query = "UPDATE company_author SET cmp_name ='$cmp_name', cmp_first_name='$cmp_first_name', cmp_last_name='$cmp_last_name', cmp_email='$cmp_email', cmp_about='$cmp_about', cmp_location ='$cmp_location', cmp_city='$cmp_city', cmp_phone='$cmp_phone' WHERE cmp_id='$cmp_author_id'";
    $profile_update = mysqli_query($np2con, $update_query);
    $_SESSION['profile_update_status'] = "Your profile information successfully updated!";
    header('location: profile.php');
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
      <?php
         // include ('part1.php');
         ?>
   </div>
   <!-- eBazar Left Side profile and menu -->
    <div class="row">
      
      <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card m-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Profile Update</h4>
            </div>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4 px-1">
                            <div class="form-group">
                                <label>Company Name</label>
                                <input type="text" class="form-control" placeholder="Username" value="<?=$user_info['cmp_name']?>" name="cmp_name">
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="phone" class="form-control" placeholder="phone number" value="<?=$user_info['cmp_phone']?>" name="cmp_phone">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" placeholder="email address" value="<?=$user_info['cmp_email']?>" name="cmp_email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Company" value="<?=$user_info['cmp_first_name']?>" name="cmp_first_name">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" value="<?=$user_info['cmp_last_name']?>" name="cmp_last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Home Address" value="<?=$user_info['cmp_location']?>" name="cmp_location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="City" value="<?=$user_info['cmp_city']?>" name="cmp_city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" placeholder="Country" value="<?=$user_info['cmp_city']?>" name="cmp_country">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="6" cols="80" class="form-control" placeholder="Here can be your description" value="Mike" name="cmp_about"><?=$user_info['cmp_about']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Profile Photo</label>
                                <br>
                                <!-- When select image than show this image Code start -->
                                <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
                                <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
                                
                                <style>
                                article, aside, figure, footer, header, hgroup, 
                                menu, nav, section { display: block; }
                                </style>
                                
                                <img id="blah" class="img-sm mb-1" style="height:103px !important; width: 100px; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="images/profile_image/<?=$user_info['cmp_photo']?>" alt="your image" /><br>
                                <input class="form-control" type='file' onchange="readURL(this); " name="cmp_photo"/>

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
                                <script>
                                function readURL(input) {
                                  if (input.files && input.files[0]) {
                                      var reader = new FileReader();
                                
                                      reader.onload = function (e) {
                                          $('#blah')
                                            .attr('src', e.target.result)
                                            .width(100)
                                            .height(103);
                                      };
                                
                                      reader.readAsDataURL(input.files[0]);
                                  }
                                }
                                </script>
                                <!-- When select image than show this image Code End -->
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-2">
                        <button type="submit" name="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                    </div>
                    <div class="clearfix"></div>
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