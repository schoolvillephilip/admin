<?php $this->load->view('templates/meta_tags'); ?>
</head>
<body>
<div id="container" class="effect aside-float aside-bright mainnav-lg">
    <?php $this->load->view('templates/head_navbar'); ?>
    <div class="boxed">
        <div id="content-container">
            <div id="page-head">
                <div id="page-title">
                    <h1 class="page-header text-overflow">Orders</h1>
                </div>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="demo-pli-home"></i></a></li>
                    <li>Dashboard</li>
                    <li class="active">Orders</li>
                </ol>
            </div>
            <div id="page-content">
                <div class="row pad-ver">
                    <form action="#" method="post" class="col-xs-12 col-sm-10 col-sm-offset-1 pad-hor">
                        <div class="input-group mar-btm">
                            <input type="text" placeholder="Search All Orders" class="form-control input-lg">
                            <span class="input-group-btn">
                     <button class="btn btn-primary btn-lg" type="button">Search</button>
                 </span>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">A list of all orders in the Database</h3>
                        </div>
                        <div class="panel-body">
                            <table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Order Code</th>
                                    <th>Seller name</th>
                                    <th>Customer Name</th>
                                    <th class="min-tablet">Customer Phone</th>
                                    <th class="min-tablet">Product Name</th>
                                    <th class="min-desktop">Total Quantity</th>
                                    <th class="min-desktop">Amount (&#8358;)</th>
                                    <th class="min-desktop">Date Ordered</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td>
                                            <a href="<?= base_url('orders/detail/' . $order->order_code); ?>"><?= $order->order_code; ?></a>
                                        </td>
                                        <td><?= ucwords($order->first_name . ' ' . $order->last_name); ?></td>
                                        <td><?= $order->customer_name; ?></td>
                                        <td><?= $order->customer_phone; ?></td>
                                        <td><?= word_limiter($order->product_name, 7, '...') ?></td>
                                        <td><?= $order->qty; ?></td>
                                        <td><?= ngn($order->amount); ?></td>
                                        <td><?= neatDate($order->order_date); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination" style="margin: auto auto 5px;">
                            <li class="disabled"><a href="#" class="demo-pli-arrow-left"></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><span>...</span></li>
                            <li><a href="#">20</a></li>
                            <li><a href="#" class="demo-pli-arrow-right"></a></li>
                        </ul>

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
