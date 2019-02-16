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
				<div class="row">
                    <?php $this->load->view('msg_view'); ?>
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">A list of all orders associated to you.</h3>
						</div>
                        <div class="panel-body">
                            <table id="order-datatable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Order Code</th>
                                    <th class="min-desktop text-center">Payment Method</th>
                                    <th class="min-desktop">Total Quantity</th>
                                    <th class="min-desktop">Total Amount (&#8358;)</th>
                                    <th class="min-desktop">Date Ordered</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach( $orders as $order ): ?>
                                    <tr>
                                        <td><a class="btn-link" href="<?= base_url('orders/detail/' . $order->order_code); ?>"><?= $order->order_code; ?></a></td>
                                        <td class="text-center"><?= paymentMethod( $order->payment_method); ?></td>
                                        <td class="text-center"><?= $order->qty; ?></td>
                                        <td><?= ngn($order->amount * $order->qty); ?></td>
                                        <td><?= neatDate($order->order_date); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
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
<?php $this->load->view('templates/confirm_modal'); ?>
<?php $this->load->view('templates/scripts'); ?>
<script>
    $('#order-datatable').dataTable({
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
