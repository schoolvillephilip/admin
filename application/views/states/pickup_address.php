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
                    <h1 class="page-header text-overflow">Pickup Address</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Shipping</a></li>
                    <li class="active">Pickup Address</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Pickup Address</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_name">Store Title</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_name" class="form-control" placeholder="Enter Title">
                                    <small class="help-block">Enter the title of the pickup location</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_phones">Phones of Store Workers</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_phones" class="form-control" placeholder="Enter Phones">
                                    <small class="help-block">Enter the phone numbers of workers separated by a comma(,)</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_mails">Emails of Store Workers</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_mails" class="form-control" placeholder="Enter Emails">
                                    <small class="help-block">Enter the emails of workers separated by a comma(,)</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="pka_add">Store Address</label>
                                <div class="col-md-9">
                                    <input type="text" id="pka_add" class="form-control" placeholder="Enter Address">
                                    <small class="help-block">Enter the pickup location address in full</small>
                                </div>
                            </div>
                            <div class="form-group pad-ver">
                                <label class="col-md-3 control-label">Pickup Location Enabled</label>
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
                    </div>
                </div>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Pickup Addresses</h3>
                    </div>
                    <div class="panel-body">
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
