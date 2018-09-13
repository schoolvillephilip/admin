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
					<h1 class="page-header text-overflow">Specification</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Specification</a></li>
					<li class="active">Specifications List</li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title" style="font-weight: bold">Specifications</h3>
					</div>
					<div class="panel-body">
						<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
							   width="100%">
							<thead>
							<tr>
								<th>Specification Name</th>
								<th class="min-tablet">Description</th>
								<th class="min-tablet">Action</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td><a href="<?= base_url('categories/specification_detail'); ?>">Features</a></td>
								<td>Select the features of the product</td>
								<td><input id="1" type='checkbox' name='featured_image' title="select this item"
										   value="1"></i></td>
							</tr>
							<tr>
								<td>Display Features</td>
								<td>Specify the type of display. Example: Retina, Full HD, 3D</td>
								<td><input id="2" type='checkbox' name='featured_image' title="select this item"
										   value="2"></i></td>
							</tr>
							<tr>
								<td>Refresh Rate</td>
								<td>Specifying the screen refresh rate in MHz Example: 40</td>
								<td><input id="3" type='checkbox' name='featured_image' title="select this item"
										   value="3"></i></td>
							</tr>
							<tr>
								<td>Display Size</td>
								<td>Specify the size of the display in inch. Example: 47</td>
								<td><input id="4" type='checkbox' name='featured_image' title="select this item"
										   value="4"></i></td>
							</tr>
							<tr>
								<td>Heel type</td>
								<td>Define the type of heel the shoe has Example: e.g. Block, Cuban, Flared, Mid,
									Stiletto
								</td>
								<td><input id="5" type='checkbox' name='featured_image' title="select this item"
										   value="5"></i></td>
							</tr>
							</tbody>
						</table>
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
</body>

</html>
