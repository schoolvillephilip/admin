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
							<table id="order-table" class="table table-striped table-bordered" cellspacing="0"
								   width="100%">
								<thead>
								<tr>
									<th>Order Code</th>
									<th class="text-center">Customer Name / Billing Address</th>
                                    <th>Delivering to State (Area)</th>
									<th class="min-desktop">Total Quantity</th>
									<th class="min-desktop">Total Amount (&#8358;)</th>
									<th class="min-desktop">Date Ordered</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach( $orders as $order ): ?>
										<tr>
											<td><a class="btn-link" href="<?= base_url('orders/detail/' . $order->order_code); ?>"><?= $order->order_code; ?></a></td>
											<td class="text-center">
                                                <?= '<b>Name </b>' . $order->first_name . ' ' . $order->last_name . '; <b> Phone :</b> ' . $order->phone . '; <b>Address: </b>' .$order->address; ?>
                                            </td>
                                            <td><?= $order->state . ' ('. $order->area. ')'; ?></td>
											<td class="text-center"><?= $order->qty; ?></td>
											<td><?= ngn($order->amount); ?></td>
											<td><?= neatDate($order->order_date); ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
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
<?php $this->load->view('templates/scripts'); ?>
<script>
    $('#order-table').dataTable({
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
