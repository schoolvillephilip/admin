<?php $this->load->view('templates/meta_tags'); ?>
<style>
    #sales_chart {
        height: 410px;
        border: 1px solid #dadada;
    }

    @media screen and (max-width: 991px) {
        #sales_chart {
            margin: 10px 0 10px;
        }
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
                    <h1 class="page-header text-overflow">Sales Report</h1>
                </div>
                <ol class="breadcrumb">
                    <li><i class="demo-pli-home"></i></li>
                    <li>Reports</li>
                    <li class="active">Sales Report</li>
                </ol>
            </div>
            <div id="page-content">
                <div id="om-panel-order" class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Reports for January 2018 to December 2018</h3>
                    </div>
                    <?php $this->load->view('msg_view'); ?>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-success" style="height: 145px;">
                                        <h5 style="margin-top:35px;">Total Sales Made</h5>
                                        <h2><?= ngn($success_transaction); ?></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-mint"
                                         style="height: 145px;margin-top:7.5px;">
                                        <h5 style="margin-top:35px;">Total Delivery Charge Received</h5>
                                        <h2><?= ($delivery_charge !== null) ? ngn( $delivery_charge) : 0.00; ?></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-danger"
                                         style="height: 145px;margin-top:7.5px;">
                                        <h5 style="margin-top:35px;">Total Commission Received</h5>
                                        <h2><?= ($commission !== null ) ? ngn( $commission) : 0.00;?></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-center">Orders Chart</h4>
                                <div id="sales_chart"></div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-warning" style="height: 145px;margin-top:7.5px">
                                        <h5 style="margin-top:35px;">Incoming Payment</h5>
                                        <h2><?= ($incoming_payment !== null ) ? ngn($incoming_payment) : 0.00; ?></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-danger" style="height: 145px;margin-top:7.5px">
                                        <h5 style="margin-top:35px;">Failed Traansaction</h5>
                                        <h2><?= ($failed_transaction !== null ) ? ngn($failed_transaction) : 0.00; ?></h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-default" style="height: 145px;margin-top:7.5px">
                                        <h5 style="margin-top:35px;">Total Qty of Item Ordered</h5>
                                        <h2><?= ($order_count !== null ) ? $order_count : 0.00; ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-12">
                                <h5>Top Products By Order</h5>
                                <table id="top_selling_products" class="table table-striped table-bordered"
                                       cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th width="10%">S/N</th>
                                        <th width="70%" class="min-tablet">Product</th>
                                        <th width="20%" class="min-desktop">Orders Completed</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $x = 1;  foreach($top_orders as $order ) :?>
                                        <tr>
                                            <td><?= $x; ?></td>
                                            <td><a class="btn-link" href="<?= base_url('product/detail/' . $order->id);?>"><?= word_limiter($order->product_name, 22);?></a></td>
                                            <td><?= $order->no_of_sales; ?></td>
                                        </tr>
                                    <?php $x++; endforeach;?>
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
</body>
<script>
    $(document).ready(function () {
        $("#top_selling_products").dataTable({
            "responsive": true,
            "language": {
                "paginate": {
                    "previous": '<i class="demo-psi-arrow-left"></i>',
                    "next": '<i class="demo-psi-arrow-right"></i>'
                }
            }
        });
        Morris.Bar({
            element: 'sales_chart',
            data: [
                { y: 'Jan', a: <?= (int) $order_chart['Jan']; ?>},
                { y: 'Feb', a: <?= (int) $order_chart['Feb']; ?>},
                { y: 'Mar', a: <?= (int) $order_chart['Mar']; ?>},
                { y: 'Apr', a: <?= (int) $order_chart['Apr']; ?>},
                { y: 'May', a: <?= (int) $order_chart['May']; ?>},
                { y: 'June', a: <?= (int) $order_chart['Jun']; ?>},
                { y: 'July', a: <?= (int) $order_chart['Jul']; ?>},
                { y: 'Aug', a: <?= (int) $order_chart['Aug']; ?>},
                { y: 'Sept', a: <?= (int) $order_chart['Sep']; ?>},
                { y: 'Oct', a: <?= (int) $order_chart['Oct']; ?>},
                { y: 'Nov', a: <?= (int) $order_chart['Nov']; ?>},
                { y: 'Dec', a: <?= (int) $order_chart['Dec']; ?>}
            ],
            xkey: 'y',
            ykeys: 'a',
            labels: ['Total Order'],
            gridEnabled: true,
            gridLineColor: 'rgba(0,0,0,.1)',
            gridTextColor: '#6b7880',
            gridTextSize: '11px',
            barColors: ['#179278'],
            resize:true,
            hideHover: 'auto'
        });
    });
</script>
</html>
