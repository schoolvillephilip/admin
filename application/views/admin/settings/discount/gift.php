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
                    <h1 class="page-header text-overflow">Gift Cards</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Discount Options</a></li>
                    <li class="active">Gift Cards</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Gift Cards</h3>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="gc_name">Gift Card Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="gc_name" class="form-control" placeholder="Enter Name">
                                    <small class="help-block">Enter the name you want to call the gift card</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Display Image</label>
                                <div class="col-md-9">
					                        <span class="pull-left btn btn-primary btn-file">
					                        Browse... <input type="file">
					                        </span>
                                    <small class="help-block">Select gift card image</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="gc_value">Value &#8358;</label>
                                <div class="col-md-9">
                                    <input type="text" id="gc_value" class="form-control" placeholder="0.00">
                                    <small class="help-block">Enter the value you want for the gift card</small>
                                </div>
                            </div>
                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Enabled</label>
                                <div class="col-md-9">
                                    <div class="radio">

                                        <!-- Inline radio buttons -->
                                        <input id="enable_radio" class="magic-radio" type="radio" name="enabled_radio" checked>
                                        <label for="enable_radio">Yes</label>

                                        <input id="enable_radio-2" class="magic-radio" type="radio" name="enabled_radio">
                                        <label for="enable_radio-2">No</label>

                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer text-center">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>

                        <div class="panel" style="margin-top: 40px;">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Gift Cards</h3>
                            </div>
                            <div class="panel-body">
                            </div>

                    </div>
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
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <?php $this->load->view('templates/scripts'); ?>
</body>
</html>
