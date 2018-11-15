<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <?php $this->load->view('templates/head_navbar'); ?>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">
            <div id="page-head">
                <!--Page Title-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <div id="page-title">
                    <h1 class="page-header text-overflow">Admin Overview</h1>
                </div>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End page title-->
                <!--Breadcrumb-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Overview</li>
                </ol>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End breadcrumb-->
            </div>
            <!--Page content-->
            <!--===================================================-->

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
                                <p class="text-2x mar-no text-semibold">1241</p>
                                <p class="mar-no">Total Orders</p>
                                <!--Sparkline pie chart -->
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">1200</span> Completed
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">41</span> Pending
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
                                <!--Sparkline pie chart -->
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $products_approved_stats; ?></span> Approved
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold"><?= $products_pending_stats; ?></span> Pending
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
                                    <div id="line-chart" style="height:290px"></div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="text-semibold text-uppercase text-main">Today</p>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <span class="text-3x text-thin text-main"
                                                              style="font-size:18px;font-weight:bolder;">&#8358; 85,000</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <div class="col-xs-12 text-sm" style="margin-top:5px;">
                                            <p>
                                                <span>Min Sale</span>
                                                <span class="pad-lft text-semibold">
					                                        <span class="text-lg">&#8358;67,000</span>
					                                        <span class="labellabel-danger mar-lft">
					                                            <i class="pci-caret-down text-success"></i>
					                                            <smal>+ &#8358;18,000</smal>
					                                        </span>
					                                        </span>
                                            </p>
                                            <p>
                                                <span>Max Sale</span>
                                                <span class="pad-lft text-semibold">
					                                        <span class="text-lg">&#8358;152,000</span>
					                                        <span class="labellabel-success mar-lft">
					                                            <i class="pci-caret-up text-danger"></i>
					                                            <smal>- &#8358;67,000</smal>
					                                        </span>
					                                        </span>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-lg-3">
                                        <p class="text-uppercase text-semibold text-main">Total Sales</p>
                                        <ul class="list-unstyled">
                                            <li>
                                                <div class="media pad-btm">
                                                    <div class="media-left">
                                                        <span class=" text-thin text-main text-bold"
                                                              style="font-size: 18px;">&#8358;3,750,000</span>
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
                                    <b>&#8358;200,500.00</b>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class="demo-psi-credit-card-2"></i>
                                        New Users - This Week</h3>
                                </div>
                                <div class="panel-body maintotals text-3x">
                                    <b>45</b>
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
                                    <b><?= $new_product_count; ?></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>

        <!--MAIN NAVIGATION-->
        <!--===================================================-->
        <?php $this->load->view('templates/menu'); ?>
        <!--===================================================-->
        <!--END MAIN NAVIGATION-->

    </div>


    <!-- FOOTER -->
    <!--===================================================-->
    <?php $this->load->view('templates/footer'); ?>
    <!--===================================================-->
    <!-- END FOOTER -->


    <!-- SCROLL PAGE BUTTON -->
    <!--===================================================-->
    <button class="scroll-top btn">
        <i class="pci-chevron chevron-up"></i>
    </button>
    <!--===================================================-->
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->
<!--JAVASCRIPT-->
<!--=================================================-->


<?php $this->load->view('templates/scripts'); ?>
</body>
<script>
    let data = [
            { y: '2014', a: 50, b: 90},
            { y: '2015', a: 65,  b: 75},
            { y: '2016', a: 50,  b: 50},
            { y: '2017', a: 75,  b: 60},
            { y: '2018', a: 80,  b: 65},
            { y: '2019', a: 90,  b: 70},
            { y: '2020', a: 100, b: 75},
            { y: '2021', a: 115, b: 75},
            { y: '2022', a: 120, b: 85},
            { y: '2023', a: 145, b: 85},
            { y: '2024', a: 160, b: 95}
        ],
        config = {
            data: data,
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Total Income', 'Total Outcome'],
            fillOpacity: 0.6,
            hideHover: 'auto',
            behaveLikeLine: true,
            resize: true,
            pointFillColors:['#ffffff'],
            pointStrokeColors: ['black'],
            lineColors:['gray','red']
        };
    config.element = 'area-chart';
    Morris.Area(config);
    config.element = 'line-chart';
    Morris.Line(config);
    config.element = 'bar-chart';
    Morris.Bar(config);
    config.element = 'stacked';
    config.stacked = true;
    Morris.Bar(config);
    Morris.Donut({
        element: 'pie-chart',
        data: [
            {label: "Friends", value: 30},
            {label: "Allies", value: 15},
            {label: "Enemies", value: 45},
            {label: "Neutral", value: 10}
        ]
    });
</script>
</html>
