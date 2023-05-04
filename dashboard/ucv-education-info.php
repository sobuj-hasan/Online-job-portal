<?php
$page = "educationinfopage";
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
                            <p> <strong id="message" class="text-dark h5">Educational Qualifications </strong></p><span class="text-muted">(add your last two Educational Qualifications)</span>
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
                                            $ucv_edu_level_one = htmlspecialchars($_POST['ucv_edu_level_one']);
                                            $ucv_edu_degree_one = htmlspecialchars($_POST['ucv_edu_degree_one']);
                                            $ucv_edu_Inst_name_one = htmlspecialchars($_POST['ucv_edu_Inst_name_one']);
                                            $ucv_edu_group_one = htmlspecialchars($_POST['ucv_edu_group_one']);
                                            $ucv_edu_result_one = htmlspecialchars($_POST['ucv_edu_result_one']);
                                            $ucv_edu_cgpa_one = htmlspecialchars($_POST['ucv_edu_cgpa_one']);
                                            $ucv_edu_cgpa_scale_one = htmlspecialchars($_POST['ucv_edu_cgpa_scale_one']);
                                            $ucv_edu_duration_one = htmlspecialchars($_POST['ucv_edu_duration_one']);
                                            $ucv_edu_achieve_one = htmlspecialchars($_POST['ucv_edu_achieve_one']);
                                            $ucv_edu_level_two = htmlspecialchars($_POST['ucv_edu_level_two']);
                                            $ucv_edu_degree_two = htmlspecialchars($_POST['ucv_edu_degree_two']);
                                            $ucv_edu_Inst_name_two = htmlspecialchars($_POST['ucv_edu_Inst_name_two']);
                                            $ucv_edu_group_two = htmlspecialchars($_POST['ucv_edu_group_two']);
                                            $ucv_edu_result_two = htmlspecialchars($_POST['ucv_edu_result_two']);
                                            $ucv_edu_cgpa_two = htmlspecialchars($_POST['ucv_edu_cgpa_two']);
                                            $ucv_edu_cgpa_scale_two = htmlspecialchars($_POST['ucv_edu_cgpa_scale_two']);
                                            $ucv_edu_duration_two = htmlspecialchars($_POST['ucv_edu_duration_two']);
                                            $ucv_edu_achieve_two = htmlspecialchars($_POST['ucv_edu_achieve_two']);

                                            $update_ucv = "UPDATE `user_cv` SET `ucv_edu_level_one`='$ucv_edu_level_one',`ucv_edu_degree_one`='$ucv_edu_degree_one',`ucv_edu_Inst_name_one`='$ucv_edu_Inst_name_one',`ucv_edu_group_one`='$ucv_edu_group_one',`ucv_edu_result_one`='$ucv_edu_result_one',`ucv_edu_cgpa_one`='$ucv_edu_cgpa_one',`ucv_edu_cgpa_scale_one`='$ucv_edu_cgpa_scale_one',`ucv_edu_duration_one`='$ucv_edu_duration_one',`ucv_edu_achieve_one`='$ucv_edu_achieve_one',`ucv_edu_level_two`='$ucv_edu_level_two',`ucv_edu_degree_two`='$ucv_edu_degree_two',`ucv_edu_Inst_name_two`='$ucv_edu_Inst_name_two',`ucv_edu_group_two`='$ucv_edu_group_two',`ucv_edu_result_two`='$ucv_edu_result_two',`ucv_edu_cgpa_two`='$ucv_edu_cgpa_two',`ucv_edu_cgpa_scale_two`='$ucv_edu_cgpa_scale_two',`ucv_edu_duration_two`='$ucv_edu_duration_two',`ucv_edu_achieve_two`='$ucv_edu_achieve_two' WHERE ucv_user_id = '$auth_user_id'";

                                            if(mysqli_query($np2con, $update_ucv)){
                                                echo gen_notification('Successfully Save Your Educational Qualifications. Fillup Next Steps', 'success');
                                                echo reloader('dashboard/ucv-add-skill.php',2500);
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
                                                        <label class="h6" for="">Academic <span class="text-muted">(1)</span></label><br>
                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Lavel of Education*</label>
                                                                    <select type="text" class="form-control" name="ucv_edu_level_one" required>
                                                                        <option><?=$ucv_info['ucv_edu_level_one']?></option>
                                                                        <option>Primary</option>
                                                                        <option>S S C</option>
                                                                        <option>H S C</option>
                                                                        <option>Vocational</option>
                                                                        <option>Fazil</option>
                                                                        <option>Kamil</option>
                                                                        <option>Bachelor (Engineering & Technology)</option>
                                                                        <option>MSC</option>
                                                                        <option>P H D</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Exam Degree Title*</label>
                                                                    <select type="text" class="form-control" name="ucv_edu_degree_one" required>
                                                                        <option><?=$ucv_info['ucv_edu_degree_one']?></option>
                                                                        <option>Primary Education</option>
                                                                        <option>Secondary School Certificate</option>
                                                                        <option>Higher School Certificate</option>
                                                                        <option>Diploma in Engineering</option>
                                                                        <option>Similar to Associates Degree</option>
                                                                        <option>Bachelor Degree</option>
                                                                        <option>Similar to Bachelor Degree</option>
                                                                        <option>Bachelor (Engineering & Technology)</option>
                                                                        <option>Master's</option>
                                                                        <option>Master's of Associates</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">School/Institute Name*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: Dhanmondi Ideal School" value="<?=$ucv_info['ucv_edu_Inst_name_one']?>" name="ucv_edu_Inst_name_one" required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Mejor Group*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: Science" value="<?=$ucv_info['ucv_edu_group_one']?>" name="ucv_edu_group_one">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Resul*</label>
                                                                    <select type="text" class="form-control" name="ucv_edu_result_one" required>
                                                                        <option><?=$ucv_info['ucv_edu_result_one']?></option>
                                                                        <option>Grade</option>
                                                                        <option>Enrolled</option>
                                                                        <option>Apperead</option>
                                                                        <option>Pass</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">CGPA*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: 4.00" value="<?=$ucv_info['ucv_edu_cgpa_one']?>" name="ucv_edu_cgpa_one">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Scale*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: 5.00" value="<?=$ucv_info['ucv_edu_cgpa_scale_one']?>" name="ucv_edu_cgpa_scale_one">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Passing Year </label>
                                                                    <input type="text" class="form-control" placeholder="Ex: 4 years" value="<?=$ucv_info['ucv_edu_duration_one']?>" name="ucv_edu_duration_one">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Achievement <span class="text-muted">(if any*)</span></label>
                                                                    <input type="text" class="form-control" placeholder="Achievement award (if any)" value="<?=$ucv_info['ucv_edu_achieve_one']?>" name="ucv_edu_achieve_one">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <label class="h6 mt-4" for="">Academic <span class="text-muted">(2)</span></label><br>
                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Lavel of Education*</label>
                                                                    <select type="text" class="form-control" name="ucv_edu_level_two">
                                                                        <option><?=$ucv_info['ucv_edu_level_two']?></option>
                                                                        <option>Primary Education</option>
                                                                        <option>Secondary School Certificate</option>
                                                                        <option>Higher School Certificate</option>
                                                                        <option>Diploma in Engineering</option>
                                                                        <option>Similar to Associates Degree</option>
                                                                        <option>Bachelor Degree</option>
                                                                        <option>Similar to Bachelor Degree</option>
                                                                        <option>Bachelor (Engineering & Technology)</option>
                                                                        <option>Master's</option>
                                                                        <option>Master's of Associates</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Exam Degree Title*</label>
                                                                    <select type="text" class="form-control" name="ucv_edu_degree_two">
                                                                        <option><?=$ucv_info['ucv_edu_degree_two']?></option>
                                                                        <option>Primary Education</option>
                                                                        <option>Secondary School Certificate</option>
                                                                        <option>Higher School Certificate</option>
                                                                        <option>Diploma in Engineering</option>
                                                                        <option>Similar to Associates Degree</option>
                                                                        <option>Bachelor Degree</option>
                                                                        <option>Similar to Bachelor Degree</option>
                                                                        <option>Bachelor (Engineering & Technology)</option>
                                                                        <option>Master's</option>
                                                                        <option>Master's of Associates</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Collage/Institute Name*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: Dhanmondi Ideal School & Collage" value="<?=$ucv_info['ucv_edu_Inst_name_two']?>" name="ucv_edu_Inst_name_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Mejor Group*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: Science" value="<?=$ucv_info['ucv_edu_group_two']?>" name="ucv_edu_group_two">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Resul*</label>
                                                                    <select type="text" class="form-control" name="ucv_edu_result_two">
                                                                        <option><?=$ucv_info['ucv_edu_result_two']?></option>
                                                                        <option>Grade</option>
                                                                        <option>Enrolled</option>
                                                                        <option>Apperead</option>
                                                                        <option>Pass</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">CGPA*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: 3.90" value="<?=$ucv_info['ucv_edu_cgpa_two']?>" name="ucv_edu_cgpa_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 py-1">
                                                                <div class="form-group">
                                                                    <label for="exampleFormControlSelect1">Scale*</label>
                                                                    <input type="text" class="form-control" placeholder="Ex: 4.00" value="<?=$ucv_info['ucv_edu_cgpa_scale_two']?>" name="ucv_edu_cgpa_scale_two">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Passing Year</span></label>
                                                                    <input type="text" class="form-control" placeholder="Duration" value="<?=$ucv_info['ucv_edu_duration_two']?>" name="ucv_edu_duration_two">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 py-1">
                                                                <div class="form-group">
                                                                    <label>Achievement <span>(if any*)</span></label>
                                                                    <input type="text" class="form-control" placeholder="achievement" value="<?=$ucv_info['ucv_edu_achieve_two']?>" name="ucv_edu_achieve_two">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-2">
                                                            <div class="col-md-12 text-center py-1">
                                                                <button type="submit" name="submit" class="btn btn-info mr-3">Save & Continue <i class="fa fa-angle-double-right"></i></button>
                                                                <a class="btn btn-danger" href="ucv-education-info.php">Cencel</a>
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