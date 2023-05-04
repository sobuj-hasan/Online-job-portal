<?php
$page = "personalinfopage";
    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

    $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
    $ucv_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

?>
</head>
<body>
   <div class="container-scroller">
    <?php 
        include ('nav.php');
    ?>
   <div class="container-fluid page-body-wrapper">
   <div class="main-panel">
   <div class="content-wrapper">
   <div class="row">
   </div>
   <!-- eBazar Left Side profile and menu -->
    <div class="row">
      <div class="col-md-3 col-sm-6 mt-4 grid-margin stretch-card">
        <?php
            include ('set-menu.php');
        ?>
      </div>
      <div class="col-md-9 col-sm-12 mt-4 grid-margin stretch-card">
        
      <section id="add-course">
    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div id="msg-container" class="card pl-4 pt-4 pb-2 bg-white">
                    <div class="row">
                        <div class="col-md-6">
                            <p> <strong id="message" class="text-dark h5">Personal Information <span class="text-dark h6">(for cv create)</span></strong></p>
                        </div>
                    </div>
                </div>
                    
                <div id="lukochuri" class="card-body bg-white">

                    <div class="row  w-100">
                        <div class="col-xl-12">
                            <form class="required-form" action="" method="POST" enctype="multipart/form-data">
                                <div data-select2-id="basicwizard">
                                    <!-- CV update Nav -->
                                    <?php
                                        include ('ucv-nav.php');

                                        if(isset($_POST['submit'])){
                                            $ucv_first_name = htmlspecialchars($_POST['ucv_first_name']);
                                            $ucv_last_name = htmlspecialchars($_POST['ucv_last_name']);
                                            $ucv_father_name = htmlspecialchars($_POST['ucv_father_name']);
                                            $ucv_mother_name = htmlspecialchars($_POST['ucv_mother_name']);
                                            $ucv_dofb_month = htmlspecialchars($_POST['ucv_dofb_month']);
                                            $ucv_dofb_day = htmlspecialchars($_POST['ucv_dofb_month']);
                                            $ucv_dofb_year = htmlspecialchars($_POST['ucv_dofb_month']);
                                            $ucv_gender = htmlspecialchars($_POST['ucv_gender']);
                                            $ucv_marital_status = htmlspecialchars($_POST['ucv_marital_status']);
                                            $ucv_nationality = htmlspecialchars($_POST['ucv_nationality']);
                                            $ucv_national_id = htmlspecialchars($_POST['ucv_national_id']);
                                            $ucv_religion = htmlspecialchars($_POST['ucv_religion']);
                                            $ucv_passport_no = htmlspecialchars($_POST['ucv_passport_no']);
                                            $ucv_birth_id = htmlspecialchars($_POST['ucv_birth_id']);
                                            $ucv_phone_two = htmlspecialchars($_POST['ucv_phone_two']);
                                            $ucv_present_address = htmlspecialchars($_POST['ucv_present_address']);
                                            $ucv_permanent_address = htmlspecialchars($_POST['ucv_permanent_address']);
                                            $ucv_career_objective = htmlspecialchars($_POST['ucv_career_objective']);

                                            $update_ucv = "UPDATE `user_cv` SET `ucv_first_name`='$ucv_first_name',`ucv_last_name`='$ucv_last_name',`ucv_father_name`='$ucv_father_name',`ucv_mother_name`='$ucv_mother_name',`ucv_dofb_month`='$ucv_dofb_month',`ucv_dofb_day`='$ucv_dofb_day',`ucv_dofb_year`='$ucv_dofb_year',`ucv_gender`='$ucv_gender',`ucv_marital_status`='$ucv_marital_status',`ucv_nationality`='$ucv_nationality',`ucv_national_id`='$ucv_national_id',`ucv_religion`='$ucv_religion',`ucv_passport_no`='$ucv_passport_no',`ucv_birth_id`='$ucv_birth_id',`ucv_phone_two`='$ucv_phone_two',`ucv_present_address`='$ucv_present_address',`ucv_permanent_address`='$ucv_permanent_address',`ucv_career_objective`='$ucv_career_objective' WHERE ucv_user_id = '$auth_user_id'";

                                            if(mysqli_query($np2con, $update_ucv)){
                                                echo gen_notification('Successfully Save Your Personal information. Fillup Next Steps', 'success');
                                                echo reloader('dashboard/ucv-education-info.php',2500);
                                            }
                                            else {
                                                echo gen_notification('This information save failed, Send currect information & tray again','danger');
                                            }
                                        }
                                    ?>
                                    <div class="tab-content b-0 mb-0" data-select2-id="13">
                                        <div class="tab-pane active" id="basic" data-select2-id="basic">
                                            <div class="row justify-content-center" data-select2-id="12">
                                                
                                                <div class="card-body">
                                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>First Name</label>
                                                                    <input type="text" class="form-control" placeholder="first name" value="<?=$ucv_info['ucv_first_name']?>" name="ucv_first_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Last Name</label>
                                                                    <input type="text" class="form-control" placeholder="last name" value="<?=$ucv_info['ucv_last_name']?>" name="ucv_last_name" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Fathers Name</label>
                                                                    <input type="text" class="form-control" placeholder="fathers name" value="<?=$ucv_info['ucv_father_name']?>" name="ucv_father_name" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Mothers Name</label>
                                                                    <input type="text" class="form-control" placeholder="Mothers Name" value="<?=$ucv_info['ucv_mother_name']?>" name="ucv_mother_name" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Date of birth</label>
                                                                    <input type="date" class="form-control" placeholder="date of birth" value="<?=$ucv_info['ucv_dofb_month']?>" name="ucv_dofb_month" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Gender</label>
                                                                    <select type="text" class="form-control" placeholder="Genter" value="ucv_gender" name="ucv_gender" required>
                                                                        <option><?=$ucv_info['ucv_gender']?></option>
                                                                        <option>Male</option>
                                                                        <option>Female</option>
                                                                        <option>Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Marital Status</label>
                                                                    <select type="text" class="form-control" placeholder="marital status" value="ucv_marital_status" name="ucv_marital_status" required>
                                                                        <option><?=$ucv_info['ucv_marital_status']?></option>
                                                                        <option>Single</option>
                                                                        <option>Married</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Nationality</label>
                                                                    <select type="text" class="form-control" placeholder="Nationality" value="ucv_nationality" name="ucv_nationality" required>
                                                                        <option><?=$ucv_info['ucv_nationality']?></option>
                                                                        <option>Bangladeshi</option>
                                                                        <option>Others</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>NID Card No <span class="text-muted">(If any)</span></label>
                                                                    <input type="number" class="form-control" placeholder="National ID No" value="<?=$ucv_info['ucv_national_id']?>" name="ucv_national_id">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Religion</label>
                                                                    <select type="text" class="form-control" placeholder="Religion" value="ucv_religion" name="ucv_religion" required>
                                                                        <option><?=$ucv_info['ucv_religion']?></option>
                                                                        <option>Muslims</option>
                                                                        <option>Hindus</option>
                                                                        <option>Buddhists</option>
                                                                        <option>Christians</option>
                                                                        <option>Other's</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Pasport No <span class="text-muted">(If any)</span></label>
                                                                    <input type="number" class="form-control" placeholder="Passport No" value="<?=$ucv_info['ucv_passport_no']?>" name="ucv_passport_no">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Birth Id No <span class="text-muted">(Optional)</span></label>
                                                                    <input type="number" class="form-control" placeholder="Birth ID No" value="<?=$ucv_info['ucv_birth_id']?>" name="ucv_birth_id">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label>Phone No. <span class="text-muted">(Optional)</span></label>
                                                                    <input type="number" class="form-control" placeholder="Phone Number" value="<?=$ucv_info['ucv_phone_two']?>" name="ucv_phone_two">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Present Address</label>
                                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="ucv_present_address" required><?=$ucv_info['ucv_present_address'];?></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Parmanant Address</label>
                                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your description" name="ucv_permanent_address" required><?=$ucv_info['ucv_permanent_address']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 py-1">
                                                                <div class="form-group">
                                                                    <label>Career Objective </label>
                                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here can be your career objective" name="ucv_career_objective" required> <?=$ucv_info['ucv_career_objective']?> </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <div class="col-md-12 text-center mt-3">
                                                        <div class="custom-control custom-checkbox">
                                                            <button type="submit" name="submit" class="btn btn-info mr-2">Save & Continue <i class="fa fa-angle-double-right"></i></button>
                                                            <a href="ucv-personal-info.php" class="btn btn-danger">Cencel</a>
                                                        </div>
                                                    </div>
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