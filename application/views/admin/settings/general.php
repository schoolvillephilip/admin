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
                            <label class="col-md-3 control-label" for="meta_key">Meta Keywords</label>
                            <div class="col-md-9">
                                <input type="text" id="meta_key" class="form-control" placeholder="Meta Keywords">
                                <small class="help-block">Enter the default meta keywords</small>
                            </div>
                        </div>
                        <!--Text Input-->
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="meta_desc">Meta Description</label>
                            <div class="col-md-9">
                                <input type="text" id="meta_desc" class="form-control" placeholder="Meta Description">
                                <small class="help-block">Enter the default meta descriptions</small>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="meta_desc">Default
                                Language</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-live-search="true" data-width="100%">
                                    <option>English</option>
                                    <option>French</option>
                                    <option>Spanish</option>
                                    <option>Yoruba</option>
                                    <option>Igbo</option>
                                    <option>Hausa</option>
                                </select></div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="meta_desc">Default
                                Color Theme</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-live-search="true" data-width="100%">
                                    <option>Mint</option>
                                    <option>Teal</option>
                                    <option>Green</option>
                                    <option>Dark</option>
                                    <option>Pink</option>
                                </select></div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="meta_desc">Minimum Invoice No
                                Digits</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-width="100%">
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                </select></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="meta_desc">
                                Social Links
                            </label>
                            <div class="col-md-9">
                                <div class="row" style="padding-left:10px;padding-right: 10px;">
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://twitter.com/your-profile">
                                    </div>
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://facebook.com/your-profile">
                                    </div>
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://instagram.com/your-profile">
                                    </div>
                                    <div class="input-group mar-btm col-md-12">
                                        <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                                        <input type="text" class="form-control"
                                               placeholder="http://youtube.com/your-profile">
                                    </div>
                                </div>
                            </div>
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
