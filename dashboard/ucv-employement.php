<?php
$page = "employementpage";
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
                            <p> <strong id="message" class="text-dark h5">Job Experience or Training</strong></p>
                        </div>
                    </div>
                </div>
                    
                <div id="lukochuri" class="card-body bg-white">

                    <div class="row  w-100">
                        <div class="col-xl-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div data-select2-id="basicwizard">
                                    <!-- CV update Nav -->
                                    <?php 
                                        include ('ucv-nav.php');

                                        if(isset($_POST['submit'])){
                                            $ucv_company_name_one = htmlspecialchars($_POST['ucv_company_name_one']);
                                            $ucv_designation_one = htmlspecialchars($_POST['ucv_designation_one']);
                                            $ucv_exp1_one = htmlspecialchars($_POST['ucv_exp1_one']);
                                            $ucv_exp2_one = htmlspecialchars($_POST['ucv_exp2_one']);
                                            $ucv_exp3_one = htmlspecialchars($_POST['ucv_exp3_one']);
                                            $ucv_start_period_month_one = htmlspecialchars($_POST['ucv_start_period_month_one']);
                                            $ucv_end_period_month_one = htmlspecialchars($_POST['ucv_end_period_month_one']);
                                            $ucv_current_work_one = htmlspecialchars($_POST['ucv_current_work_one']);
                                            $ucv_responsiblity_one = htmlspecialchars($_POST['ucv_responsiblity_one']);

                                            $ucv_company_name_two = htmlspecialchars($_POST['ucv_company_name_two']);
                                            $ucv_designation_two = htmlspecialchars($_POST['ucv_designation_two']);
                                            $ucv_exp1_two = htmlspecialchars($_POST['ucv_exp1_two']);
                                            $ucv_exp2_two = htmlspecialchars($_POST['ucv_exp2_two']);
                                            $ucv_exp3_two = htmlspecialchars($_POST['ucv_exp3_two']);
                                            $ucv_start_period_month_two = htmlspecialchars($_POST['ucv_start_period_month_two']);
                                            $ucv_end_period_month_two = htmlspecialchars($_POST['ucv_end_period_month_two']);
                                            $ucv_current_work_two = htmlspecialchars($_POST['ucv_current_work_two']);
                                            $ucv_responsiblity_two = htmlspecialchars($_POST['ucv_responsiblity_two']);

                                            $update_ucv = "UPDATE `user_cv` SET `ucv_company_name_one`='$ucv_company_name_one',`ucv_designation_one`='$ucv_designation_one',`ucv_exp1_one`='$ucv_exp1_one',`ucv_exp2_one`='$ucv_exp2_one',`ucv_exp3_one`='$ucv_exp3_one',`ucv_start_period_month_one`='$ucv_start_period_month_one',`ucv_end_period_month_one`='$ucv_end_period_month_one',`ucv_current_work_one`='$ucv_current_work_one',`ucv_responsiblity_one`='$ucv_responsiblity_one',`ucv_company_name_two`='$ucv_company_name_two',`ucv_designation_two`='$ucv_designation_two',`ucv_exp1_two`='$ucv_exp1_two',`ucv_exp2_two`='$ucv_exp2_two',`ucv_exp3_two`='$ucv_exp3_two',`ucv_start_period_month_two`='$ucv_start_period_month_two',`ucv_end_period_month_two`='$ucv_end_period_month_two',`ucv_current_work_two`='$ucv_current_work_two',`ucv_responsiblity_two`='$ucv_responsiblity_two' WHERE ucv_user_id = '$auth_user_id'";
                                            if(mysqli_query($np2con, $update_ucv)){
                                                echo gen_notification('Successfully Added Your Work Experience. Fillup Next Steps', 'success');
                                                echo reloader('dashboard/ucv-photography.php',2500);
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
                                                        <label class="h6" for="">Add Experience <span class="text-muted">(1)</span></label><br>
                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Company Name*</label>
                                                                    <input type="text" class="form-control" placeholder="company name" value="<?=$ucv_info['ucv_company_name_one']?>" name="ucv_company_name_one">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Designation*</label>
                                                                    <input type="text" class="form-control" placeholder="designation" value="<?=$ucv_info['ucv_designation_one']?>" name="ucv_designation_one">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Work experience <span class="text-muted">(1)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Ex: graphics design" value="<?=$ucv_info['ucv_exp1_one']?>" name="ucv_exp1_one">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Work experience <span class="text-muted">(2)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Ex: web design" value="<?=$ucv_info['ucv_exp2_one']?>" name="ucv_exp2_one">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Work experience <span class="text-muted">(3)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Ex: digital marketing" value="<?=$ucv_info['ucv_exp3_one']?>" name="ucv_exp3_one">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Employment Period*</label>
                                                                    <input type="date" class="form-control" placeholder="Ex: 11-01-1999" value="<?=$ucv_info['ucv_start_period_month_one']?>" name="ucv_start_period_month_one">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1"></label>
                                                                    <input type="date" class="form-control" placeholder="department" value="<?=$ucv_info['ucv_end_period_month_one']?>" name="ucv_end_period_month_one">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" id="" value="1" name="ucv_current_work_one">
                                                                            Currently Working
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 py-1">
                                                                <div class="form-group">
                                                                    <label>Responsibilities*</label>
                                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here your responsibilities" name="ucv_responsiblity_one"><?=$ucv_info['ucv_responsiblity_one']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- add experience two -->
                                                        <label class="h6" for="">Add Experience <span class="text-muted">(2)</span></label><br>
                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Company Name*</label>
                                                                    <input type="text" class="form-control" placeholder="company name" value="<?=$ucv_info['ucv_company_name_two']?>" name="ucv_company_name_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Designation*</label>
                                                                    <input type="text" class="form-control" placeholder="designation" value="<?=$ucv_info['ucv_designation_two']?>" name="ucv_designation_two">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Work experience <span class="text-muted">(1)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Ex: graphics design" value="<?=$ucv_info['ucv_exp1_two']?>" name="ucv_exp1_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Work experience <span class="text-muted">(2)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Ex: web design" value="<?=$ucv_info['ucv_exp2_two']?>" name="ucv_exp2_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Work experience <span class="text-muted">(3)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Ex: web design" value="<?=$ucv_info['ucv_exp3_two']?>" name="ucv_exp3_two">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Employment Period*</label>
                                                                    <input type="date" class="form-control" placeholder="Ex: 11-11-1999" value="<?=$ucv_info['ucv_start_period_month_two']?>" name="ucv_start_period_month_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1"></label>
                                                                    <input type="date" class="form-control" placeholder="Ex: 11-11-1999" value="<?=$ucv_info['ucv_end_period_month_two']?>" name="ucv_end_period_month_two">
                                                                    <div class="form-check">
                                                                        <label class="form-check-label">
                                                                            <input type="checkbox" class="form-check-input" id="" value="1" name="ucv_current_work_two">
                                                                            Currently Working
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 py-1">
                                                                <div class="form-group">
                                                                    <label>Responsibilities*</label>
                                                                    <textarea rows="4" cols="80" class="form-control" placeholder="Here your responsibilities" name="ucv_responsiblity_two"><?=$ucv_info['ucv_responsiblity_two']?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-12 text-center py-1">
                                                                <button type="submit" name="submit" class="btn btn-info mr-3">Save & Continue <i class="fa fa-angle-double-right"></i></button>
                                                                <a class="btn btn-danger" href="ucv-employement.php">Cencel</a>
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