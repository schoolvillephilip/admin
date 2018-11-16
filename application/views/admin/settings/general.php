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
                    <h1 class="page-header text-overflow">General Settings</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="active">General</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">General Site Settings</h3>
                    </div>
                    <form class="panel-body form-horizontal">
                        <!--Text Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="meta_key">Default Meta Keywords</label>
                            <div class="col-md-9">
                                <input type="text" id="meta_key" class="form-control" placeholder="Meta Keywords">
                                <small class="help-block">Enter the default meta keywords</small>
                            </div>
                        </div>
                        <!--Text Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="meta_desc">Default Meta Description</label>
                            <div class="col-md-9">
                                <input type="text" id="meta_desc" class="form-control" placeholder="Meta Description">
                                <small class="help-block">Enter the default meta descriptions</small>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="lang">Default
                                Language</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-live-search="true" data-width="100%" name="lang">
                                    <option>English</option>
                                    <option>French</option>
                                    <option>Spanish</option>
                                    <option>Yoruba</option>
                                    <option>Igbo</option>
                                    <option>Hausa</option>
                                </select>

                                <small class="help-block">Select the default site language</small>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="color">Default
                                Color Theme</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-live-search="true" data-width="100%" name="color">
                                    <option>Mint</option>
                                    <option>Teal</option>
                                    <option>Green</option>
                                    <option>Dark</option>
                                    <option>Pink</option>
                                </select>
                                <small class="help-block">Select the default site color</small>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="invoice_no">Minimum Invoice
                                No
                                Digits</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-width="100%" name="invoice_no">
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                </select>
                                <small class="help-block">Select the minimum invoice digit length</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="socials">
                                Social Links
                            </label>
                            <div class="col-md-9">
                                <div class="row" style="padding-left:10px;padding-right: 10px;">
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://twitter.com/your-profile" name="twitter">
                                    </div>
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://facebook.com/your-profile" name="facebook">
                                    </div>
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://instagram.com/your-profile" name="instagram">
                                    </div>
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://youtube.com/your-profile" name="youtube">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>

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
