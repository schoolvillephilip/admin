<?php $this->load->view('templates/meta_tags'); ?>
<style>
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
                                <a href="<?= base_url('account/txn_overview') ?>">
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
