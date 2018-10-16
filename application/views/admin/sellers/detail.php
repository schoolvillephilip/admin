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
					<li>All sellers</li>
					<li class="active">Philip Sokoya</li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">

				<div class="row">
					<div class="col-md-6">
						<div class="panel">
							<div class="panel-body text-center">
								<img alt="Profile Picture" class="img-md img-circle mar-btm"
									 src="/admin/assets/img/profile-photos/1.png">
								<p class="text-lg text-semibold mar-no text-main">Philip Sokoya</p>
								<p class="text-semibold mar-no text-main">Registration No : NG-83833</p>
								<p class="text-muted">PhilTechnologies</p>

								<button class="btn btn-danger mar-ver"><i class="demo-pli-lock-user icon-fw"></i>Block
								</button>
								<button class="btn btn-primary mar-ver"><i class="demo-pli-checked-user icon-fw"></i>Verify
								</button>
								<button class="btn btn-warning mar-ver"><i class="demo-pli-warning-window icon-fw"></i>Suspend
								</button>


								<ul class="list-unstyled text-center bord-top pad-top mar-no row">
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">1,245</span>
										<p class="text-muted mar-no">Sold Items</p>
									</li>
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">24</span>
										<p class="text-muted mar-no">Active Promotions</p>
									</li>
									<li class="col-xs-4">
										<span class="text-lg text-semibold text-main">450</span>
										<p class="text-muted mar-no">Products Sold</p>
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
									<a data-toggle="tab" href="#demo-rgt-tab-1">Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#demo-rgt-tab-2">Bank Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#demo-rgt-tab-3">Account Details</a>
								</li>
								<li>
									<a data-toggle="tab" href="#demo-rgt-tab-4">Settings</a>
								</li>
							</ul>

							<!--Tabs Content-->
							<div class="tab-content">
								<div id="demo-rgt-tab-1" class="tab-pane fade active in">
									<p class="text-main text-semibold">Email</p>
									<p>phil@gmail.com</p>
									<p class="text-main text-semibold">Company Name</p>
									<p>PhilTechnologies.com</p>
									<p class="text-main text-semibold">Address</p>
									<p>530A Aina Akingbala Street Omole Phase 2</p>
									<p class="text-main text-semibold">Registration No</p>
									<p>NG-83833</p>
									<p class="text-main text-semibold">Main Category</p>
									<p>Tv & Electronics</p>
									<p class="text-main text-semibold">Terms & Conditions</p>
									<p>Here is my information... Nothing serious</p>
								</div>
								<div id="demo-rgt-tab-2" class="tab-pane fade">
									<p class="text-main text-semibold">Bank Name</p>
									<p>Guaranty Trust Bank Plc</p>
									<p class="text-main text-semibold">Account Name</p>
									<p>Sokoya Adeniji Philip</p>
									<p class="text-main text-semibold">Account Number</p>
									<p>2820226778</p>
									<p class="text-main text-semibold">Bvn Number</p>
									<p>7262626228</p>

								</div>
								<div id="demo-rgt-tab-3" class="tab-pane fade">
									<p class="text-main text-semibold">Start Date</p>
									<p>2018/09/22</p>
									<p class="text-main text-semibold">End Date</p>
									<p>2018/09/01</p>
									<p class="text-main text-semibold">Account Status</p>
									<p>Null</p>
									<p class="text-main text-semibold">Date Registered</p>
									<p>2018/9/14</p>
									<p class="text-main text-semibold">Last Login</p>
									<p>2018/10/9</p>
									<p class="text-main text-semibold">IP Address</p>
									<p>130.215.123.15</p>
									<p class="text-main text-semibold">Is Approved</p>
									<p>
										<button class="btn btn-success btn-rounded">Approved</button>
									</p>
								</div>
								<div id="demo-rgt-tab-4" class="tab-pane fade">
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
						<h3 class="panel-title">Philip Sokoya Products</h3>
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
							<tr>
								<td>1542</td>
								<td>Samsung Galaxy S9 - BLACK (Dual Sim) - Official Warranty</td>
								<td>X5PJUH</td>
								<td>61</td>
								<td>
									<div class="label label-table label-success">Approved</div>
								</td>
								<td>10/6/2018</td>
							</tr>
							<tr>
								<td>1532</td>
								<td>Samsung Galaxy J6 - Purple</td>
								<td>BYZZSP</td>
								<td>None Sold</td>
								<td>
									<div class="label label-table label-danger">Pending</div>
								</td>
								<td>10/17/2018</td>
							</tr>
							<tr>
								<td>1525</td>
								<td>Nokia - 2 - 5&quot; - 1GB RAM, 8GB ROM - Android 7.0 8MP + 5MP - White</td>
								<td>31WUJE</td>
								<td>82</td>
								<td>
									<div class="label label-table label-success">Approved</div>
								</td>
								<td>10/2/2018</td>
							</tr>
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
