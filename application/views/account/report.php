<?php $this->load->view('templates/meta_tags'); ?>
<style>
    #sales_chart {
        height: 450px;
        border: 1px solid red;
    }

    @media screen and (max-width: 991px) {
        #sellersaleschart {
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
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-default" style="height: 145px;">
                                        <h5 style="margin-top:35px;">Total Sales</h5>
                                        <h2>&#8358; 200,000</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-default"
                                         style="height: 145px;margin-top:7.5px;">
                                        <h5 style="margin-top:35px;">Total Delivery</h5>
                                        <h2>&#8358; 20,000</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-default"
                                         style="height: 145px;margin-top:7.5px;">
                                        <h5 style="margin-top:35px;">Total Commission</h5>
                                        <h2>&#8358; 10,000</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="sales_chart"></div>
                            </div>
                            <div class="col-md-3 text-center">
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-default" style="height: 220px;">
                                        <h5 style="margin-top:70px;">Total Order Count</h5>
                                        <h2>200,000</h2>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 panel-bordered-default"
                                         style="height: 220px;margin-top:10px;">
                                        <h5 style="margin-top:70px;">Avg Order Per Customer</h5>
                                        <h2>2.5</h2>
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
                                        <th width="10%"></th>
                                        <th width="40%" class="min-tablet">Product</th>
                                        <th width="20%" class="min-tablet">Category</th>
                                        <th width="20%" class="min-desktop">Orders Completed</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="me.jpg" alt="Product Image"/></td>
                                        <td>Samsung Galaxy J5</td>
                                        <td>Phones &amp; Tablets</td>
                                        <td>61</td>
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
                { y: 'Jan', a: 80},
                { y: 'Feb', a: 100},
                { y: 'Mar', a: 75},
                { y: 'Apr', a: 20},
                { y: 'May', a: 50},
                { y: 'June', a: 75},
                { y: 'July', a: 15},
                { y: 'Aug', a: 70},
                { y: 'Sept', a: 100},
                { y: 'Oct', a: 50},
                { y: 'Nov', a: 20},
                { y: 'Dec', a: 40}
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
