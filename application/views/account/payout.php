<?php $this->load->view('templates/meta_tags'); ?>
<style>
    .list-group-item {
        border: 0 !important;
    }

    td p {
        margin: 12px;
    }

    .activePayout {
        border-left: 2px solid #35bbae !important;
    }
</style>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Payout Requests</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Reports</li>
                    <li class="active">Payout Requests</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Payout Requests</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="panel panel-bordered-dark panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-2x text-thin">&#8358; 1,222,220</span>
                                        <p>AVAILABLE BALANCE</p>
                                        <i class="demo-pli-credit-card-2 icon-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-bordered-primary panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-2x text-thin">&#8358; 123,000</span>
                                        <p>PAID THIS WEEK</p>
                                        <i class="demo-pli-credit-card-2 icon-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-bordered-pink panel-colorful">
                                    <a href="javascript:;" onclick="trigger('#inc_trig');">
                                        <div class="pad-all text-center">
                                            <span class="text-2x text-thin"><?= count($requests) ?></span>
                                            <p>UNCLEARED TRANSACTIONS</p>
                                            <i class="demo-pli-credit-card-2 icon-lg"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="<?= base_url('account/history') ?>">
                                    <div class="panel panel-bordered-purple panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-2x text-thin">&#8358; 123,000</span>
                                            <p>PAYOUT HISTORY</p>
                                            <i class="demo-pli-credit-card-2 icon-lg"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php $this->load->view('msg_view'); ?>
                        <div class="row">
                            <div class="col-md-5" style="padding:20px 10px 0;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#demo-tabs2-box-1" id="inc_trig">Uncleared
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="panel-title"></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="demo-tabs2-box-1" class="tab-pane fade in active">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="demo-pli-monitor-2 text-main icon-3x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-main text-lg mar-no">Payout</p>
                                                        Payout List
                                                    </div>
                                                </div>
                                                <div class="txn nano has-scrollbar"
                                                     style="height:290px;margin-top:10px;">
                                                    <div class="list-group nano-content">
                                                        <?php if ($requests) : foreach ($requests as $request) : ?>
                                                            <a href="javascript:;" class="list-group-item payout_detail"
                                                               id="<?= $request->id; ?>">
                                                                <h5 class="list-group-item-text"><?= ucwords($request->legal_company_name); ?></h5>
                                                                <p class="list-group-item-heading"><?= ngn($request->amount); ?></p>
                                                            </a>
                                                        <?php endforeach; else : ?>
                                                            <p class="list-group-item-heading">No payment Request In The
                                                                System Yet</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="text-center">
                                    <h3 id="payment_name">PAY SELLER</h3>
                                    <div id="acc_det" class="tab-pane"
                                         style="margin-top:20px;border:1px solid #35bbae;height:fit-content;padding:30px 0;">
                                        <h4>Payout Details</h4>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-4 control-label">Company</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="company_name"
                                                           id="company_name"
                                                           placeholder="Company Name" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-4 control-label">Account Name</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="account_name"
                                                           id="account_name"
                                                           placeholder="Account Name" required disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-4 control-label">Bank Name</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="bank_name"
                                                           id="bank_name"
                                                           placeholder="Bank Name" required disabled>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-4 control-label">Account Number</label>
                                                <div class="col-lg-7">
                                                    <input type="text" class="form-control" name="account_number"
                                                           id="account_number"
                                                           placeholder="XXXXXXXXXX"
                                                           required disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-4 control-label" for="account_type">Account
                                                    Type</label>
                                                <div class="col-lg-7">
                                                    <input type="text" id="account_type" class="form-control"
                                                           placeholder="Account Type"
                                                           name="account_type" id="account_type" required disabled/>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="col-lg-4 control-label">Amount &#8358;</label>
                                                <div class="col-lg-7">
                                                    <input type="number" class="form-control" name="payout_amount"
                                                           id="payout_amount"
                                                           placeholder="0.00"
                                                           required disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <form id="payment-made" method="POST"
                                                      action="<?= base_url('account/payment_made'); ?>">
                                                    <input type="hidden" name="pid" id="pid" value="">
                                                    <input type="hidden" name="uid" id="uid" value="">
                                                    <input type="hidden" name="bank_details" id="bank_details" value="">
                                                    <input type="hidden" name="amount" id="amount" value="">
                                                    <input type="hidden" name="txn_code" id="txn_code" value="">
                                                    <button class="btn btn-primary btn-rounded btn-labeled"
                                                            id="payout_btn" style="display:none;">
                                                        <i class="btn-label demo-psi-credit-card-2"></i>Make Payment
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script>
    $('#payout_btn').on('click', function (e) {
        e.preventDefault();
        var pay = confirm("Do you want to proceed with payment?");
        if (pay) {
            $('#payment-made').submit();
        }
    });
    $('.payout_detail').on('click', function () {
        $('.payout_detail').removeClass('activePayout');
        let self = $(this);
        self.addClass('activePayout');
        let id = self.attr('id');
        $.ajax({
            url: base_url + 'account/payment_request',
            method: 'post',
            data: {id: id},
            dataType: 'json',
            success: function (d) {
                $('#payment_name').text('PAY ' + d.legal_company_name.toUpperCase());
                $('#company_name').val(d.legal_company_name);
                $('#account_name').val(d.account_name);
                $('#bank_name').val(d.bank_name);
                $('#account_number').val(d.account_number);
                $('#account_type').val(d.account_type);
                $('#payout_amount').val(d.amount);
                $('#amount').val(d.amount);
                $('#txn_code').val(d.transaction_code);
                $('#pid').val(d.id);
                $('#uid').val(d.uid);
                $('#bank_details').val(d.bank_name + ' ' + d.account_name + ' (' + d.account_number + ')');
                $('#payout_btn').show();
            }
        });
    });

    function trigger(e) {
        $(e).click();
    }
</script>
</body>
</html>
