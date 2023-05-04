<?php
$page = "addskillpage";
    include ('header.php');
    $auth_user_id = $_SESSION['snm_ejob_user_id'];

    $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
    $ucv_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

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
                            <p> <strong id="message" class="text-dark h5">Add Your Skills</strong></p>
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
                                            $ucv_skill_one = htmlspecialchars($_POST['ucv_skill_one']);
                                            $ucv_skill_two = htmlspecialchars($_POST['ucv_skill_two']);
                                            $ucv_skill_three = htmlspecialchars($_POST['ucv_skill_three']);
                                            $ucv_skill_four = htmlspecialchars($_POST['ucv_skill_four']);
                                            $ucv_skill_five = htmlspecialchars($_POST['ucv_skill_five']);
                                            $ucv_skill_six = htmlspecialchars($_POST['ucv_skill_six']);

                                            $update_ucv = "UPDATE `user_cv` SET `ucv_skill_one`='$ucv_skill_one',`ucv_skill_two`='$ucv_skill_two',`ucv_skill_three`='$ucv_skill_three',`ucv_skill_four`='$ucv_skill_four',`ucv_skill_five`='$ucv_skill_five',`ucv_skill_six`='$ucv_skill_six' WHERE ucv_user_id = '$auth_user_id'";
                                            if(mysqli_query($np2con, $update_ucv)){
                                                echo gen_notification('Successfully Added Your Skills. Fillup Next Steps', 'success');
                                                echo reloader('dashboard/ucv-employement.php',2500);
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
                                                                    <label class="h6">Add Skill <span class="text-muted">(1)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Write your skill name" value="<?=$ucv_info['ucv_skill_one']?>" name="ucv_skill_one" required>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_one_self">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Self
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_one_edu">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Educational
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_one_pro">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Professional/Training
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label class="h6">Add Skill <span class="text-muted">(2)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Write your skill name" value="<?=$ucv_info['ucv_skill_two']?>" name="ucv_skill_two" required>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_two_self">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Self
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_two_edu">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Educational
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_two_pro">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Professional/Training
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label class="h6">Add Skill <span class="text-muted">(3)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Write your skill name" value="<?=$ucv_info['ucv_skill_three']?>" name="ucv_skill_three">

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_three_self">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Self
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_three_edu">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Educational
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_three_pro">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Professional/Training
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label class="h6">Add Skill <span class="text-muted">(4)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Write your skill name" value="<?=$ucv_info['ucv_skill_four']?>" name="ucv_skill_four">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_four_self">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Self
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_four_edu">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Educational
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_four_pro">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Professional/Training
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label class="h6">Add Skill <span class="text-muted">(5)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Write your skill name" value="<?=$ucv_info['ucv_skill_five']?>" name="ucv_skill_five">

                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_five_self">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Self
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_five_edu">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Educational
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_five_pro">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Professional/Training
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label class="h6">Add Skill <span class="text-muted">(6)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Write your skill name" value="<?=$ucv_info['ucv_skill_six']?>" name="ucv_skill_six">
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_six_self">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Self
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_six_edu">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Educational
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" name="ucv_skill_six_pro">
                                                                        <label class="mt-1" for="flexCheckDefault">
                                                                            Professional/Training
                                                                        </label>
                                                                    </div>
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
                                                            <a class="btn btn-danger" href="ucv-add-skill.php">Cencel</a>
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