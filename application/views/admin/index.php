<?php include('includes/header.php')?>
<?php include('includes/sidebar.php')?>
                        <!-- start page title -->
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                        <?php echo $this->session->flashdata('success');?>
                        <?php echo $this->session->flashdata('error'); ?>
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Sports Category</span>
                                                <h4 class="mb-3">
                                                    <span class="counter-value" data-target="4"><?=($total_sports)?$total_sports:'0'?></span>
                                                </h4>
                                            </div>
                                            <div class="col-4">
                                                <div id="mini-chart1" data-colors='["#C22424"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                       
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Number of Players</span>
                                                <h4 class="mb-3">
                                                    <span data-target="100"><?=($total_players)?$total_players:'0'?></span>
                                                </h4>
                                            </div>
                                            <div class="col-4">
                                                <div id="mini-chart2" data-colors='["#C22424"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col-->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Total Team</span>
                                                <h4 class="mb-3">
                                                    <span  data-target="10"><?=($total_team)?$total_team:'0'?></span>
                                                </h4>
                                            </div>
                                            <div class="col-4">
                                                <div id="mini-chart3" data-colors='["#C22424"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                       
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
        
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-h-100">
                                    <!-- card body -->
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Active Tournament</span>
                                                <h4 class="mb-3">
                                                    <span data-target="15"><?=($total_tournament)?$total_tournament:'0'?></span>
                                                </h4>
                                            </div>
                                            <div class="col-4">
                                                <div id="mini-chart4" data-colors='["#C22424"]' class="apex-charts mb-2"></div>
                                            </div>
                                        </div>
                                     
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->    
                        </div><!-- end row-->
                         <!-- dashboard init -->
        <!--<script src="<?= base_url()?>assets/js/pages/dashboard.init.js"></script>-->
<?php include('includes/footer.php')?>
                  