<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Product</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Manage</a></li>
                    <li class="active">product</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Showing all products</h3>
                    </div>
                    <div class="panel-body">
                        <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
                               width="100%">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th class="min-tablet">Created On</th>
                                <th class="min-tablet">Average Sale Price(N)</th>
                                <th class="min-tablet">Avg Discount Price(N)</th>
                                <th class="min-desktop">Available</th>
                                <th class="min-desktop">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product) : ?>
                                <tr>
                                    <td><?= $product['product_name']; ?></td>
                                    <td><?= $product['sku']; ?></td>
                                    <td><?= neatDate($product['created_on']); ?></td>
                                    <td><?= ngn($product['sale_price']); ?></td>
                                    <td><?= ngn($product['discount_price']); ?></td>
                                    <td><?= $product['product_status']; ?></td>
                                    <td><i class="fa fa-plus"></i></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
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
    $(document).ready(function (x) {
        $('#demo-dt-basic').dataTable({
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
