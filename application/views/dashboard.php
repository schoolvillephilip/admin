<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Admin Overview</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Overview</li>
                </ol>
            </div>
            <p></p>
            <div id="page-content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel panel-bordered-default panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-psi-cart-coin icon-4x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold"><?= $order_completed_stats + $other_stats; ?></p>
                                <p class="mar-no">Total Orders</p>
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $order_completed_stats; ?></span> Completed Sales
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $other_stats; ?></span> Other Status Sales
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-bordered-default panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-psi-checked-user icon-4x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold"><?= $sellers_stats + $buyers_stats; ?></p>
                                <p class="mar-no">Total Users</p>
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $sellers_stats; ?></span> Sellers
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $buyers_stats; ?></span> Buyers
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-bordered-default panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-psi-idea icon-4x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold"><?= $products_approved_stats + $products_pending_stats; ?></p>
                                <p class="mar-no">Total Products</p>
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $products_approved_stats; ?></span>
                                            Approved
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $products_pending_stats; ?></span>
                                            Pending
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div id="demo-panel-network" class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Sales Track</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div id="demo-morris-line-legend" class="text-center"></div>
                                    <div id="sales_chart" style="height:290px"></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="text-semibold text-uppercase text-main">Today</p>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <span class="text-3x text-thin text-main"
                                                              style="font-size:18px;font-weight:bolder;"><?= ngn($today_sale->amt)?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-lg-offset-6">
                                        <p class="text-uppercase text-semibold text-main">Total Sales This Year</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="media pad-btm">
                                                    <div class="media-left">
                                                        <span class=" text-thin text-main text-bold"
                                                              style="font-size: 18px;"><?= $order_chart['total_yearly']; ?></span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="demo-psi-credit-card-2"></i>
                                        Sales Total - This Week</h3>
                                </div>
                                <div class="panel-body maintotals text-3x">
                                    <b>
                                        <a href="<?= base_url('account/sales_report/')?>" class="btn-link"><?= ngn($this_week_sales->amt); ?></a>
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="demo-psi-credit-card-2"></i>
                                        New Buyer(s) - This Week</h3>
                                </div>
                                <div class="panel-body maintotals text-3x">
                                    <b><a href="<?= base_url('users'); ?>" class="btn-link"><?= $new_buyer; ?></a></b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="demo-psi-credit-card-2"></i>
                                        New products - This Week</h3>
                                </div>
                                <div class="panel-body maintotals text-3x">
                                    <b><a href="<?= base_url('product/')?>" class="btn-link"><?= $new_product_count; ?></a></b>
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
</body>
<script>
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
</script>
</html>
