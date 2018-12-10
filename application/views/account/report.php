<?php $this->load->view('templates/meta_tags'); ?>
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
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sales Report</h3>
                    </div>
                    <div class="panel-body">
                        <div id="om-panel-order" class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Total Order Count</h3>
                                <?php if (!$order_chart) : ?>
                                    <h3 class="text-danger text-center">No Data Available!</h3>
                                <?php endif; ?>
                            </div>
                            <div class="panel-body">
                                <div id="sellersaleschart" style="height: 350px; margin-bottom: 40px;"></div>
                            </div>
                        </div>
                        <div id="om-panel-gross" class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Gross Sales Sum</h3>
                                <?php if (!$gross_chart) : ?>
                                    <h3 class="text-danger text-center">No Data Available!</h3>
                                <?php endif; ?>
                            </div>
                            <div class="panel-body">
                                <div id="sellergrosschart" style="height: 350px; margin-bottom: 40px;"></div>
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
</html>
