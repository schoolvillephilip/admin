<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Payment Methods</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Store Settings</a></li>
                    <li class="active">Payment Methods</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Payment Methods</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="panel panel-bordered-default">
                                    <div class="panel-body">
                                        <b><i class="fa fa-credit-card-alt fa-2x"></i> Interswitch API</b><br><br>
                                        <div class="row">
                                            <div id="status" class="col-md-6">
                                                <i class="fa fa-check fa-fw"></i> Enabled
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="javascript:;" class="payment_settings" data-payment_name="inter_switch">
                                                    <i class="fa fa-cog fa-fw"></i> Settings
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-bordered-default">
                                    <div class="panel-body">
                                        <b><i class="fa fa-hand-grab-o fa-2x"></i> Pay on Delivery</b><br><br>
                                        <div class="row">
                                            <div id="status" class="col-md-6">
                                                <i class="fa fa-check fa-fw"></i> Enabled
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="javascript:;" class="payment_settings" data-payment_name="pay_on_deliver">
                                                    <i class="fa fa-cog fa-fw"></i> Settings
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="panel panel-bordered-default">
                                    <div class="panel-body">
                                        <b><i class="fa fa-credit-card-alt fa-2x"></i> PayStack API</b><br><br>
                                        <div class="row">
                                            <div id="status" class="col-md-6">
                                                <i class="fa fa-check fa-fw"></i> Enabled
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <a href="javascript:;" class="payment_settings" data-payment_name="pay_stack">
                                                    <i class="fa fa-cog fa-fw"></i> Settings
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="payment_settings">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('templates/menu'); ?>
    <?php $this->load->view('templates/footer'); ?>
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
</div>
<?php $this->load->view('templates/scripts'); ?>
</body>
<script>
</script>
</html>
