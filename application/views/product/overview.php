<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Products</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">All products</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="row pad-ver">

                    <form action="<?= base_url('product');?>" method="get" class="col-xs-12 col-sm-10 col-sm-offset-1 pad-hor">
                        <div class="input-group mar-btm">
                            <input type="search" name="q" placeholder="Search All Products" class="form-control input-lg">
                            <span class="input-group-btn">
                                <button class="btn btn-primary btn-lg" type="submit">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
                <?php $this->load->view('msg_view'); ?>
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">A list of all products in the Database</h3>
                        </div>
                        <div class="panel-body">
                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th style="display: none;">Unique Id</th>
                                    <th>Product Name</th>
                                    <th>Category Name</th>
                                    <th class="min-tablet">Product Line</th>
                                    <th class="min-desktop">Product Status</th>
                                    <th class="min-desktop">Seller</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product) :
                                    $category = $this->admin->get_single_category($product->category_id);
                                    ?>
                                    <tr>
                                        <td style="display: none;"><?= $product->id; ?></td>
                                        <td>
                                            <a class="btn-link" href="<?= base_url('product/detail/' . $product->id); ?> "> <?= $product->product_name ?></a>
                                        </td>
                                        <td>
                                            <?= !empty($category->name) ? $category->name : 'Category Does not exist'; ?>
                                        </td>
                                        <td>
                                            <?= $product->product_line ?>
                                        </td>
                                        <td>
                                            <?= productStatus($product->product_status); ?>
                                        </td>
                                        <td>
                                            <a class="btn-link" href="<?= base_url('sellers/detail/' . $product->seller_id); ?>">
                                                <?= ucwords($product->first_name . ' ' . $product->last_name); ?></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?= $pagination ?>
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
    $('#demo-dt-basic').dataTable({
        "responsive": true,
        "order": [[ 0, "desc" ]],
        "language": {
            "paginate": {
                "previous": '<i class="demo-psi-arrow-left"></i>',
                "next": '<i class="demo-psi-arrow-right"></i>'
            }
        }
    });
</script>
</body>
</html>
