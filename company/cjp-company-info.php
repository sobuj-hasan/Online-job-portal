<?php 
include ('header.php');

$cmp_author_id = $_SESSION['snm_ejob_cmp_id'];
$cmp_jp_token = $_GET['token'];

    $select_query = "SELECT * FROM company_jp WHERE cjp_token = '$cmp_jp_token'";
    $cjp_info = mysqli_fetch_assoc(mysqli_query($np2con, $select_query));

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
    <div class="col-md-12 col-sm-12 grid-margin stretch-card">
    <!--Inner Content start-->
        <div class="container" id="main">
            
            <?php
                if(isset($_POST['submit'])){
                    $cmpi_cmp_name = htmlspecialchars($_POST['cmpi_cmp_name']);
                    $cmpi_cmp_add = htmlspecialchars($_POST['cmpi_cmp_add']);
                    $cmpi_cmp_type = htmlspecialchars($_POST['cmpi_cmp_type']);
                    $cmpi_cmp_bussiness = htmlspecialchars($_POST['cmpi_cmp_bussiness']);
            
                    $update_cjp = "UPDATE `company_jp` SET `cmpi_cmp_name`='$cmpi_cmp_name',`cmpi_cmp_add`='$cmpi_cmp_add',`cmpi_cmp_type`= '$cmpi_cmp_type',`cmpi_cmp_bussiness`='$cmpi_cmp_bussiness' WHERE cjp_token = '$cmp_jp_token'";
                    if(mysqli_query($np2con, $update_cjp)){
                        echo gen_notification('Successfully Save This information Please fillup next form', 'success');
                        echo reloader('company/cjp-preview-info.php',2500);
                        
                    }
                    else {
                        echo gen_notification('This information save failed, Send currect information tray again','danger');
                    }
                    
                    $cjp_personal_info = mysqli_query($np2con, $update_cjp);
                    header('location: cjp-preview.php');
                }
            ?>
            
            <div style="text-align: left;" class="language-selection">
                Company Information
            </div>
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                <div class="alert-warning bg-transparent text-right pt-10 mb-10" role="alert" style="" id="HideDivForBang">
                </div>
                <!-- Progress bar Steps -->
                <?php
                    include ('cjp-progress-bar.php');
                ?>
                <h3 class="text-blue mb-40" id="pHead">Company Information</h3>

                <form action="" method="POST" enctype="">
                    <div class="card-content">
                        <h4 class="form-subhead">Information Visibility</h4>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Company Name&nbsp;<i class="icon-question text-grey" data-container="body" data-toggle="popover" data-placement="top" data-content="If you hide company name then<br>alternative one should be written.<br>Would you like to make visible your company" s="" name="" to="" job="" data-trigger="hover" data-original-title="" title=""></i></label>
                            <div class="col-md-7">
                                <label class="switch switch-s-2 mb-20 ">
                                    <span class="sr-only">Company Name</span>
                                        <input type="checkbox" class="switch-input" name="cmpi_cmp_name" value="1" checked="checked">
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Company Address&nbsp;<i class="icon-question text-grey" data-container="body" data-toggle="popover" data-placement="top" data-content="Your company address will not be visible to job seekers if you choose &quot;hide&quot;." data-trigger="hover" data-original-title="" title=""></i></label>
                            <div class="col-md-7">
                                <label class="switch switch-s-2 mb-20 ">
                                    <span class="sr-only">Company Address</span>
                                        <input type="checkbox" class="switch-input" name="cmpi_cmp_add" value="1" checked="checked">
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Company Industry Type</label>
                            <div class="col-md-7">
                                <select aria-label="Company Industry Type" name="cmpi_cmp_type" class="form-control form-control-s-1" id="companyindustry">
                                     <!--industry: 16-->
                                     <option value="">Select Company Type</option>
                                     <option value="Software Company">Software Company</option>
                                     <option value="Agro based Industry">Agro based Industry</option>
                                     <option value="Airline/ Travel/ Tourism">Airline/ Travel/ Tourism </option>
                                     <option value="Architecture/ Engineering/ Construction">Architecture/ Engineering/ Construction</option>
                                     <option value="Automobile/Industrial Machine">Automobile/Industrial Machine</option>
                                     <option value="Bank/ Non-Bank Fin. Institution">Bank/ Non-Bank Fin. Institution</option>
                                     <option value="Education">Education</option>
                                     <option value="Electronics/ Consumer Durables">Electronics/ Consumer Durables</option>
                                     <option value="Energy/ Power/ Fuel">Energy/ Power/ Fuel</option>
                                     <option value="Entertainment/ Recreation">Entertainment/ Recreation</option>
                                     <option value="Fire, Safety Protection">Fire, Safety &amp; Protection</option>
                                     <option value="Food Beverage Industry">Food &amp; Beverage Industry</option>
                                     <option value="Garments/ Textile">Garments/ Textile</option>
                                     <option value="Govt./ Semi-Govt./ Autonomous">Govt./ Semi-Govt./ Autonomous</option>
                                     <option value="Hospital/ Diagnostic Center">Hospital/ Diagnostic Center </option>
                                     <option value="Hotel/Restaurant">Hotel/Restaurant</option>
                                     <option value="Information Technology (IT)">Information Technology (IT)</option>
                                     <option value="Logistics/ Transportation">Logistics/ Transportation</option>
                                     <option value="Manufacturing (Heavy Industry)">Manufacturing (Heavy Industry)</option>
                                     <option value="Manufacturing (Light Industry)">Manufacturing (Light Industry) </option>
                                     <option value="Media (Satellite/ Print/ Online)/ Advertising/ Event Mgt.">Media (Satellite/ Print/ Online)/ Advertising/ Event Mgt.</option>
                                     <option value="NGO/Development">NGO/Development</option>
                                     <option value="Pharmaceuticals">Pharmaceuticals</option>
                                     <option value="Real Estate/ Development">Real Estate/ Development</option>
                                     <option value="Security Service">Security Service</option>
                                     <option value="Telecommunication">Telecommunication</option>
                                     <option value="Wholesale/ Retail/ Export-Import">Wholesale/ Retail/ Export-Import</option>
                                     <option value="Others">Others</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-20">
                            <label class="col-md-3 col-form-label">Company Business&nbsp;<i class="icon-question text-grey" data-container="body" data-toggle="popover" data-placement="top" data-content="Your company business will not be visible to job seekers if you choose &quot;hide&quot;." data-trigger="hover" data-original-title="" title=""></i></label>
                            <div class="col-md-7">
                                <label class="switch switch-s-2 mb-20 ">
                                    <span class="sr-only">Company Business</span>
                                        <input type="checkbox" class="switch-input" name="cmpi_cmp_bussiness" value="1" checked="checked">
                                        <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                
                                <div class="col-md-12">
                                    <div class="divider s-2 mb-30 mt-20"></div>
                                </div>

                                <div class="col-md-4 col-md-pull-8">
                                    <div class="btn-left">
                                        <a href="cjp-require-info.php" class="btn btn-danger btn-lg"> Back </a>
                                    </div>
                                </div>
                    
                                <div class="col-md-8 col-md-push-4">
                                    <div class="btn-group-right">
                                        <button type="submit" name="submit" class="btn btn-info btn-lg step2draft" actionval="1"> Save & Continue </button>
                                        <!-- <button type="submit" name="submit" style="background: #b1318e; color: white;" class="btn btn-lg step2" actionval="0">&nbsp;Continue<i class="icon-angle-right icon-small"><span style="display:none;">Continue</span></i></button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!--Inner Content End--> 
    </div>
    <div class="row">
    </div>
</div>
</div>
</div>
<?php include ('footer.php'); ?>