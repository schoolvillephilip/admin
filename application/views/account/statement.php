<?php $this->load->view('templates/meta_tags'); ?>
<style>
    .list-group-item {
        border: 0 !important;
    }

    td p {
        margin: 12px;
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
                    <h1 class="page-header text-overflow">Account Statement</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Reports</li>
                    <li class="active">Account Statement</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Statement</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="javascript:;" onclick="trigger('#due_trig');">
                                    <div class="panel panel-bordered-dark panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">&#8358; 0</span>
                                            <p>MONEY IN SYSTEM</p>
                                            <i class="demo-pli-credit-card-2 icon-lg"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="javascript:;" onclick="trigger('#open_trig');">
                                    <div class="panel panel-bordered-primary panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">&#8358; 0</span>
                                            <p>PAID THIS MONTH</p>
                                            <i class="demo-pli-credit-card-2 icon-lg"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <div class="panel panel-bordered-pink panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-3x text-thin">&#8358; 0</span>
                                        <p>ONITSHAMARKET'S BALANCE</p>
                                        <i class="demo-pli-credit-card-2 icon-lg"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <a href="<?=base_url('account/txn_overview')?>">
                                    <div class="panel panel-bordered-purple panel-colorful">
                                        <div class="pad-all text-center">
                                            <span class="text-3x text-thin">&#8358; 0</span>
                                            <p>SELLERS BALANCE</p>
                                            <i class="demo-pli-credit-card-2 icon-lg"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12"
                                 style="height:550px;padding:20px 10px 0;">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#seller_unpaid" id="due_trig">Unpaid
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#seller_paid" id="open_trig">Paid
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="panel-title">Statement</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div id="seller_unpaid" class="tab-pane fade in active">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="demo-pli-information text-main icon-3x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-main text-lg mar-no">Unpaid</p>
                                                        All unpaid sellers this month
                                                    </div>
                                                </div>
                                                <div class="txn nano has-scrollbar"
                                                     style="height:290px;margin-top:10px;">
                                                    <div class="list-group nano-content">
                                                        <table class="table table-bordered table-responsive">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    S/N
                                                                </th>
                                                                <th>
                                                                    Seller Name
                                                                </th>
                                                                <th>
                                                                    Sales Amount &#8358;
                                                                </th>
                                                                <th>
                                                                    Fee &#8358;
                                                                </th>
                                                                <th>
                                                                    Paid Amount &#8358;
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                    Bakare Israel
                                                                </td>
                                                                <td>
                                                                    30,000
                                                                </td>
                                                                <td>
                                                                    4,000
                                                                </td>
                                                                <td>
                                                                    26,000
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="seller_paid" class="tab-pane fade">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <i class="demo-pli-credit-card-2 text-main icon-3x"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-main text-lg mar-no">Paid</p>
                                                        All paid sellers this month
                                                    </div>
                                                </div>
                                                <div class="txn nano has-scrollbar"
                                                     style="height:290px;margin-top:10px;">
                                                    <div class="list-group nano-content">
                                                        <table class="table table-bordered table-responsive">
                                                            <thead>
                                                            <tr>
                                                                <th>
                                                                    S/N
                                                                </th>
                                                                <th>
                                                                    Seller Name
                                                                </th>
                                                                <th>
                                                                    Sales Amount &#8358;
                                                                </th>
                                                                <th>
                                                                    Fee &#8358;
                                                                </th>
                                                                <th>
                                                                    Paid Amount &#8358;
                                                                </th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                    Bakare Israel
                                                                </td>
                                                                <td>
                                                                    30,000
                                                                </td>
                                                                <td>
                                                                    4,000
                                                                </td>
                                                                <td>
                                                                    26,000
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="col-md-7"-->
<!--                                 style="height:550px;">-->
<!--                                <div class="panel" id="acc_state_table">-->
<!--                                    <div class=" row text-center">-->
<!--                                        <h6 class="col-md-6">Period<br/>26 Nov 2018 – 02 Dec 2018</h6><h6-->
<!--                                            class="col-md-6">Status<br/><i class="demo-pli-thunder"></i>Open</h6>-->
<!--                                    </div>-->
<!--                                    <div class="panel-body">-->
<!--                                        <table class="table table-hover table-vcenter">-->
<!--                                            <tbody>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    <span class="text-main text-semibold">Opening Balance</span>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <span class="text-muted">Negative closing balance from previous statements.</span>-->
<!--                                                </td>-->
<!--                                                <td class="text-center">-->
<!--                                                    <span class="text-warning text-semibold">&#8358; 0.00</span>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    <span class="text-main text-semibold">Orders</span>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <p class="text-muted">Sales Revenue</p>-->
<!--                                                    <p class="text-muted">Other Revenue</p>-->
<!--                                                    <p class="text-muted">Fees</p>-->
<!--                                                </td>-->
<!--                                                <td class="text-center">-->
<!--                                                    <p class="text-success text-semibold">&#8358; 0.00</p>-->
<!--                                                    <p class="text-success text-semibold">&#8358; 0.00</p>-->
<!--                                                    <p class="text-danger text-semibold">&#8358; 0.00</p>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    <span class="text-main text-semibold">Refunds</span>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <p class="text-muted">Returned or Cancelled Orders</p>-->
<!--                                                    <p class="text-muted">Refund on Fees</p>-->
<!--                                                </td>-->
<!--                                                <td class="text-center">-->
<!--                                                    <p class="text-danger text-semibold">&#8358; 0.00</p>-->
<!--                                                    <p class="text-success text-semibold">&#8358; 0.00</p>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    <span class="text-main text-semibold">Others</span>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <p class="text-muted">Others</p>-->
<!--                                                </td>-->
<!--                                                <td class="text-center"><p class="text-success text-semibold">&#8358;-->
<!--                                                        0.00</p>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    <span class="text-main text-semibold">Closing Balance</span>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                    <p class="text-muted">Total Balance</p>-->
<!--                                                </td>-->
<!--                                                <td class="text-center"><p class="text-success text-semibold">&#8358;-->
<!--                                                        0.00</p>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            <tr>-->
<!--                                                <td>-->
<!--                                                    <span class="text-main text-semibold">Payout</span>-->
<!--                                                </td>-->
<!--                                                <td>-->
<!--                                                </td>-->
<!--                                                <td class="text-center"><span class="text-success text-semibold">&#8358; 0.00</span>-->
<!--                                                </td>-->
<!--                                            </tr>-->
<!--                                            </tbody>-->
<!--                                        </table>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <button style="margin-top:-30px;"-->
<!--                                        class="btn btn-primary btn-rounded btn-labeled pull-right"-->
<!--                                        onclick="PrintElem('acc_state_table');"><i-->
<!--                                        class="btn-label demo-psi-printer"></i> Print Statement-->
<!--                                </button>-->
<!--                            </div>-->
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
    /**
     * @return {boolean}
     */
    function PrintElem(elem) {
        var mywindow = window.open('', 'PRINT', 'height=400,width=600');
        mywindow.document.write('<html><head><style>td{border:1px solid #222922;padding:10px;}</style><title>' + document.title + '</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<h1 style="text-align:center;">' + document.title + '</h1><div style="padding:20px 0 0 90px;">');
        mywindow.document.write(document.getElementById(elem).innerHTML);
        mywindow.document.write('</div></body></html>');
        mywindow.document.close();
        mywindow.focus();
        mywindow.print();
        mywindow.close();
        return true;
    }
    function trigger(e) {
        $(e).click();
    }
</script>
</body>
</html>
