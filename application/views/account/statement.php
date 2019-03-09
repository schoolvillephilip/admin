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
                        <h3 class="panel-title">Generate Report</h3>
                    </div>
                    <div class="panel-body">
                        <?= form_open('', 'class="form-horizontal"'); ?>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Report Type</label>
                            <div class="col-lg-7">
                                <select class="form-control" name="report_type">
                                    <option value="all" <?php if(isset($_POST['report_type']) && $_POST['report_type'] == 'all') echo 'selected'; ?>>All Report</option>
                                    <option value="orders" <?php if(isset($_POST['report_type']) && $_POST['report_type'] == 'orders') echo 'selected';?> >Orders</option>
                                    <option value="ar" <?php if(isset($_POST['report_type']) && $_POST['report_type'] == 'ar') echo 'selected';?> >Accounts Payable</option>
                                    <option value="ap" <?php if(isset($_POST['report_type']) && $_POST['report_type'] == 'ap') echo 'selected'; ?> >Accounts Receivable</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Period</label>
                            <div class="col-lg-7">
                                <select class="form-control" name="period">
                                    <option value="all" <?php if(isset($_POST['period']) && $_POST['period'] == 'all') echo 'selected';?> >All Time</option>
                                    <option value="this_month" <?php if(isset($_POST['period']) && $_POST['period'] == 'this_month') echo 'selected';?>>This Month</option>
                                    <option value="last_month" <?php if(isset($_POST['period']) && $_POST['period'] == 'last_month') echo 'selected';?>>Last Month</option>
                                    <option value="last_3_months" <?php if(isset($_POST['period']) && $_POST['period'] == 'last_3_months') echo 'selected';?>>Last 3 Months</option>
                                    <option value="this_year" <?php if(isset($_POST['period']) && $_POST['period'] == 'this_year') echo 'selected';?>>This Year</option>
                                    <option value="last_year" <?php if(isset($_POST['period']) && $_POST['period'] == 'last_year') echo 'selected';?>>Last Year</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label" for="">Status</label>
                            <div class="col-lg-7">
                                <select class="form-control" name="status">
                                    <option value="all" <?php  if(isset($_POST['status']) && $_POST['status'] == 'all') echo 'selected'; ?> >All</option>
                                    <option value="success" <?php  if(isset($_POST['status']) && $_POST['status'] == 'success') echo 'selected'; ?> >Success</option>
                                    <option value="fail" <?php  if(isset($_POST['status']) && $_POST['status'] == 'fail') echo 'selected'; ?> >Fail</option>
                                    <option value="pending" <?php  if(isset($_POST['status']) && $_POST['status'] == 'pending') echo 'selected'; ?> >Pending</option>
                                </select>
                            </div>
                        </div>

                        <div class="panel-footer text-center">
                            <button class="btn btn-primary" type="submit">Getnerate Report</button>
                        </div>
                        <?= form_close(); ?>

                    </div>
                </div>

                <?php if( isset($statement_table )) : ?>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Account Statement Report For <?= $page_title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <?= $statement_table; ?>
                    </div>
                </div>
                <?php endif; ?>
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
    $(document).ready(function () {
        $('.table').dataTable( {
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
        } );
    })

</script>
</body>
</html>
