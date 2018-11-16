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
                    <h1 class="page-header text-overflow">Mail Settings</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="active">Mail</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mail Settings</h3>
                    </div>
                    <form class="panel-body form-horizontal">
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="smtp_host">SMTP Host</label>
                            <div class="col-md-9">
                                <input type="text" id="smtp_host" class="form-control" placeholder="Host Name">
                                <small class="help-block">Enter the SMTP of your host provider</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="smtp_port">SMTP Port</label>
                            <div class="col-md-9">
                                <input type="number" id="smtp_port" class="form-control" placeholder="8080">
                                <small class="help-block">Enter the SMTP Port</small>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-md-3 control-label" for="smtp_sec">SMTP
                                Security</label>
                            <div class="col-md-9">
                                <select class="selectpicker" data-live-search="true" data-width="100%" id="smtp_sec">
                                    <option>TLS</option>
                                    <option>SSL</option>
                                    <option>SL</option>
                                    <option>No Security</option>
                                </select>

                                <small class="help-block">Select SMTP Security Type</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="smtp_user">SMTP Username</label>
                            <div class="col-md-9">
                                <input type="text" id="smtp_user" class="form-control" placeholder="username">
                                <small class="help-block">Enter the SMTP Username</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="smtp_pass">SMTP Password</label>
                            <div class="col-md-9">
                                <input type="password" id="smtp_pass" class="form-control" placeholder="password">
                                <small class="help-block">Enter the SMTP Password</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="name_from">From Name</label>
                            <div class="col-md-9">
                                <input type="text" id="name_from" class="form-control" placeholder="Enter Name">
                                <small class="help-block">Name that mail receiver sees as sender</small>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="email_from">From Email </label>
                            <div class="col-md-9">
                                <input type="email" id="email_from" class="form-control" placeholder="example@host.com">
                                <small class="help-block">Email that mail receiver sees as sender</small>
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
