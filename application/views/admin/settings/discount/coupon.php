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
                    <h1 class="page-header text-overflow">Discount Coupons</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Discount Options</a></li>
                    <li class="active">Coupons</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Discount Coupons</h3>
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="cp_name">Coupon Name</label>
                                <div class="col-md-9">
                                    <input type="text" id="cp_name" class="form-control" placeholder="Enter Name">
                                    <small class="help-block">Enter the name you want to call the coupon</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="cp_code">Coupon Code</label>
                                <div class="col-md-9">
                                    <input type="text" id="cp_code" class="form-control" placeholder="Enter Code">
                                    <small class="help-block">Enter the code of the coupon</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="cp_discount">Discount &#8358;</label>
                                <div class="col-md-9">
                                    <input type="text" id="cp_discount" class="form-control" placeholder="0.00">
                                    <small class="help-block">Enter the discount on the sales</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="cp_usage">Number of Usage</label>
                                <div class="col-md-9">
                                    <input type="number" id="cp_usage" class="form-control" placeholder="1">
                                    <small class="help-block">Enter number of times coupon can be used</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="cp_exp">Expiry Dates</label>
                                <div class="col-md-9">
                                    <input type="date" id="cp_exp" class="form-control" placeholder="Select Expiry Date">
                                    <small class="help-block">Select expiry date of coupon</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="cp_min">Min Spend Amount &#8358;</label>
                                <div class="col-md-9">
                                    <input type="text" id="cp_min" class="form-control" placeholder="0.00">
                                    <small class="help-block">Enter the minimum cart price to be able to use coupon</small>
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
                                <h3 class="panel-title">Restrict to Categories</h3>
                            </div>
                            <div class="panel-body">
                                Loops out all categories
                                <div class="form-group pad-ver">
                                        <!-- Checkboxes -->
                                        <div class="checkbox">
                                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" >
                                            <label for="demo-form-checkbox">Electronics</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="demo-form-checkbox-2" class="magic-checkbox" type="checkbox">
                                            <label for="demo-form-checkbox-2">Fashion</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="demo-form-checkbox-3" class="magic-checkbox" type="checkbox">
                                            <label for="demo-form-checkbox-3">Real Estate</label>
                                        </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="panel" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Discount Coupons</h3>
                    </div>
                    <div class="panel-body">
                    </div>

                </div>
                <!--===================================================-->
                <!--End page content-->

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
        </button></div>
        <!--===================================================-->
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->
    <!--JAVASCRIPT-->
    <!--=================================================-->


    <?php $this->load->view('templates/scripts'); ?>
</body>
</html>
