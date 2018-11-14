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
                        <div class="panel panel-bordered-pink panel-colorful media middle pad-all">
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
                        <div class="panel panel-bordered-warning panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-psi-checked-user icon-4x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold">2841</p>
                                <p class="mar-no">Total Users</p>
                                <!--Sparkline pie chart -->
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">34</span> Sellers
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">2807</span> Buyers
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="panel panel-bordered-danger panel-colorful media middle pad-all">
                            <div class="media-left">
                                <div class="pad-hor">
                                    <i class="demo-psi-idea icon-4x"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <p class="text-2x mar-no text-semibold">1081</p>
                                <p class="mar-no">Total Products</p>
                                <!--Sparkline pie chart -->
                                <div>
                                    <div class="pad-all">
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">1002</span> Approved
                                        </p>
                                        <p class="mar-no">
                                            <span class="pull-right text-bold">79</span> Pending
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

                                <div class="row" style="padding-right:20px;">
                                    <div id="demo-morris-line-legend" class="text-center"></div>
                                    <div id="demo-morris-line"
                                         style="height: 290px; position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                        <svg height="290" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             style="width:100%;overflow: hidden; position: relative; left: -0.5px;">
                                            <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                Onitshamarket.com
                                            </desc>
                                            <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
                                            <text x="33.90625" y="231" text-anchor="end" font="10px &quot;Arial&quot;"
                                                  stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">0
                                                </tspan>
                                            </text>
                                            <path fill="none" stroke="#000000" d="M46.40625,231H639"
                                                  stroke-opacity="0.1" stroke-width="0.5"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                            <text x="33.90625" y="179.5" text-anchor="end" font="10px &quot;Arial&quot;"
                                                  stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    7.5
                                                </tspan>
                                            </text>
                                            <path fill="none" stroke="#000000" d="M46.40625,179.5H639"
                                                  stroke-opacity="0.1" stroke-width="0.5"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                            <text x="33.90625" y="128" text-anchor="end" font="10px &quot;Arial&quot;"
                                                  stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    15
                                                </tspan>
                                            </text>
                                            <path fill="none" stroke="#000000" d="M46.40625,128H639"
                                                  stroke-opacity="0.1" stroke-width="0.5"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                            <text x="33.90625" y="76.5" text-anchor="end" font="10px &quot;Arial&quot;"
                                                  stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    22.5
                                                </tspan>
                                            </text>
                                            <path fill="none" stroke="#000000" d="M46.40625,76.5H639"
                                                  stroke-opacity="0.1" stroke-width="0.5"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                            <text x="33.90625" y="25" text-anchor="end" font="10px &quot;Arial&quot;"
                                                  stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: end; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    30
                                                </tspan>
                                            </text>
                                            <path fill="none" stroke="#000000" d="M46.40625,25H639" stroke-opacity="0.1"
                                                  stroke-width="0.5"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                            <text x="514.2434210526317" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2005
                                                </tspan>
                                            </text>
                                            <text x="451.8651315789474" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2003
                                                </tspan>
                                            </text>
                                            <text x="389.4868421052632" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2001
                                                </tspan>
                                            </text>
                                            <text x="327.10855263157896" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2009
                                                </tspan>
                                            </text>
                                            <text x="264.73026315789474" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2007
                                                </tspan>
                                            </text>
                                            <text x="202.35197368421052" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2005
                                                </tspan>
                                            </text>
                                            <text x="139.9736842105263" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2003
                                                </tspan>
                                            </text>
                                            <text x="77.59539473684211" y="243.5" text-anchor="middle"
                                                  font="10px &quot;Arial&quot;" stroke="none" fill="#8f9ea6"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font: 11px sans-serif;"
                                                  font-size="11px" font-family="sans-serif" font-weight="normal"
                                                  transform="matrix(1,0,0,1,0,6)">
                                                <tspan dy="4" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                                    2001
                                                </tspan>
                                            </text>
                                            <path fill="none" stroke="#177bbb"
                                                  d="M46.40625,107.4C54.20353618421053,97.10000000000001,69.79810855263159,58.47500000000002,77.59539473684211,66.20000000000002C85.39268092105263,73.92500000000001,100.9872532894737,158.89999999999998,108.78453947368422,169.2C116.58182565789474,179.49999999999997,132.17639802631578,152.03333333333336,139.9736842105263,148.60000000000002C147.77097039473682,145.16666666666669,163.36554276315792,150.3166666666667,171.16282894736844,141.73333333333335C178.96011513157896,133.15000000000003,194.5546875,78.21666666666667,202.35197368421052,79.93333333333334C210.14925986842104,81.65,225.7438322368421,158.9,233.54111842105263,155.46666666666667C241.33840460526315,152.03333333333333,256.9329769736842,53.324999999999996,264.73026315789474,52.46666666666667C272.52754934210526,51.608333333333334,288.12212171052636,142.5916666666667,295.9194078947369,148.60000000000002C303.7166940789474,154.60833333333335,319.31126644736844,103.10833333333333,327.10855263157896,100.53333333333333C334.9058388157895,97.95833333333333,350.5004111842105,132.29166666666666,358.29769736842104,128C366.09498355263156,123.70833333333333,381.68955592105266,61.05000000000001,389.4868421052632,66.20000000000002C397.2841282894737,71.35000000000001,412.87870065789474,158.9,420.67598684210526,169.2C428.4732730263158,179.5,444.0678453947369,152.03333333333336,451.8651315789474,148.60000000000002C459.6624177631579,145.16666666666669,475.25699013157896,150.31666666666666,483.0542763157895,141.73333333333335C490.8515625,133.15,506.44613486842115,81.65,514.2434210526317,79.93333333333334C522.0407072368422,78.21666666666667,537.6352796052632,131.43333333333334,545.4325657894738"
                                                  stroke-width="2"
                                                  style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
                                            <circle cx="46.40625" cy="107.4" r="4" fill="#177bbb" stroke="#ffffff"
                                                    stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="77.59539473684211" cy="66.20000000000002" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="108.78453947368422" cy="169.2" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="139.9736842105263" cy="148.60000000000002" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="171.16282894736844" cy="141.73333333333335" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="202.35197368421052" cy="79.93333333333334" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="233.54111842105263" cy="155.46666666666667" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="264.73026315789474" cy="52.46666666666667" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="295.9194078947369" cy="148.60000000000002" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="327.10855263157896" cy="100.53333333333333" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="358.29769736842104" cy="128" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="389.4868421052632" cy="66.20000000000002" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="420.67598684210526" cy="169.2" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="451.8651315789474" cy="148.60000000000002" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="483.0542763157895" cy="141.73333333333335" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                            <circle cx="514.2434210526317" cy="79.93333333333334" r="4" fill="#177bbb"
                                                    stroke="#ffffff" stroke-width="1"
                                                    style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></circle>
                                        </svg>
                                        <div class="morris-hover morris-default-style"
                                             style="left: 585.391px; top: 36px; display: none;">
                                            <div class="morris-hover-row-label">2009</div>
                                            <div class="morris-hover-point" style="color: #177bbb">
                                                value:
                                                19
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <p class="text-semibold text-uppercase text-main">Today</p>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="media">
                                                    <div class="media-left">
                                                        <span class="text-3x text-thin text-main"
                                                              style="font-size:18px;font-weight:bolder;">&#8358; 25,000</span>
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
					                                        <span class="text-lg">&#8358;22,000</span>
					                                        <span class="labellabel-danger mar-lft">
					                                            <i class="pci-caret-down text-success"></i>
					                                            <smal>+ &#8358;3000</smal>
					                                        </span>
					                                        </span>
                                            </p>
                                            <p>
                                                <span>Max Sale</span>
                                                <span class="pad-lft text-semibold">
					                                        <span class="text-lg">&#8358;52,000</span>
					                                        <span class="labellabel-success mar-lft">
					                                            <i class="pci-caret-up text-danger"></i>
					                                            <smal>- &#8358;27,000</smal>
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
                                                              style="font-size: 18px;">&#8358;750,000</span>
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
                                        Sale Total - This Week</h3>
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
                                        New User - This Week</h3>
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
                                    <b>104</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--===================================================-->
            <!--End page content-->

        </div>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->


        <!--ASIDE-->
        <!--===================================================-->
        <?php $this->load->view('templates/aside_menu'); ?>
        <!--===================================================-->
        <!--END ASIDE-->

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

</html>
