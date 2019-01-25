<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Account</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Settings</a></li>
                    <li class="active">Change password</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="row">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">Change Password</div>
                        </div>
                        <?= form_open('profile/change_password', 'class="form-horizontal"'); ?>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="">Current password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="current_password" required id="carrito-email"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="">New password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="new_password" required
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="">Confirm password</label>
                                <div class="col-sm-6">
                                    <input type="password" name="confirm_password" required
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6">
                                    <button class="btn btn-primary" type="submit">Change Password</button>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

        </div>
        <?php $this->load->view('templates/menu'); ?>
    </div>
    <?php $this->load->view('templates/footer'); ?>
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
</div>
<?php $this->load->view('templates/scripts'); ?>
</body>
</html>
