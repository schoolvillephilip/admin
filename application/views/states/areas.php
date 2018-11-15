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
					<h1 class="page-header text-overflow">State and area shipping address</h1>
				</div>
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<!--End page title-->
				<!--Breadcrumb-->
				<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
				<ol class="breadcrumb">
					<li><a href="#"><i class="demo-pli-home"></i></a></li>
					<li>Dashboard</li>
					<li class="active">State and Area Shipping Address</li>
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
						<div class="panel panel-success">
							<div class="panel-heading">
								<h3 class="panel-title">Add State and Area</h3>
							</div>
							<div class="panel-body">	
			                    <?= form_open('states/process'); ?>
		                            <div class="form-group">
		                                <label class="control-label">State</label>
		                                <input type="text" name="state" class="form-control" required placeholder="Enter State">
		                            </div>
		                            <input type="hidden" name="posting_type" value="state">
					                <div class="text-left">
					                    <button class="btn btn-success" type="submit">Submit</button>
					                </div>
					            <?= form_close();?>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-info">
				            <div class="panel-heading">
				                <h3 class="panel-title">Add Area</h3>
				            </div>				
				            <div class="panel-body">
				                <?= form_open('states/process', 'class="form-horizontal"'); ?>
		                            <div class="form-group">
		                                <label class="control-label">Select State*</label>
		                                <select name="state" class="form-control" required>
		                                	<option value="">-- Select option --</option>
		                                	<?php foreach( $states->result() as $state): ?>
		                                		<option value="<?= $state->id; ?>"><?= ucwords($state->name); ?></option>
		                                	<?php endforeach; ?>
		                                </select>
		                            </div>
		                            <div class="form-group">
		                                <label class="control-label">Area Name*</label>
		                                <input type="text" name="area" class="form-control" placeholder="Area name">
		                            </div>
		                            <div class="form-group">
		                                <label class="control-label">Delivery Price</label>
		                                <input type="text" name="price" class="form-control" placeholder="Delivery price (Leave empty if not applicable)">
		                            </div>
		                            <input type="hidden" name="posting_type" value="areas">
					                <div class="text-left">
					                    <button class="btn btn-success" type="submit">Submit</button>
					                </div>
					            <?= form_close(); ?>
				            </div>
				        </div>
					</div>
				</div>	

				<div class="row">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">List of Areas in the system</h3>
						</div>
						<div class="panel-body">
							<table id="demo-dt-basic" class="table table-striped table-bordered" cellspacing="0"
								   width="100%">
								<thead>
								<tr>
									<th>State</th>
									<th>Area name</th>
									<th>Area Shipping Price</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
									<?php foreach($areas->result() as $area) :?>
										<tr>
											<td><?= ucwords($area->state_name); ?></td>
											<td><?= ucwords($area->name); ?></td>
											<td><?= $area->price; ?></td>
											<td>
												<button type="button" class="btn btn-primary">Edit</button>
												<button type="button" class="btn btn-danger">Delete</button>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
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
</body>

</html>