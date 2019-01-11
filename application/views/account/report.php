<?php $this->load->view('templates/meta_tags'); ?>
<style>
    #sellersaleschart {
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
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12" style="height: 145px; border:1px solid aqua;"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"
                                         style="height: 145px; border:1px solid #ffc16f;margin-top:7.5px;"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"
                                         style="height: 145px; border:1px solid #00ffbc;margin-top:7.5px;"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="sellersaleschart"></div>
                            </div>
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12" style="height: 220px; border:1px solid #ffc16f;"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12"
                                         style="height: 220px; border:1px solid #ff80dd;margin-top:10px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-md-9">
                                <h5>Top Products By Order</h5>
                                <table id="top_selling_products" class="table table-striped table-bordered" cellspacing="0"
                                       width="100%">
                                    <thead>
                                    <tr>
                                        <th width="10%">S/N</th>
                                        <th width="20%"></th>
                                        <th width="50%" class="min-tablet">Product</th>
                                        <th width="20%" class="min-tablet">Orders Completed</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td><img src="me.jpg" alt="Product Image" /></td>
                                        <td>Samsung Galaxy J5</td>
                                        <td>61</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3">
                                <div class="col-md-12" style="border:1px solid blue;height:225px;">

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
    $(document).ready(function() {
        $("#top_selling_products").dataTable({
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
</html>
