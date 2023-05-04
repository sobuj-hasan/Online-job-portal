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
                                            

                                            </div>
                                        
										