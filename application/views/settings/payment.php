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
                    <h1 class="page-header text-overflow">Payment Methods</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Store Settings</a></li>
                    <li class="active">Payment Methods</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Payment Methods</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="panel panel-bordered-default">
                                <div class="panel-body">
                                    <b>Interswitch API</b><br><br>
                                    <i class="fa fa-times fa-fw"></i> Disabled
                                </div>
                                <div class="panel-footer">
                                    <a href="javascript:;" onclick="window.open(this);return false"><i
                                                class="fa fa-desktop fa-fw"></i></a>
                                    <a href="javascript:;" onclick="window.open(this);return false"><i
                                                class="fa fa-book fa-fw"></i></a>
                                    <a href="javascript:;"><i class="fa fa-cog fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-bordered-default">
                                <div class="panel-body">
                                    <b>Pay on Delivery</b><br><br>
                                    <i class="fa fa-check fa-fw"></i> Enabled
                                </div>
                                <div class="panel-footer">
                                    <a href="javascript:;" onclick="window.open(this);return false"><i
                                                class="fa fa-desktop fa-fw"></i></a>
                                    <a href="javascript:;" onclick="window.open(this);return false"><i
                                                class="fa fa-book fa-fw"></i></a>
                                    <a href="javascript:;"><i class="fa fa-cog fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-bordered-default">
                                <div class="panel-body">
                                    <b>Pay Stack</b><br><br>
                                    <i class="fa fa-times fa-fw"></i> Disabled
                                </div>
                                <div class="panel-footer">
                                    <a href="javascript:;" onclick="window.open(this);return false"><i
                                                class="fa fa-desktop fa-fw"></i></a>
                                    <a href="javascript:;" onclick="window.open(this);return false"><i
                                                class="fa fa-book fa-fw"></i></a>
                                    <a href="javascript:;"><i class="fa fa-cog fa-fw"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->

            </div>


        </div>

    </div>
    <!--MAIN NAVIGATION-->
    <!--===================================================-->
    <?php $this->load->view('templates/menu'); ?>
    <!--===================================================-->
    <!--END MAIN NAVIGATION-->

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
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->
</div>

<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
