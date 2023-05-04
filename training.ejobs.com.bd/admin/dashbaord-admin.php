<?php include('admin-functions.php') ?>
 <div class="row">
     <?php include('part-awerd.php'); ?>
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-tack-pin bg-c-blue card1-icon"></i>
                                                        <span class="text-c-blue f-w-600">Today Admission</span>
                                                        <h4><?php echo $stadm_today = student_count_author($_SESSION['ejb_user_id'],'today_admission') ;
													//$stadm_today_persent = round($stadm_today*100/$stmax);
													?></h4>
                                                        <div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-opposite bg-c-pink card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Today Form</span>
                                                        <h4><?php echo $stadm_today_form = student_count_author($_SESSION['ejb_user_id'],'today_form') ;
													//$stadm_today_form_persent = round($stadm_today_form*100/$stmax);
													?></h4>
                                                        <div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
											<!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-money bg-c-green card1-icon"></i>
                                                        <span class="text-c-pink f-w-600">Monthly Admission</span>
                                                        <h4><?php echo $stadm_today_form = student_count_author($_SESSION['ejb_user_id'],'admission_this_month') ;
													//$stadm_today_form_persent = round($stadm_today_form*100/$stmax);
													?></h4>
                                                        <div>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                         
                                            <!-- card1 start -->
                                            <div class="col-md-6 col-xl-3">
                                                <div class="card widget-card-1">
                                                    <div class="card-block-small">
                                                        <i class="icofont icofont-cubes bg-c-blue card1-icon"></i>
                                                        <span class="text-c-yellow f-w-600">TOTAL Adm:</span>
                                                        <h4><?php echo  $stadm_tot_adm = student_count_author($_SESSION['ejb_user_id'],'all') ;
													//$stadm_tot_adm_persent = round($stadm_tot_adm*100/$stmax);
													?></h4>
                                                        <div>
                                                          
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- card1 end -->
                                            <!-- Statestics Start -->
                                            <div class="col-md-12 col-xl-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Statestics</h5>
                                                        <div class="card-header-left ">
                                                        </div>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option">
                                                                <li><i class="icofont icofont-simple-left "></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div id="statestics-chart" style="height:517px;"></div>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-md-12 col-xl-4">
                                                    <div class="card fb-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-ui-calendar"></i>
                                                            <div class="d-inline-block">
                                                                <h5>Monthly Reports</h5>
                                                                <span>PRV.VS</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                                <div class="col-6 b-r-default">
                                                                    <h2><?php echo  number_format(payment_collection('monthly_collection'), 0, '.', ',')?></h2>
                                                                    <p class="text-muted">This Month COL</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h2>000</h2>
                                                                    <p class="text-muted">Last Month ADM</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card dribble-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-mastercard"></i>
                                                            <div class="d-inline-block">
                                                                <h5>Today Collection</h5>
                                                                <span>Stats</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                                <div class="col-6 b-r-default">
                                                                    <h2><?php echo number_format(payment_collection('today_Collection'), 0, '.', ',')?></h2>
                                                                    <p class="text-muted"><?php echo date("l")?></p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h2>000</h2>
                                                                    <p class="text-muted">Yasterday</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card twitter-card">
                                                        <div class="card-header">
                                                            <i class="icofont icofont-focus"></i>
                                                            <div class="d-inline-block">
                                                                <h5>Certified Student</h5>
                                                                <span>Total</span>
                                                            </div>
                                                        </div>
                                                        <div class="card-block text-center">
                                                            <div class="row">
                                                                <div class="col-6 b-r-default">
                                                                    <h2>000</h2>
                                                                    <p class="text-muted">Certified Student</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <h2>000</h2>
                                                                    <p class="text-muted">Total Student</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                           
                                            <!-- Email Sent End -->

                                            </div>
                                        
										