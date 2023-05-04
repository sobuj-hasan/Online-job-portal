<?php include('header.php') ?>

  <body>
    <!-- Pre-loader start -->

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <?php include('top-nav.php') ?>
			
			<div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                       <?php include('sidebar.php') ?>

					
					<div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    
									
									<div class="page-body">
                                       
									<?php
									/// admin 
									if($di_stf_desiganation == 5){
									include('dashbaord-admin.php');	
									}
									/// elles vi
									if($di_stf_desiganation == 11){
									include('dashbaord-elhsn.php');	
									}
									/// cro
									if($di_stf_desiganation == 4 ){
									include('dashbaord-cro.php');	
									}
									?>											
									</div>
										
										
										
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        </div>

   <?php include('footer.php') ?>