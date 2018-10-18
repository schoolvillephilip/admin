<?php $this->load->view('templates/meta_tags'); ?>
<link href="<?= base_url('assets/plugins/unitegallery/css/unitegallery.min.css'); ?>" rel="stylesheet">
<style>
	.shadow-v1 {
		-webkit-box-shadow: 0px 5px 5px 0px rgba(176, 177, 193, 0.1);
		box-shadow: 0px 5px 5px 0px rgba(176, 177, 193, 0.1)
	}

	.shadow-v2 {
		-webkit-box-shadow: 0 15px 20px 0 rgba(0, 0, 0, 0.06);
		box-shadow: 0 15px 20px 0 rgba(0, 0, 0, 0.06)
	}

	.shadow-v3 {
		-webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.08);
		box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.08)
	}
</style>
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
					<h1 class="page-header text-overflow">Product</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li><a href="#">Dashboard</a></li>
					<li><a href="#">Products</a></li>
					<li class="active">Samsung Galaxy J6 - Purple</li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="row">
					<div class="col-md-3">
						<div class="panel" style="border-bottom: 1px solid #25476a">
							<div class="panel-body text-center shadow-v3" style="max-height: 390px;">
								<img alt="Featured Image" src="/admin/assets/img/phone.png" style="max-height: 350px;">
							</div>
						</div>
					</div>

					<div class="col-md-6">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title text-bold">Samsung Galaxy J6 - Purple Details</h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
										<tr>
											<th>Item</th>
											<th>Description</th>
										</tr>
										</thead>
										<tbody>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Price:</a></td>
											<td class="text-bold">&#8358;80,000</td>
										</tr>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Seller:</a></td>
											<td> SOKOYA PHILIP
												<button data-target="#demo-modal-wo-anim" data-toggle="modal"
														class="btn btn-primary btn-sm" style="float: right"><i
														class="demo-pli-lock-user icon-fw"></i>Message
													Seller
												</button>
											</td>
										</tr>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Product ID:</a></td>
											<td>X5PJUH</td>
										</tr>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Model:</a></td>
											<td>S9</td>
										</tr>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Main Color</a></td>
											<td>Black</td>
										</tr>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Color Family</a></td>
											<td>Green</td>
										</tr>
										<tr>
											<td><a href="javascript:void(0)" class="btn-link">Main Material</a></td>
											<td>Silicon</td>
										</tr>
										</tbody>
									</table>
									<button type="button" class="btn btn-block btn-primary">Approve Product</button>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel bg-mint panel-colorful">
							<div class="pad-all text-center">
								<span class="text-3x text-thin">53</span>
								<p>Sales</p>
								<i class="demo-pli-shopping-bag icon-lg"></i>
							</div>
						</div>
						<div class="panel media middle">
							<div class="media-left bg-mint pad-all">
								<i class=" demo-pli-bag-coin icon-3x"></i>
							</div>
							<div class="media-body pad-all">
								<p class="text-2x mar-no text-semibold text-main">&#8358;140,000</p>
								<p class="text-muted mar-no">Total Amount Earned</p>
							</div>
						</div>
						<div class="panel media pad-all bg-info">
							<div class="media-left">
					                        <span class="icon-wra icon-wap-sm bg-ifo">
					                        <i class=" demo-pli-add-cart icon-3x"></i>
					                        </span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-semibold">20</p>
								<p class="mar-no">Items Available In Stock</p>
							</div>
						</div>
						<p><a class="text-bold text-primary" href="#pr-spec">Product Specification</a></p>
						<p><a class="text-bold text-primary" href="#pr-detail">Product Details</a></p>


					</div>
				</div>
				<div class="panel" id="pr-spec">
					<div class="panel-heading">
						<h3 class="panel-title">Product Specifications</h3>
					</div>
					<div class="panel-body">
						<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
							   width="100%">
							<thead>
							<tr>
								<th>Item</th>
								<th>Description</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>Sim-Type</td>
								<td>Dual SIM</td>
							</tr>
							<tr>
								<td>OS-Type</td>
								<td>Android OS</td>
							</tr>
							<tr>
								<td>Measurement</td>
								<td>1260cm</td>
							</tr>
							<tr>
								<td>Weight</td>
								<td>300kg</td>
							</tr>
							<tr>
								<td>Battery-Capacity</td>
								<td>3000mAh</td>
							</tr>
							<tr>
								<td>Internal-Memory</td>
								<td>256 GB</td>
							</tr>
							<tr>
								<td>RAM</td>
								<td>6 GB</td>
							</tr>
							<tr>
								<td>Sceen-Size</td>
								<td>5.9 Inches</td>
							</tr>
							<tr>
								<td>Colour</td>
								<td>Black</td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>

							</tbody>
						</table>
					</div>
				</div>
				<div class="panel" id="pr-detail">
					<!--Panel heading-->
					<div class="panel-heading">
						<div class="panel-control">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#demo-tabs-box-1" data-toggle="tab">Overview</a></li>
							</ul>
						</div>
						<h3 class="panel-title">Full Details</h3>
					</div>

					<!--Panel body-->
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="demo-tabs-box-1">
								<p class="text-main text-semibold">Product Frontline</p>
								<p>Fouani Nigeria, Trendy Woman Ltd, SEOLAK</p>
								<p class="text-main text-semibold">Product Description</p>
								<p>Display: 5.8”, Quad HD+ sAMOLED Single Sim Option Camera Main: Super Speed Dual Pixel
									12 MP OIS (F1.5/F2.4) Camera Front: 8MP AF (F1.7) Processor: 10nm, Octa-core (2.7GHz
									Quad + 1.7GHz Quad) Memory: 4GB RAM and 64GB Internal storage, External Memory:
									MicroSD™ up to 400 GB Battery: 3000mAh Security: Intelligent Scan (Iris + Face),
									Fingerprint Scanner, Water and Dust Resistance: IP68 (1.5 m & 30 min)</p>
								<p class="text-main text-semibold">Certifications</p>
								<p>Eco Friendly FSC - Forest Stewardship Council</p>
								<p class="text-main text-semibold">Warranty Type</p>
								<p>This product has the following warranty : Repair by vendor</p>
								<p class="text-main text-semibold">Product Warranty</p>
								<p>It is a long established fact that a reader will be distracted by the readable
									content of a page when looking at its layout. The point of using Lorem Ipsum is that
									it has a more-or-less normal distribution of letters, as opposed to using 'Content
									here, content here', making it look like readable English. Many desktop publishing
									packages and web page editors now use Lorem Ipsum as their default model text, and a
									search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
									versions have evolved over the years, sometimes by accident, sometimes on purpose
									(injected humour and the like).</p>
								<p class="text-main text-semibold">Warranty Address</p>
								<p>It is a long established fact that a reader will be distracted by the readable
									content of a page when looking at its layout. The point of using Lorem Ipsum is that
									it has a more-or-less normal distribution of letters, as opposed to using 'Content
									here, content here', making it look like readable English. Many desktop publishing
									packages and web page editors now use Lorem Ipsum as their default model text, and a
									search for 'lorem ipsum' will uncover many web sites still in their infancy. Various
									versions have evolved over the years, sometimes by accident, sometimes on purpose
									(injected humour and the like).</p>
							</div>
						</div>
					</div>
				</div>
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

