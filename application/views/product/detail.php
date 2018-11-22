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
					<li class="active"><?= ucwords($product->product_name); ?></li>
				</ol>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End breadcrumb-->
			</div>
			<!--Page content-->
			<!--===================================================-->
			<div id="page-content">
				<div class="row">
					<?php $this->load->view('msg_view'); ?>
					<div class="col-md-3">
						<p>
							<img class="product-img"
									 src="<?= base_url('data/products/'.$product->id.'/'.$product->image_name);?>"
									 alt="<?= $product->product_name; ?>"
									 title="<?= $product->product_name; ?>" style="max-width: 330px;">
						</p>
					</div>

					<div class="col-md-6">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title text-bold"><?= ucwords($product->product_name); ?></h3>
							</div>
							<div class="panel-body">
								<div class="table-responsive">
									<table class="table table-striped">
										<tbody>
                                        <tr>
                                            <td><strong>Posted On</strong></td>
                                            <td><?= neatDate($product->created_on) .', '. neatTime($product->created_on);?></td>
                                        </tr>
										<tr>
											<td><strong>Seller:</strong></td>
											<td><a href="<?= base_url('sellers/detail/' . $product->seller_id); ?>"><?= $product->first_name . ' ' . $product->last_name; ?></a>
												<button data-target="#demo-modal-wo-anim" data-toggle="modal"
														class="btn btn-primary btn-sm" style="float: right"><i
														class="demo-pli-lock-user icon-fw"></i>Message
													Seller
												</button>
											</td>
										</tr>
										<tr>
											<td><strong>Product ID:</strong></td>
											<td><?= $product->sku; ?></td>
										</tr>
										<tr>
											<?php $category = $this->admin->get_row('categories','name', "( id = {$product->category_id} )"); ?>
											<td><strong>Category Name:</strong></td>
											<td><?= !empty($category->name) ? $category->name : ''; ?></td>
										</tr>
										<tr>
											<td>Product Brand Name:</td>
											<td><?= $product->brand_name; ?></td>
										</tr>
										<tr>
											<td>Model:</td>
											<td><?= $product->model; ?></td>
										</tr>
										<tr>
											<td>Main Color</td>
											<td><?= $product->main_colour; ?></td>
										</tr>
										<tr>
											<td>Main Material:</td>
											<td><?= $product->main_material; ?></td>
										</tr>
										</tbody>
									</table>

									<?php
										if( $product->product_status =='approved') :
									?>
									<div class="row">
										<div class="col-md-6">
											<a href="<?= base_url('product/action/suspend/'. $product->id.'/'. $product->seller_id); ?>" class="btn btn-block btn-warning">Suspend Product</a>
										</div>
										<div class="col-md-6">
											<a href="<?= base_url('product/action/delete/'. $product->id.'/'. $product->seller_id); ?>" class="btn btn-block btn-danger">Delete Product</a>
										</div>
									</div>
									<?php else : ?>
										<div class="row">
										<div class="col-md-6">
											<a href="<?= base_url('product/action/approve/'. $product->id.'/'. $product->seller_id); ?>" class="btn btn-block btn-primary">Approve Product</a>
										</div>
										<div class="col-md-6">
											<a href="<?= base_url('product/action/delete/'. $product->id.'/'. $product->seller_id); ?>" class="btn btn-block btn-danger">Delete Product</a>
										</div>
									</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="panel bg-mint panel-colorful">
							<div class="pad-all text-center">
								<span class="text-3x text-thin"><?= is_null($product->quantity_sold) ? 0 : $product->quantity_sold ;?></span>
								<p>Sales</p>
								<i class="demo-pli-shopping-bag icon-lg"></i>
							</div>
						</div>
						<div class="panel media middle">
							<div class="media-left bg-mint pad-all">
								<i class=" demo-pli-bag-coin icon-3x"></i>
							</div>
							<div class="media-body pad-all">
								<p class="text-2x mar-no text-semibold text-main"><?= ngn($product->amount); ?></p>
								<p class="text-muted mar-no">Total Amount Earned</p>
							</div>
						</div>
						<div class="panel media middle">
							<div class="media-left bg-purple pad-all">
								<i class="demo-pli-bag-coin icon-3x"></i>
							</div>
							<div class="media-body pad-all">
								<p class="text-2x mar-no text-semibold text-main"><?= is_null($product->views) ? 0 : $product->views; ?></p>
								<p class="text-muted mar-no">Product Views</p>
							</div>
						</div>
						<div class="panel media pad-all bg-info">
							<div class="media-left">
					                        <span class="icon-wra icon-wap-sm bg-ifo">
					                        <i class=" demo-pli-add-cart icon-3x"></i>
					                        </span>
							</div>
							<div class="media-body">
								<p class="text-2x mar-no text-semibold"><?= $product->variation_qty - (is_null($product->quantity_sold) ? 0 : $product->quantity_sold)?></p>
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
								<?php 
									$attributes = json_decode($product->attributes); 
									foreach( $attributes as $key => $value ) :
								?>
									<tr>
										<td><?= $key?></td>
										<td><?= $value; ?></td>
									</tr>
								<?php endforeach; ?>
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
								<p><?= $product->product_line; ?></p>
								<p class="text-main text-semibold">Product Description</p>
								<p><?= $product->product_description; ?></p>
								<p class="text-main text-semibold">Certifications</p>
								<p>
									<?php

										if( !empty($product->certifications) ) {
											$certifications = json_decode($product->certifications);
											foreach( $certifications as $certification ) echo $certification .',' ;
										}else{
											echo 'No certification';
										}

									?>
								</p>
								<p class="text-main text-semibold">Warranty Type</p>
								<p>
                                    <?php if(!empty($product->warranty_type)){
                                        $warranty = json_decode($product->warranty_type);
                                        foreach( $warranty as $type ) echo $type .', ';
                                    } ?>
								</p>
								<p class="text-main text-semibold">Product Warranty</p>
								<p><?= $product->product_warranty; ?></p>
								<p class="text-main text-semibold">Warranty Address</p>
								<p><?= $product->warranty_address; ?></p>
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
				<h4 class="modal-title">Message Seller (<?= ucwords($product->first_name . ' ' . $product->last_name); ?>)</h4>
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
