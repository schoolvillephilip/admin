<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Seller</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li><a href="#">Dashboard</a></li>
                    <li>Order detail</li>
                    <li class="active">#<?= $this->uri->segment(3); ?></li>
                </ol>
            </div>
            <?php if($orders) : ?>
                <div id="page-content">
                    <div class="row">
                        <?php $x = 1; foreach ($orders as $order) : ?>
                        <div class="col-sm-6 clearfix">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="panel-control">
                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#details-tab-<?= $x; ?>" data-toggle="tab">
                                                    Order Details</a>
                                            </li>
                                            <li><a href="#action-tab-<?= $x; ?>" data-toggle="tab">Order Action</a></li>
                                        </ul>
                                    </div>
                                    <h3 class="panel-title text-bold">Order Summary ( Item #<?= $x; ?> )</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="details-tab-<?= $x; ?>">
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Items #<?= $x; ?></th>
                                                            <th>Detail</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td class="text-semibold">Product Name</td>
                                                            <td><a class="btn-link" href="<?= base_url('product/detail/' . $order->product_id); ?>"><?= $order->product_name; ?></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Customer Billing Name</td>
                                                            <td><?= $order->first_name . ' '. $order->last_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Customer Phone</td>
                                                            <td><?= $order->phone . ', ' . $order->phone2 ; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Customer Email</td>
                                                            <td><?= $order->email; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Seller's Name</td>
                                                            <td><a class="btn-link" href="<?= base_url('sellers/detail/'. $order->seller_id); ?>"><?= ucwords($order->legal_company_name); ?></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Seller's Email</td>
                                                            <td><?= $order->seller_email; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Quantity</td>
                                                            <td><?= $order->qty; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Present Status</td>
                                                            <td><span class="label label-success"><?= $order->active_status; ?></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Status Flow</td>
                                                            <td>
                                                                <ul class="list-group">
                                                                <?php $status = json_decode($order->status, true);
                                                                    foreach( $status as $s => $key ):
                                                                ?>
                                                                        <li class="list-group-item"><strong>Status :</strong> <?= $key['msg']; ?> :
                                                                            <strong>Time :</strong> <?= $key['datetime']; ?></li>
                                                                <?php endforeach;?>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-semibold">Ordered Date</td>
                                                            <td><span><?= neatDate($order->order_date) .' ('. neatTime($order->order_date) .')'; ?></span>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                        </div>
                                        <div class="tab-pane fade" id="action-tab-<?= $x; ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $x++; endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <div id="page-content">
                    <div class="alert alert-danger">Sorry, the order code can not be found.</div>
                </div>
            <?php endif; ?>
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
