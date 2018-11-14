<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">
        
        <!--NAVBAR-->
        <!--===================================================-->
        <?php $this->load->view('templates/head_navbar'); ?>
        <!--===================================================-->
        <!--END NAVBAR-->

        <div class="boxed">

            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">Admin Overview</h1>
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Breadcrumb-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="demo-pli-home"></i></a></li>
                        <li><a href="#">Dashboard</a></li>
                        <li class="active">Overview</li>
                    </ol>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End breadcrumb-->
                </div>
                <!--Page content-->
                <!--===================================================-->

                <div id="page-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="panel panel-bordered-info panel-colorful media middle pad-all">
                                <div class="media-left">
                                    <div class="pad-hor">
                                        <i class="demo-psi-cart-coin icon-3x"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold">241</p>
                                    <p class="mar-no">Orders</p>
                                    <!--Sparkline pie chart -->
                                    <div>
                                        <div class="pad-all">
                                            <p class="mar-no">
                                                <span class="pull-right text-bold">34</span> Completed
                                            </p>
                                            <p class="mar-no">
                                                <span class="pull-right text-bold">79</span> Total
                                            </p>
                                        </div>
                                        <div class="pad-all">
                                            <div class="pad-btm">
                                                <div class="progress progress-sm">
                                                    <div style="width: 45%;" class="progress-bar progress-bar-info">
                                                        <span class="sr-only">45%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pad-btm">
                                                <div class="progress progress-sm">
                                                    <div style="width: 89%;" class="progress-bar progress-bar-info">
                                                        <span class="sr-only">89%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-bordered-mint panel-colorful media middle pad-all">
                                <div class="media-left">
                                    <div class="pad-hor">
                                        <i class="demo-psi-credit-card-2 icon-3x"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold">2841</p>
                                    <p class="mar-no">Sales</p>
                                    <!--Sparkline pie chart -->
                                    <div>
                                        <div class="pad-all">
                                            <p class="mar-no">
                                                <span class="pull-right text-bold">34</span> Completed
                                            </p>
                                            <p class="mar-no">
                                                <span class="pull-right text-bold">79</span> Total
                                            </p>
                                        </div>
                                        <div class="pad-all">
                                            <div class="pad-btm">
                                                <div class="progress progress-sm">
                                                    <div style="width: 45%;" class="progress-bar progress-bar-mint">
                                                        <span class="sr-only">45%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pad-btm">
                                                <div class="progress progress-sm">
                                                    <div style="width: 89%;" class="progress-bar progress-bar-mint">
                                                        <span class="sr-only">89%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-bordered-purple panel-colorful media middle pad-all">
                                <div class="media-left">
                                    <div class="pad-hor">
                                        <i class="demo-psi-refresh icon-3x"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <p class="text-2x mar-no text-semibold">1</p>
                                    <p class="mar-no">Disputes</p>
                                    <!--Sparkline pie chart -->
                                    <div>
                                        <div class="pad-all">
                                            <p class="mar-no">
                                                <span class="pull-right text-bold">34</span> Completed
                                            </p>
                                            <p class="mar-no">
                                                <span class="pull-right text-bold">79</span> Total
                                            </p>
                                        </div>
                                        <div class="pad-all">
                                            <div class="pad-btm">
                                                <div class="progress progress-sm">
                                                    <div style="width: 45%;" class="progress-bar progress-bar-purple">
                                                        <span class="sr-only">45%</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pad-btm">
                                                <div class="progress progress-sm">
                                                    <div style="width: 89%;" class="progress-bar progress-bar-purple">
                                                        <span class="sr-only">89%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>
            <!--===================================================-->
            <!--END CONTENT CONTAINER-->



            <!--ASIDE-->
            <!--===================================================-->
            <?php $this->load->view('templates/aside_menu'); ?>
            <!--===================================================-->
            <!--END ASIDE-->

            <!--MAIN NAVIGATION-->
            <!--===================================================-->
            <?php $this->load->view('templates/menu'); ?>
            <!--===================================================-->
            <!--END MAIN NAVIGATION-->

        </div>


        <!-- FOOTER -->
        <!--===================================================-->
        <?php $this->load->view('templates/footer'); ?>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL PAGE BUTTON -->
        <!--===================================================-->
        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <?php $this->load->view('templates/scripts'); ?>
</body>

</html>
