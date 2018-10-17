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
					<h1 class="page-header text-overflow">Products</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Dashboard</a></li>
					<li class="active">All products</li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="row pad-ver">
					<form action="#" method="post" class="col-xs-12 col-sm-10 col-sm-offset-1 pad-hor">
						<div class="input-group mar-btm">
							<input type="text" placeholder="Search All Produsts" class="form-control input-lg">
							<span class="input-group-btn">
                     <button class="btn btn-primary btn-lg" type="button">Search</button>
                 </span>
						</div>
					</form>
				</div>

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
									<th>Product Name</th>
									<th>Root Category</th>
									<th class="min-tablet">Category</th>
									<th class="min-tablet">Product Line</th>
									<th class="min-desktop">Product Status</th>
									<th class="min-desktop">Seller</th>
								</tr>
								</thead>
								<tbody>
								<?php foreach ($products as $product) : ?>
									<tr>
										<td>
											<?= $product->product_name ?>
										</td>
										<td>
											<?= $product->rootcategory ?>
										</td>
										<td>
											<?= $product->category ?>
										</td>
										<td>
											<?= $product->product_line ?>
										</td>
										<td>
											<?= $product->product_status ?>
										</td>
										<td>
											<a href="<?= base_url('sellers/detail/' . $product->seller_id); ?>">
												<?= ucwords($product->first_name . ' ' . $product->last_name); ?></a>
										</td>
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
