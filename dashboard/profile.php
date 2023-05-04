<?php
    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

    $select_query = "SELECT * FROM users WHERE user_id = '$auth_user_id'";
    $user_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

    if(isset($_POST['submit'])){
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_first_name = htmlspecialchars($_POST['user_first_name']);
    $user_last_name = htmlspecialchars($_POST['user_last_name']);
    $user_email = htmlspecialchars($_POST['user_email']);
    $user_about = htmlspecialchars($_POST['user_about']);
    $user_location = htmlspecialchars($_POST['user_location']);
    $user_city = htmlspecialchars($_POST['user_city']);
    $user_phone = htmlspecialchars($_POST['user_phone']);
    $user_country = htmlspecialchars($_POST['user_country']);

    if(isset($_FILES['user_photo'])){
      $user_image_name = $_FILES['user_photo']['name'];
      $after_explode = explode(".", $user_image_name);
      $image_extension = end($after_explode);
      $accepted_extension = ['jpg', 'JPG', 'png', 'PNG', 'jpeg', 'JPEG', 'webp', 'WEBP', 'GIF', 'gif'];
      
      if(!in_array($image_extension, $accepted_extension)){
          $_SESSION['image_extention_missing'] = "This image formate is not accepted!";
          header("location: profile.php");
          die();
      } 
      if($_FILES['user_photo']['size'] > 1000000){
          $_SESSION['user_photo'] = "This file size greater than 1 MB!";
          header("location: profile.php");
          die();
      }
      $user_image_query = "SELECT users FROM user_photo WHERE user_id = '$auth_user_id'";
      $old_image_name = mysqli_fetch_assoc(mysqli_query($np2con, $user_image_query))['user_photo'];

      if($old_image_name != "default.png"){
          unlink("images/profile_image/" . $old_image_name);
      }
      // image uploade start
      $image_new_name = random_int(123123, 2345234) . "EJOBS" . "." . $image_extension;


      $user_temp_location = $_FILES['user_photo']['tmp_name'];    
      $new_location = "images/profile_image/" . $image_new_name;
      move_uploaded_file($user_temp_location, $new_location);
      // image uploade End

      // Database image update start
      $update_query = "UPDATE users SET user_photo = '$image_new_name' WHERE user_id = '$auth_user_id'";
      $profile_photo = mysqli_query($np2con, $update_query);
    }
    $update_query = "UPDATE users SET user_name='$user_name', user_first_name='$user_first_name', user_last_name='$user_last_name', user_email='$user_email', user_about='$user_about', user_location ='$user_location', user_city='$user_city', user_country = '$user_country', user_phone='$user_phone' WHERE user_id='$auth_user_id'";
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
      <div class="col-md-3 col-sm-6 mt-4 grid-margin stretch-card">  	
         <?php include ('set-menu.php');?>
      </div>
      <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card">
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
                                <label>Username</label>
                                <input type="text" class="form-control" disabled="" placeholder="Username" value="<?=$user_info['user_name']?>" name="user_name">
                            </div>
                        </div>
                        <div class="col-md-4 pr-1">
                            <div class="form-group">
                                <label>Account Name</label>
                                <input type="phone" class="form-control" placeholder="phone number" value="<?=$user_info['user_phone']?>" name="user_phone">
                            </div>
                        </div>
                        <div class="col-md-4 pl-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email or Phone</label>
                                <input type="email" class="form-control" placeholder="email address" value="<?=$user_info['user_email']?>" name="user_email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" placeholder="Company" value="<?=$user_info['user_first_name']?>" name="user_first_name">
                            </div>
                        </div>
                        <div class="col-md-6 pl-1">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" value="<?=$user_info['user_last_name']?>" name="user_last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Home Address" value="<?=$user_info['user_location']?>" name="user_location">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 pr-1">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="City" value="<?=$user_info['user_city']?>" name="user_city">
                            </div>
                        </div>
                        <div class="col-md-6 px-1">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" placeholder="Country" value="<?=$user_info['user_country']?>" name="user_country">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>About Me</label>
                                <textarea rows="6" cols="80" class="form-control" placeholder="Here can be your description" value="Mike" name="user_about"><?=$user_info['user_about']?></textarea>
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
                                
                                <img id="blah" class="img-sm mb-1" style="height:103px !important; width: 100px; border:1px solid #ddd;padding:2px; border-radius:2px !important;" src="images/profile_image/<?=$user_info['user_photo']?>" alt="your image" /><br>
                                <input class="form-control" type='file' onchange="readURL(this); " name="user_photo"/>

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
                    <div class="text-right mt-4">
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