<div class="modal" id="demo-modal-wo-anim" role="dialog" tabindex="-1" aria-labelledby="demo-default-modal"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<!--Modal header-->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><i class="pci-cross pci-circle"></i></button>
				<h4 class="modal-title">Message Seller (Sokoya Philip)</h4>
			</div>
			<!--Modal body-->
			<div class="modal-body">
				<form>
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label">Title</label>
									<input type="text" class="form-control">
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<textarea placeholder="Message" rows="13" class="form-control"></textarea>
								</div>
							</div>

						</div>
					</div>
				</form>
			</div>


			<!--Modal footer-->
			<div class="modal-footer">
				<button data-dismiss="modal" class="btn btn-default" type="button">Discard</button>
				<button class="btn btn-primary">Send Message</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/scripts'); ?>
<script src="<?= base_url('assets/plugins/unitegallery/js/unitegallery.min.js'); ?>"></script>
<script src="<?= base_url('assets/plugins/unitegallery/themes/slider/ug-theme-slider.js'); ?>"></script>
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

<script>
	$(document).on('nifty.ready', function () {


		$("#demo-gallery").unitegallery();


		$("#demo-gallery-2").unitegallery({
			slider_transition: "fade"
		});

		$("#demo-gallery-3").unitegallery({
			slider_enable_text_panel: true,
			slider_enable_bullets: false
		});

		$("#demo-gallery-4").unitegallery({
			slider_progress_indicator_type: "bar"
		});


	});
</script>

<!--	<script src="/assets/plugins/datatables/media/js/jquery.dataTables.js"></script>-->
</body>

</html>
