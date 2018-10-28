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
					<h1 class="page-header text-overflow">Seller</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Dashboard</a></li>
					<li>Order detail</li>
					<li class="active">#<?= $this->uri->segment(3); ?></li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">

				<div class="row">
					<div class="col-sm-6">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title text-bold">Order Summary</h3>
							</div>

							<!-- Striped Table -->
							<!--===================================================-->
							<div class="panel-body">
								<?php $x = 1; foreach( $orders as $order ) : ?>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Items #<?=$x;?></th>
											<th>Description</th>
										</tr>
										</thead>
										<tbody>
												<tr>
													<td>Order Code</td>
													<td><?= $order->order_code; ?></td>
												</tr>
												<tr>
													<td>Product Name</td>
													<td><?= $order->product_name; ?></td>
												</tr>
												<tr>
													<td>Customer Name</td>
													<td><?= $order->customer_name; ?></td>
												</tr>
												<tr>
													<td>Customer Phone</td>
													<td><?= $order->customer_phone; ?></td>
												</tr>
												<tr>
													<td>Quantity</td>
													<td><?= $order->qty; ?></td>
												</tr>
												<tr>
													<td>Status</td>
													<td><span class="label label-success"><?= $order->status; ?></span>
													</td>
												</tr>
										</tbody>
									</table>
								</div>
								<?php $x++; endforeach; ?>
							</div>
							<!--===================================================-->
							<!-- End Striped Table -->

						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel">

							<!--Panel heading-->
							<div class="panel-heading">
								<div class="panel-control">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#demo-tabs-box-1" data-toggle="tab">Client
												Details</a>
										</li>
										<li><a href="#demo-tabs-box-2" data-toggle="tab">Action</a></li>
									</ul>
								</div>
								<h3 class="panel-title">Order Details</h3>
							</div>

							<!--Panel body-->
							<div class="panel-body">
								<div class="tab-content">
									<div class="tab-pane fade in active" id="demo-tabs-box-1">
										<p class="text-main text-semibold">Customer Name</p>
										<p>Steve N. Horton</p>
										<p class="text-main text-semibold">Customer Phone</p>
										<p><a href="tel:08169254598"></a>08169254598</p>
										<p class="text-main text-semibold">City</p>
										<p>Ikorodu</p>
										<p class="text-main text-semibold">Zip Code</p>
										<p>122333</p>
										<p class="text-main text-semibold">Address</p>
										<p>530A, Aina Akingbala Street, Ikeja</p>
									</div>
									<div class="tab-pane fade" id="demo-tabs-box-2">
										<p class="text-main text-semibold">Second Tab Content</p>
										<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
				<!--===================================================-->

				<!--End page content-->
			</div>
		</div>
		<!--===================================================-->
		<!--End page content-->
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
<!--	<script src="/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>-->
</body>

</html>
