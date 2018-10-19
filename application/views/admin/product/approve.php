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
					<h1 class="page-header text-overflow">Approve Products</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Products</a></li>
					<li class="active">Approve Products</li>
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
							<input type="text" placeholder="Search Pending Product Records"
								   class="form-control input-lg">
							<span class="input-group-btn">
                     <button class="btn btn-primary btn-lg" type="button">Search</button>
                 </span>
						</div>
					</form>
				</div>
				<div class="row">
					<div class="panel" id="pr-spec">
						<div class="panel-heading">
							<h3 class="panel-title">A list of all pending products in the database</h3>
						</div>
						<div class="panel-body">
							<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
								   width="100%">
								<thead>
								<tr>
									<th>Product</th>
									<th>Model</th>
									<th>Price</th>
									<th>Seller</th>
									<th>Date Posted</th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td><a href="/admin/product/detail">Samsung Galaxy J6 - Purple</a></td>
									<td>J6</td>
									<td>₦60,000</td>
									<td>Chidi Jeffrey</td>
									<td>2018/10/02</td>
								</tr>
								<tr>
									<td><a href="/admin/product/detail">Samsung Galaxy S9 - BLACK (Dual Sim) - Official
											Warranty</a></td>
									<td>S9</td>
									<td>₦80,000</td>
									<td>Sokoya Philip</td>
									<td>2018/9/02</td>
								</tr>
								<tr>
									<td><a href="/admin/product/detail">Nokia - 2 - 5" - 1GB RAM, 8GB ROM - Android 7.0
											8MP + 5MP - White</a></td>
									<td>Android</td>
									<td>₦70,000</td>
									<td>Dan Micheal</td>
									<td>2018/9/22</td>
								</tr>
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
