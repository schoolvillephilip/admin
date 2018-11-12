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
					<li>Seller detail</li>
					<li class="active"><?= ucwords($seller->first_name. ' ' . $seller->last_name);?></li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">

				<div class="row">
					<?php $this->load->view('msg_view'); ?>
					<div class="col-md-6">
						<div class="panel">
							<div class="panel-body text-center">
								<img alt="Profile Picture" class="img-md img-circle mar-btm"
									 src="/admin/assets/img/profile-photos/1.png">
								<p class="text-lg text-semibold mar-no text-main"><?= ucwords($seller->first_name . ' ' . $seller->last_name); ?></p>
								<p class="text-semibold mar-no text-main">Registration No : <?= $seller->reg_no; ?></p>
								<p class="text-muted"><?= $seller->legal_company_name; ?></p>
								<p class="text-semibold mar-no text-main">Account Status : <?= accountStatus($seller->status); ?></p>

								<?php if ($seller->status != "approved") : ?>
									<a href="<?= base_url('sellers/action/approve/'.$seller->uid); ?>" class="btn btn-primary mar-ver"><i class="demo-pli-lock-user icon-fw"></i>Approve Seller</a>

									<a href="<?= base_url('sellers/action/reject/'.$seller->uid); ?>" class="btn btn-danger mar-ver"><i class="demo-pli-checked-user icon-fw"></i>Reject Seller</a>

								<?php else : ?>

									<a href="<?= base_url('sellers/action/reject/'.$seller->uid); ?>" class="btn btn-danger mar-ver"><i class="demo-pli-lock-user icon-fw"></i>Block Seller</a>

									<a href="<?= base_url('sellers/action/verify/'.$seller->uid); ?>" class="btn btn-success mar-ver"><i
											class="demo-pli-checked-user icon-fw"></i>Verify Seller</a>

									<a href="<?= base_url('sellers/action/suspend/'.$seller->uid); ?>" class="btn btn-warning mar-ver"><i
											class="demo-pli-warning-window icon-fw"></i>Suspend Seller</a>

								<?php endif; ?>
								<ul class="list-unstyled text-center bord-top pad-top mar-no row">
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main"><?= number_format($sold_count->sold); ?></span>
										<p class="text-muted mar-no">Sold Items</p>
									</li>
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">0</span>
										<p class="text-muted mar-no">Active Promotions</p>
									</li>
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main"><?= number_format($product_count->prod); ?></span>
										<p class="text-muted mar-no">All Products</p>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="tab-base">

							<!--Nav tabs-->
							<ul class="nav nav-tabs tabs-right">
								<li class="active">
									<a data-toggle="tab" href="#detail-tab-1">Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#detail-tab-2">Bank Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#detail-tab-3">Account Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#detail-tab-4">Settings</a>
								</li>
							</ul>

							<!--Tabs Content-->
							<div class="tab-content">
								<div id="detail-tab-1" class="tab-pane fade active in">
									<p class="text-main text-semibold">Email</p>
									<p><?= $seller->email; ?></p>
									<p class="text-main text-semibold">Company Name</p>
									<p><?= $seller->legal_company_name; ?></p>
									<p class="text-main text-semibold">Address</p>
									<p><?= $seller->address; ?></p>
									<p class="text-main text-semibold">Registration No</p>
									<p><?= $seller->reg_no; ?></p>
									<p class="text-main text-semibold">Main Category</p>
									<p><?= $seller->main_category; ?></p>
									<p class="text-main text-semibold">Terms & Conditions</p>
									<p><?= $seller->terms; ?></p>
								</div>
								<div id="detail-tab-2" class="tab-pane fade">
									<p class="text-main text-semibold">Bank Name</p>
									<p><?= $seller->bank_name; ?></p>
									<p class="text-main text-semibold">Account Name</p>
									<p><?= $seller->account_name; ?></p>
									<p class="text-main text-semibold">Account Number</p>
									<p><?= $seller->account_number; ?></p>
									<p class="text-main text-semibold">Bvn Number</p>
									<p><?= $seller->bvn; ?></p>

								</div>
								<div id="detail-tab-3" class="tab-pane fade">
									<p class="text-main text-semibold">Products Active?</p>
									<p><?= ($seller->disable_products == 1) ? 'Active' : 'Not Active'; ?></p>
									<p class="text-main text-semibold">Account Status</p>
									<p>
										<button
											class="btn btn-<?= ($seller->account_status == 'approved' || $seller->account_status == 'verified') ? 'success' : 'danger' ?> btn-rounded"><?= ucwords($seller->account_status); ?></button>
									</p>
									<p><strong><?= accountStatus($seller->account_status); ?></strong></p>
									<p class="text-main text-semibold">Date Registered</p>
									<p><?= neatDate($seller->date_registered); ?></p>
									<p class="text-main text-semibold">Last Login</p>
									<p><?= neatDate($seller->last_login); ?></p>
									<p class="text-main text-semibold">IP Address</p>
									<p><?= $seller->ip; ?></p>
								</div>
								<div id="detail-tab-4" class="tab-pane fade">
									<p class="text-main text-semibold">Overall Settings</p>
									<p>Coming Soon...</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--===================================================-->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title"><?= ucwords($seller->first_name. ' ' . $seller->last_name);?>'s Products based on sales</h3>
					</div>
					<div class="panel-body">
						<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
							   width="100%">
							<thead>
							<tr>
								<th>Product Id</th>
								<th>Name</th>
								<th class="min-tablet">SKU</th>
								<th class="min-tablet">Quantity Sold</th>
								<th class="min-desktop">Product Status</th>
								<th class="min-desktop">Created At</th>
							</tr>
							</thead>
							<tbody>
								<?php foreach($products as $product ) : ?>
									<tr>
										<td><?= $product->id; ?></td>
										<td><a href="<?= base_url('product/detail/'. $product->id); ?>"><?= $product->product_name; ?></a></td>
										<td><?= $product->sku; ?></td>
										<td><?= $product->sold; ?></td>
										<td>
											<?= productStatus($product->product_status); ?>
										</td>
										<td><?= neatDate($product->created_on); ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
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
