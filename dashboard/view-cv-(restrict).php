<?php 
include ('../header.php');

  $auth_user_id = $_SESSION['snm_ejob_user_id'];
   
   $select_query = "SELECT * FROM user_cv WHERE ucv_user_id = '$auth_user_id'";
   $ucv_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));
  
?>
</head>
<body>
<!-- Job view page and apply -->
<div class="row bg-danger">
    <!--Inner Content start-->
    <div class="card pl-4 pt-4 pb-2 bg-info">
        <div class="container">
            <p style="padding-left: 4%;" class="text-dark h3"> <strong> (<?=$ucv_info['ucv_first_name'];?> <?=$ucv_info['ucv_last_name'];?>) Resume </strong></p>
        </div>
    </div>
    <section id="add-course">
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-auto">
                <div id="lukochuri" class="card-body bg-white">
                    <div class="row  w-100">
                        <div class="col-md-12">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="tab-content b-0 mb-0" data-select2-id="13">
                                    <div class="tab-pane active" id="basic" data-select2-id="basic">
                                        <div class="row justify-content-center" data-select2-id="12">
                                            
                                            <div style="margin-left: 5%;" class="card-body">
                                                <div class="panel" id="main" role="main">
                                                    <div class="panel-body panel-body-02">
                                                        <div class="view-cv-wrapper" style="margin-bottom: 6px;">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                <div class="download-list">
                                                                    <p class="title"> Download: <i style="color: #5390f5; font-size: 20px; margin-top: 10px;" class="fa fa-file-text"></i></p>
                                                                    <ul>
                                                                        <li>
                                                                            <a href="#" onclick="convert_word();ga('send', 'event', 'DowloadCv(bdjobsFormate)', 'click', 'Doc', 1);" title="Word Format" aria-label="Download word format">
                                                                            <i class="icon-ms-word" aria-hidden="true"></i></a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="resume">
                                                            <style>
                                                                /*<!--sony first personal info table--> */
                                                                .box {  
                                                                width:750px;  
                                                                margin:50px;  
                                                                display:table; 
                                                                }  
                                                                .box .box-row {  
                                                                display:table-row;  
                                                                }  
                                                                .box .box-cell {  
                                                                display:table-cell;  
                                                                /*width:33%;*/  
                                                                padding:10px;  
                                                                }  
                                                                .box .box-cell.box1 {  
                                                                /*text-align:justify;*/
                                                                vertical-align:top;
                                                                width:586px; 
                                                                }  
                                                                .box .box-cell.box2 {  
                                                                /*text-align:justify;  */
                                                                width:20px;
                                                                }  
                                                                .box .box-cell.box3 {  
                                                                /*text-align:justify;*/
                                                                width:144px; 
                                                                vertical-align:middle;
                                                                } 
                                                                .box .box-cell.box_new1 {  
                                                                /*text-align:justify;*/
                                                                vertical-align:top;
                                                                width:750px;
                                                                margin:15px 0px 15px 0px;   
                                                                }  
                                                                .box .box-cell.box_new2 {  
                                                                /*text-align:justify;*/
                                                                vertical-align:top;
                                                                width:750px;
                                                                margin:15px 0px 15px 0px;   
                                                                }
                                                            </style>
                                                            <!--<div class="container"> -->
                                                            <div class="box">
                                                                <div class="box-row">
                                                                <div class="box-cell box1">
                                                                    <div class="BDJApplicantsName"><strong><?=$ucv_info['ucv_first_name'];?> <?=$ucv_info['ucv_last_name'];?></strong></div>
                                                                    <div class="BDJNormalText04" style="word-break: break-word;"><strong><?=$ucv_info['ucv_present_address'];?></strong></div>
                                                                    <div class="BDJNormalText04"><strong>Mobile No 1: <?=$ucv_info['ucv_phone'];?></strong></div>
                                                                    <?php
                                                                        if ($ucv_info['ucv_phone_two']) {
                                                                            ?>
                                                                            <div class="BDJNormalText04"><strong>Mobile No 2: <?=$ucv_info['ucv_phone_two'];?></strong></div>
                                                                            <?php
                                                                        }
                                                                    ?>
                                                                    <div class="BDJNormalText04"><strong>E-mail : <?=$ucv_info['ucv_email'];?></strong></div>
                                                                </div>
                                                                <div class="box-cell box2"></div>
                                                                <div class="box-cell box3">  
                                                                    <img style="border: 4px solid #f2dede;" src="dashboard/images/profile_image/<?=$ucv_info['ucv_picture']?>" width="124" height="135" alt="jobseeker photo">
                                                                </div>
                                                                </div>
                                                            </div>

                                                            <div style="padding: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 0px 5px 5px 0px;">
                                                                <strong>Career Objective :</strong>
                                                            </div>
                                                            <table border="0" cellpadding="0" style="margin-top:10px; margin-bottom: 10px;" cellspacing="0" align="center" width="900">
                                                                <th width="900" colspan="5" align="left" class="">
                                                                    <tr>
                                                                        <td><?=$ucv_info['ucv_career_objective'];?></td>
                                                                    </tr>
                                                                </th>
                                                            </table>

                                                            <!-- Educational Requirement checking One -->
                                                            <?php
                                                                if ($ucv_info['ucv_company_name_one']) {
                                                                    ?>
                                                                    <div style="padding: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                        <strong>Employment History :</strong>
                                                                    </div>
                                                                    <table border="0" cellpadding="0" style="margin-top: 10px; margin-bottom:20px;" cellspacing="0" align="center" width="750">
                                                                        <strong>Total Year of Experience :</strong>
                                                                        <!-- 1.3 Year(s) -->
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="22" align="center" style="padding-left:5px;" class="BDJNormalText01">
                                                                                1.
                                                                                </th>
                                                                                <th width="750" colspan="5" align="left" class="BDJBoldText01">
                                                                                    <em>
                                                                                        <?=$ucv_info['ucv_designation_one'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( <?=$ucv_info['ucv_start_period_month_one'];?> - <?=$ucv_info['ucv_end_period_month_one'];?>)
                                                                                    </em>
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" class="BDJHeadline02">&nbsp;</td>
                                                                                <td colspan="5" align="left" class="BDJNormalText01">
                                                                                <!--Company Name:-->
                                                                                <strong>
                                                                                <?=$ucv_info['ucv_company_name_one'];?>
                                                                                </strong>
                                                                                <br>
                                                                                <!--Company Location:-->
                                                                                <strong>Area Expe: </strong> <?=$ucv_info['ucv_exp1_one'];?>, <?=$ucv_info['ucv_exp2_one'];?>, <?=$ucv_info['ucv_exp3_one'];?>
                                                                                <br>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <?php
                                                                }
                                                            ?>

                                                            <!-- Educational Requirement checking Two -->
                                                            <?php
                                                                if ($ucv_info['ucv_company_name_two']) {
                                                                    ?>
                                                                    <div style="padding: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                        <strong>Employment History (2) :</strong>
                                                                    </div>
                                                                    <table border="0" cellpadding="0" style="margin-top: 10px; margin-bottom:20px;" cellspacing="0" align="center" width="750">
                                                                        <strong>Total Year of Experience :</strong>
                                                                        <!-- 1.3 Year(s) -->
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="22" align="center" style="padding-left:5px;" class="BDJNormalText01">
                                                                                1.
                                                                                </th>
                                                                                <th width="750" colspan="5" align="left" class="BDJBoldText01">
                                                                                    <em>
                                                                                        <?=$ucv_info['ucv_designation_two'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ( <?=$ucv_info['ucv_start_period_month_two'];?> - <?=$ucv_info['ucv_end_period_month_two'];?>)
                                                                                    </em>
                                                                                </th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td align="center" class="BDJHeadline02">&nbsp;</td>
                                                                                <td colspan="5" align="left" class="BDJNormalText01">
                                                                                <!--Company Name:-->
                                                                                <strong>
                                                                                <?=$ucv_info['ucv_company_name_two'];?>
                                                                                </strong>
                                                                                <br>
                                                                                <!--Company Location:-->
                                                                                <strong>Area Expe: </strong> <?=$ucv_info['ucv_exp1_two'];?>, <?=$ucv_info['ucv_exp2_two'];?>, <?=$ucv_info['ucv_exp3_two'];?>
                                                                                <br>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <?php
                                                                }
                                                            ?>
                                                                <!----------------------
                                                                    'ACADEMIC QUALIFICATION:
                                                                    ------------------------>
                                                                <style>
                                                                    .aca-wrap {
                                                                    padding: 0px 0px 4px 20px;
                                                                    /*margin: 5px 0px 0px 0px;*/
                                                                    border: 1px solid #e2e2e2;
                                                                    -webkit-border-radius: 6px;
                                                                    -moz-border-radius: 6px;
                                                                    border-radius: 6px;
                                                                    position: relative;
                                                                    background: #fff; 
                                                                    width: 750px;
                                                                    }
                                                                    .academic-t {
                                                                    display: table;
                                                                    width: 750px; 
                                                                    border-bottom:1px solid #e2e2e2;
                                                                    }
                                                                    .academic-t > div 
                                                                    {
                                                                    display: table-cell;
                                                                    /*   border: 1px solid #666666;*/
                                                                    border-right:1px solid #e2e2e2;
                                                                    padding: 3px 0px 2px 0px;
                                                                    vertical-align: top;
                                                                    font-size: 11px;
                                                                    font-family: Verdana, Geneva, sans-serif;
                                                                    text-align: center;
                                                                    }
                                                                    .academic-t:last-child 
                                                                    {
                                                                    border-bottom:none;
                                                                    }
                                                                    /*TBL HEADER*/
                                                                    .ac-title {
                                                                    font-weight: bold;   
                                                                    color: #4c4c4c;
                                                                    }
                                                                    .examNameAC {
                                                                    width: 150px;/*20%*/
                                                                    text-align: center;
                                                                    }
                                                                    .majorSubAC {
                                                                    width: 150px;/*15%*/
                                                                    text-align: left;
                                                                    }
                                                                    .instAC {
                                                                    width: 150px;/*15%*/
                                                                    text-align: left;
                                                                    }
                                                                    .resultAC {
                                                                    width: 70px;/*12.5%*/
                                                                    text-align: center;
                                                                    }
                                                                    .passYearAC {
                                                                    width: 81px;/*12.5%*/
                                                                    text-align: center;
                                                                    }
                                                                    .durationAC {
                                                                    width: 70px;/*12.5%*/
                                                                    text-align: center;
                                                                    }
                                                                    .achievementAC {
                                                                    width: 70px;/*12.5%*/
                                                                    text-align: center;
                                                                    }
                                                                    .achievementAC {
                                                                    border-right:none !important;
                                                                    }
                                                                </style>

                                                                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                <strong>Academic Qualification :</strong>
                                                                </div>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-top: 20px; margin-bottom: 20px; border:1px solid #666666; word-break: break-word;">
                                                                    <tbody>
                                                                        <tr class="BDJNormalText02">
                                                                            <th width="25%" style="border-right:1px solid #666666;text-align:center;"><strong>Exam Title</strong></th>
                                                                            <th width="25%" style="border-right:1px solid #666666;text-align:center;"><strong>Concentration / Major</strong></th>
                                                                            <th width="25%" style="border-right:1px solid #666666;text-align:center;"><strong>Institute</strong></th>
                                                                            <th width="12.5%" style="border-right:1px solid #666666;text-align:center;"><strong>Result</strong></th>
                                                                            <th width="12.5%" style="text-align:center;"><strong>Pas.Year</strong></th>
                                                                        </tr>
                                                                        <?php
                                                                            if ($ucv_info['ucv_edu_level_two']) {
                                                                                ?>
                                                                                <tr class="BDJNormalText02">
                                                                                    <!--Exam Title:-->
                                                                                    <td width="25%" style="border-right:1px solid #666666;border-top:1px solid #666666; text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_degree_two'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Concentration/Major:-->
                                                                                    <td width="25%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_group_two'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Institute:-->
                                                                                    <td width="25%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_Inst_name_two'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Result:-->
                                                                                    <td width="12.5%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    CGPA: <?=$ucv_info['ucv_edu_cgpa_two'];?> <br>out of <?=$ucv_info['ucv_edu_cgpa_scale_two'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Passing Year:-->
                                                                                    <td width="12.5%" style="border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_duration_two'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        ?>

                                                                        <?php
                                                                            if ($ucv_info['ucv_edu_level_one']) {
                                                                                ?>
                                                                                <tr class="BDJNormalText02">
                                                                                    <!--Exam Title:-->
                                                                                    <td width="25%" style="border-right:1px solid #666666;border-top:1px solid #666666; text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_degree_one'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Concentration/Major:-->
                                                                                    <td width="25%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_group_one'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Institute:-->
                                                                                    <td width="25%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_Inst_name_one'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Result:-->
                                                                                    <td width="12.5%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    CGPA: <?=$ucv_info['ucv_edu_cgpa_one'];?> <br>out of <?=$ucv_info['ucv_edu_cgpa_scale_one'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                    <!--Passing Year:-->
                                                                                    <td width="12.5%" style="border-top:1px solid #666666;text-align:center;font-weight:normal;">
                                                                                    <?=$ucv_info['ucv_edu_duration_one'];?>
                                                                                    &nbsp;
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                                <!-------------------------------
                                                                    Training Summary
                                                                    -------------------------------->
                                                                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                    <strong>Training Summary :</strong>
                                                                </div>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-top: 20px; margin-bottom: 20px; border:1px solid #666666; word-break: break-word;">
                                                                    <tbody>
                                                                        <tr class="BDJNormalText02">
                                                                            <th width="19%" style="border-right:1px solid #666666; text-align:center;"><strong>Training Title</strong></th>
                                                                            <th width="18%" style="border-right:1px solid #666666; text-align:center;"><strong>Topic</strong></th>
                                                                            <th width="15%" style="border-right:1px solid #666666; text-align:center;"><strong>Institute</strong></th>
                                                                            <th width="15%" style="border-right:1px solid #666666; text-align:center;"><strong>Country</strong></th>
                                                                            <th width="15%" style="border-right:1px solid #666666; text-align:center;"><strong>Location</strong></th>
                                                                            <th width="2%" style="border-right:1px solid #666666; text-align:center;"><strong>Year</strong></th>
                                                                            <th width="16%" style="text-align:center;"><strong>Duration</strong></th>
                                                                        </tr>
                                                                        <?php
                                                                            if ($ucv_info['ucv_edu_level_one']) {
                                                                            ?>
                                                                            <tr class="BDJNormalText02">
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666; text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_designation_one']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666; padding-left:1px; text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_exp1_one']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_company_name_one']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_nationality']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_nationality']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="10%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_edu_duration_one']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_edu_duration_one']?>
                                                                                &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                            }
                                                                        ?>

                                                                        <?php
                                                                            if ($ucv_info['ucv_edu_level_two']) {
                                                                            ?>
                                                                            <tr class="BDJNormalText02">
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666; text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_designation_two']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666; padding-left:1px; text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_exp1_two']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_company_name_two']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_nationality']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_nationality']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="10%" style="border-right:1px solid #666666;border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_edu_duration_two']?>
                                                                                &nbsp;
                                                                                </td>
                                                                                <td width="15%" style="border-top:1px solid #666666;text-align:center; font-weight:normal;">
                                                                                <?=$ucv_info['ucv_edu_duration_two']?>
                                                                                &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                            }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
                                                                <!--------------------------
                                                                    CAREER AND APPLICATION INFORMATION:
                                                                    ------------------------------------>
                                                                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                    <strong>Career and Application Information :</strong>
                                                                </div>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="800">
                                                                    <!--Preferred Job Category:-->
                                                                    <tbody>
                                                                        <tr class="BDJNormalText03">
                                                                            <th width="32%" style="padding-left:5px; font-weight:normal; text-align:left;">Preferred Job skill</th>
                                                                            <th width="4%" style="font-weight:normal; text-align:center;">:</th>
                                                                            <th width="64%" style="font-weight:normal; text-align:left;"><?=$ucv_info['ucv_skill_one']?>, <?=$ucv_info['ucv_skill_two']?>,<?=$ucv_info['ucv_skill_three']?>,<?=$ucv_info['ucv_skill_four']?>,<?=$ucv_info['ucv_skill_five']?>, <?=$ucv_info['ucv_skill_six']?></th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top: 10px; margin-bottom: 10px;">
                                                                    <caption class="sr-only">Specialization table</caption>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th colspan="6" class="BDJHeadline0001"><span class="sr-only">Specialization table</span></th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px;" class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                    <strong>Specialization :</strong>
                                                                </div>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="border:1px solid #666666;word-break: break-word;">
                                                                    <tbody>
                                                                        <tr>
                                                                        <th width="40%" class="BDJNormalText02" style="border-bottom:1px solid #666666;text-align:center;">
                                                                            <strong>Fields of Specialization</strong>
                                                                        </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="50%" class="BDJNormalText03">
                                                                                <ul>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_exp1_one']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_exp2_one']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_exp3_one']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_exp1_two']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_exp2_two']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_exp3_two']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_edu_achieve_two']?></li>
                                                                                    <li style="margin-left: 20px;"> <?=$ucv_info['ucv_edu_achieve_one']?>.</li>
                                                                                </ul>
                                                                            <br> 
                                                                            &nbsp;
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px; " class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                    <strong>Language Proficiency :</strong>
                                                                </div>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style=" margin-top: 20px; margin-bottom: 20px; border:1px solid #666666">
                                                                    <tbody>
                                                                        <tr class="BDJNormalText02">
                                                                            <th width="25%" style="border-right:1px solid #666666;text-align:center;"><strong>Language</strong></th>
                                                                            <th width="25%" style="border-right:1px solid #666666;text-align:center;"><strong>Reading</strong></th>
                                                                            <th width="25%" style="border-right:1px solid #666666;text-align:center;"><strong>Writing</strong></th>
                                                                            <th width="25%" style="text-align:center;"><strong>Speaking</strong></th>
                                                                        </tr>
                                                                        <tr class="BDJNormalText02">
                                                                            <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">Bangla&nbsp;</td>
                                                                            <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">High&nbsp;</td>
                                                                            <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">High&nbsp;</td>
                                                                            <td width="25%" align="center" style="border-top:1px solid #666666;">High&nbsp;</td>
                                                                        </tr>
                                                                        <tr class="BDJNormalText02">
                                                                            <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">English&nbsp;</td>
                                                                            <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">High&nbsp;</td>
                                                                            <td width="25%" align="center" style="border-right:1px solid #666666;border-top:1px solid #666666;">Medium&nbsp;</td>
                                                                            <td width="25%" align="center" style="border-top:1px solid #666666;">Medium&nbsp;</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="900" style="margin-top:3px;">
                                                                    <caption class="sr-only">Personal Details table</caption>
                                                                </table>
                                                                <div style="padding: 10px; margin-top: 10px; margin-bottom: 10px; " class="bg-info" role="heading" aria-level="2" style="text-align:left;margin: 10px 15px 5px 0px;">
                                                                    <strong>Personal Details :</strong>
                                                                </div>
                                                                <table border="0" cellpadding="0" cellspacing="0" align="center" width="750" style="margin-top: 20px; margin-bottom: 20px; word-break: break-word;">
                                                                    <!--Fathers Name:-->
                                                                    <tbody>
                                                                        <tr class="BDJNormalText03">
                                                                            <th width="22%" style="padding-left:5px; font-weight:normal; text-align:left;">Father's Name </th>
                                                                            <th width="2%" style="font-weight:normal; text-align:center;">:</th>
                                                                            <th width="76%" style="font-weight:normal; text-align:left;"> <?=$ucv_info['ucv_father_name']?> </th>
                                                                        </tr>
                                                                        <!--Mothers Name:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Mother's Name </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            <?=$ucv_info['ucv_mother_name']?>
                                                                            </td>
                                                                        </tr>
                                                                        <!--Date of Birth:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Date of Birth</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            <?=$ucv_info['ucv_dofb_month']?>
                                                                            </td>
                                                                        </tr>
                                                                        <!--Gender:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Gender</td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            <?=$ucv_info['ucv_gender']?>
                                                                            </td>
                                                                        </tr>
                                                                        <!--Marital Status:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td width="22%" align="left" style="padding-left:5px;">Marital Status </td>
                                                                            <td width="2%" align="center">:</td>
                                                                            <td width="76%" align="left">
                                                                            <?=$ucv_info['ucv_marital_status']?>
                                                                            </td>
                                                                        </tr>
                                                                        <!--Nationality:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Nationality</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            <?=$ucv_info['ucv_nationality']?>
                                                                            </td>
                                                                        </tr>
                                                                        <?php
                                                                        if ($ucv_info['ucv_national_id']) {
                                                                            ?>
                                                                            <tr class="BDJNormalText03">
                                                                                <td align="left" style="padding-left:5px;">National Id No.</td>
                                                                                <td align="center">:</td>
                                                                                <td align="left">
                                                                                <?=$ucv_info['ucv_national_id']?>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                        <tr class="BDJNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Religion</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            <?=$ucv_info['ucv_religion']?>
                                                                            </td>
                                                                        </tr>
                                                                        <!-- Passport No -->
                                                                        <!-- Passport Issue Date -->
                                                                        <!--Permanent Address:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Permanent Address</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            <?=$ucv_info['ucv_permanent_address']?>
                                                                            </td>
                                                                        </tr>
                                                                        <!--Current Location:-->
                                                                        <tr class="BDJNormalText03">
                                                                            <td align="left" style="padding-left:5px;">Current Location</td>
                                                                            <td align="center">:</td>
                                                                            <td align="left">
                                                                            <?=$ucv_info['ucv_present_address']?>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>

                                                                <center>
                                                                    <div id="divCopyRight" class="BDJCopyRight" style="border-top:1px solid #999999; width:595px;">
                                                                    </div>
                                                                </center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div> <!-- end col -->
                                    </div> <!-- end row -->
                                </div> <!-- end tab pane -->
                            </div>
                        </form>
                    </div>

                    </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <!--Inner Content End--> 
    <div class="row">
    </div>
</div>
</div>
<?php
    include('footer.php');
?>