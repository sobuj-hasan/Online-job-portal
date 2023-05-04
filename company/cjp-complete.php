<?php include ('header.php');?>
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
            <div style="text-align: left;" class="language-selection">
                dsdfjsda
            </div>
            <div class="main-wrapper style-1" style="border-radius: 0px 0px 4px 4px; border-top: none;" role="main">
                <div class="alert-warning bg-transparent text-right pt-10 mb-10" role="alert" style="" id="HideDivForBang">
                </div>
                <!-- Progress bar Steps -->
                <?php
                    include ('cjp-progress-bar.php');
                ?>
                
                <div class="row">
                    <div class="col-md-10 m-auto pt-5">
                        <h4 class="text-center text-info">Job has been posted successfully yet waiting for approval.</h4>
                        <p class="text-center">The job will be live after you complete the payment procedure. If you need any help regarding the payment procedure, please contact to the sales manager (mentioned below) or customer support.</p>
                        <div class="status text-center">
                           <h6>Job Status: <span class="badge badge-warning p-2">Pending</span></h6> 
                        </div>
                        <div class="text-center pt-4">
                            <a class="btn btn-outline-light text-dark" href="cjp-preview.php">View Job</a>
                        </div>
                        <div class="text-center pt-4">
                            <div class="alert alert-success">
                                <p text-light><strong>Customer support:  09612444888</strong></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <!--Inner Content End--> 
    </div>
    <div class="row">
    </div>
</div>
<?php     ?>