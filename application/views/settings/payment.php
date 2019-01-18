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
                            <?php if( $methods ) :foreach ($methods as $method): ?>
                                <div class="col-md-4">
                                    <div class="panel panel-bordered-default">
                                        <div class="panel-body">
                                            <b><i class="fa fa-credit-card-alt fa-2x"></i> <?= $method->name; ?></b><br><br>
                                            <div class="row">
                                                <div id="status"
                                                     class="col-md-6 <?php if ($method->status == 1) echo 'text-success'; else echo 'text-danger'; ?>">
                                                    <?php if ($method->status == 1): ?>
                                                        <i class="fa fa-check fa-fw"></i> Enabled
                                                    <?php else: ?>
                                                        <i class="fa fa-times fa-fw"></i> Disabled
                                                    <?php endif ?>
                                                </div>
                                                <div class="col-md-6 text-right">
                                                    <div>
                                                        <a href="javascript:;" class="payment_settings dropdown-toggle"
                                                           data-toggle="dropdown" aria-expanded="false">
                                                            <i class="fa fa-cog fa-fw"></i> Settings
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu"
                                                            style="">
                                                            <li><a href="javascript:;" data-id="<?= $method->id; ?>"
                                                                   class="btn btn-default enable_payment" <?php if ($method->status == 1) echo 'disabled="disabled"'; ?>><i
                                                                            class="fa fa-check fa-fw"></i> Enabled</a>
                                                            </li>
                                                            <li><a href="javascript:;" data-id="<?= $method->id; ?>"
                                                                   class="btn btn-default disable_payment" <?php if ($method->status == 0) echo 'disabled="disabled"'; ?>><i
                                                                            class="fa fa-times fa-fw"></i> Disabled</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;else : ?>
                            <h3 class="text-center">No payment method set yet.</h3>
                            <?php endif; ?>
                        </div>
                        <div class="row">
                            <div class="col-md-12" id="payment_settings">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel">
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-heading">
                        <div class="panel-title">Add New Payment Method</div>
                    </div>
                    <div class="panel-body">
                        <?= form_open('settings/payment', 'class="form-horizontal" accept-encoding="utf-8"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Payement Title</label>
                            <div class="col-lg-7">
                                <input type="text" name="name" required placeholder="Eg: Payment On Delivery" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 col-md-3 col-sm-12 col-xs-12 control-label">Payment Settings</label>
                            <div class="col-lg-7 col-md-7 col-sm-11 col-xs-11">
                                <textarea placeholder="Enter the key,Token if needed EG: secret-key:82ns82292220222hwss, token:7ss4s4s4s11fd5dd11d4d41d4ssshsbncs4sd"
                                          data-provide="markdown" rows="8"
                                          name="settings"
                                          class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Notes</label>
                            <div class="col-lg-7">
                                <textarea name="notes" data-provide="markdown" class="form-control" required placeholder="Itemize the messages you will like to show on frontpage for the enduser"></textarea>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                        <?= form_close(); ?>
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
<?php $this->load->view('templates/confirm_modal'); ?>
<?php $this->load->view('templates/scripts'); ?>
</body>
<script>
    let id, op;
    $('.disable_payment').on('click', function (e) {
        e.preventDefault();
        let self = $(this);
        if (self.attr('disabled') != "disabled") {
            id = self.data('id');
            op = "disable";
            $('#modal_confirm')
                .find('.modal-header')
                .removeClass('bg-primary')
                .addClass('bg-danger').end()
                .find('.modal-header > p')
                .text("Disable Payment Method?").end()
                .find('.modal-body')
                .html('<i class="fa fa-times fa-4x text-danger"></i>').end()
                .modal('show');
        }
    });
    $('.enable_payment').on('click', function (e) {
        e.preventDefault();
        let self = $(this);
        if (self.attr('disabled') != "disabled") {
            id = self.data('id');
            op = "enable";
            $('#modal_confirm')
                .find('.modal-header')
                .removeClass('bg-danger')
                .addClass('bg-primary').end()
                .find('.modal-header > p')
                .text("Enable Payment Method?").end()
                .find('.modal-body')
                .html('<i class="fa fa-check fa-4x text-primary"></i>').end()
                .modal('show');
        }
    });
    $('#confirm_true').on('click', function (e) {
        e.preventDefault();
        $.ajax({
            url: base_url + 'settings/payment_method_toggle/',
            data: {'op': op, 'id': id},
            type: "POST",
            dataType: 'json',
            success: function (data) {
                window.location.href = base_url + "settings/payment/";
            },
            error: function (data) {
                window.location.href = base_url + "settings/payment/";
            }
        });
    });
</script>
</html>
