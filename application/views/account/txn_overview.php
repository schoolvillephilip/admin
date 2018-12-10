<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Transactions Overview</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Reports</li>
                    <li>Sales Report</li>
                    <li class="active">Transactions overview</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">All Transactions</h3>
                    </div>
                    <div class="panel-body">
                        <div id="om-panel-order" class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Payouts</h3>
                                <?php if (!$txn_chart) : ?>
                                    <h3 class="text-danger text-center">No Data Available!</h3>
                                <?php endif; ?>
                            </div>
                            <div class="panel-body">
                                <div id="txn_chart" style="height: 350px; margin-bottom: 40px;"></div>
                            </div>
                        </div>
                        <div class="panel">
                            <div class="panel-body">
                                <table id="demo-dt-selection" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>TXN Type</th>
                                        <th class="min-tablet">TXN Number</th>
                                        <th class="min-tablet">Order Number</th>
                                        <th class="min-desktop">Details</th>
                                        <th class="min-desktop">Amount</th>
                                        <th class="min-desktop">VAT</th>
                                        <th class="min-desktop">WHT</th>
                                        <th class="min-desktop">Payment status</th>
                                        <th class="min-desktop">Statement</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                    </tbody>
                                </table>
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
    $(document).ready(function() {
        $("#demo-dt-selection").dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
    });
</script>
</body>
</html>
