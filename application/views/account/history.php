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
                    <h1 class="page-header text-overflow">Payout History</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Reports</li>
                    <li class="active">Payout History</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Payout History</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row" style="padding:10px;">
                            <div class="table-responsive">
                                <table id="history_table" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th>Date Initiated</th>
                                        <th>Payout ID</th>
                                        <th>Seller</th>
                                        <th class="min-tablet">Amount</th>
                                        <th class="min-desktop">Date Reconciled</th>
                                        <th class="min-desktop">Payment Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($histories as $history ): ?>
                                    <tr>
                                        <td><?= date('Y/m/d h:i:s', strtotime( $history->date_requested)); ?></td>
                                        <td>PY-<?= $history->transaction_code; ?></td>
                                        <td><a class="btn-link" href="<?= base_url('sellers/detail/' . $history->uid); ?>"><?= ucwords($history->legal_company_name); ?></a></td>
                                        <td><?= ngn($history->amount); ?></td>
                                        <td>
                                            <?php if ($history->date_approved) : ?>
                                                <?= date('l, F d', strtotime($history->date_approved)); ?>
                                            <?php else : ?>
                                                <span class="text-info">No action yet.</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= paymentStatus( $history->status); ?></td>
                                    </tr>
                                    <?php endforeach; ?>
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
        $("#history_table").dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            },
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
</body>
</html>
